<?php 
    require '../models/activities.php';
    require '../models/students.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';    

    use studentController\ActivityController;
    use activitiesM\Activity;
    use studentController\StudentController;
    use studentsM\Student;

    $code = $_GET['codigo'];
    $homeUrl = 'http://localhost/appMonolitica/index.php';
    $urlE = 'http://localhost/appMonolitica/views/formScore.php';
    

    $studentAController = new ActivityController();
    $activityE = $studentAController->readCR($code);

    $studentController = new StudentController();
    $student = $studentController->readR($code);

?>    

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Registro de actividades</title>
</head>
<body>

    <h1>Actividades</h1>
    <label>Código: <?php echo $student->getCode() ?></label>
    <br>
    <label>Nombres: <?php echo $student->getName() ?></label>
    <br>
    <label>Apellidos: <?php echo $student->getLastName() ?></label>

    <form action="<?php echo $urlE ?>" method="post">
        <table>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Nota</th>
                    <th>Código</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <!-- Se traen todos los registros existentes -->

                <?php
                    foreach($activityE as $activity){
                        echo '<tr>';
                            echo '<td>' . $activity->getDescription() . '</td>';
                            echo '<td>' . $activity->getScore() . '</td>';
                            echo '<td>' . $activity->getCodeStudent() . '</td>';
                            echo '<td><a href="formScore.php?id=' . $activity->getId() . '&codigoE=' . $code . '">Modificar</a></td>';
                            echo '<td><a href="deleteActivity.php?id=' . $activity->getId() .'">Eliminar</a></td></td>';
                        echo '</tr>';        
                    }
                ?>

            </tbody>
        </table>
        <input type="hidden" name="codigoE" value="<?php echo $code ?>">
        <input type="hidden" name="id" value="">
        <button id="agregarABtn" type="submit">Agregar actividad</button>
    </form>
    <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
</body>
</html>