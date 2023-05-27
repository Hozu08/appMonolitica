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

    $homeUrl = 'http://localhost/appMonolitica/index.php';
    $urlE = 'http://localhost/appMonolitica/views/newActivity.php';
    $code = $_GET['codigo'];

    $studentAController = new ActivityController();
    $activityE = $studentAController->readR($code);

    $studentController = new StudentController();
    $student = $studentController->readR($code);

?>    

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de actividades</title>
</head>
<body>

    <h1>Actividades</h1>
    <label>Código: <?php echo $student->getCode() ?></label>
    <br>
    <label>Nombres: <?php echo $student->getName() ?></label>
    <br>
    <label>Apellidos: <?php echo $student->getLastName() ?></label>

    <form action="">
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
                            echo '<td><a href="modifyScore.php?codigoE=' . $code .'">Modificar</a></td>';
                            echo '<td><a href="deleteScore.php?codigoE=' . $code .'">Eliminar</a></td></td>';
                        echo '</tr>';        
                    }
                ?>

            </tbody>
        </table>
        <button id="agregarABtn" onclick="location.href='<?php echo $urlE ?>'" type="button">Agregar actividad</button>
    </form>
    <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
</body>
</html>