<?php 
    require '../models/students.php';
    require '../models/activities.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';    

    use studentController\StudentController;
    use studentsM\Student;

    $student = new Student();
    $students = new StudentController();

    $title = '';
    $warning = '';
    $urlA = '';
    $homeUrl = 'http://localhost/appMonolitica/index.php';
    $code = empty($_GET['codigo'])? '' : $_GET['codigo'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Estudiantes</title>
</head>
<body>

    <?php
            if(empty($_GET['codigo'])){
                $title = 'Registrar Estudiante';
                $urlA = 'newStudent.php';
                $warning = 'Recuerde que una vez registrado el estudiante, su codigo no podra ser modificado.';
            }else{
                $title = 'Modificar Estudiante';
                $urlA = 'modifyStudent.php';
                $warning = '';
                echo '<span>' . $_GET['codigo'] . '</span>';
                $studentController = new StudentController();
                $student = $studentController->readR($code);
            }        
    ?>

    <form action="<?php echo $urlA ?>" method="post">
        <h1><?php echo $title ?></h1>
        <br>
        <p><?php echo $warning?></p>
        <label>
            <span>Código: </span>
            <input type="number" value="<?php echo $student->getCode();?>" name="code" require>
        </label>
        <label>
            <span>Nombres: </span>
            <input type="text" value="<?php echo $student->getName();?>" name="name" require>
        </label>
        <label>
            <span>Apellidos: </span>
            <input type="text" value="<?php echo $student->getLastname();?>" name="lastname" require>
        </label>
        <label>
            <input type="hidden" value="<?php echo $code ?>" name="codigo">
        </label>
        <button type="submit">Aceptar</button>
    </form>

    <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
    
</body>
</html>