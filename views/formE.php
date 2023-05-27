<?php 
    require '../models/students.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';    

    use studentController\StudentController;
    use studentsM\Student;

    $student = new Student();
    $studentController = new StudentController();

    $title = '';
    $warning = '';
    $typeC = '';
    $showC = '';
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
                $typeC = 'number';
                $warning = 'Recuerde que el codigo no puede ser igual al de otro estudiante registrado.';
            }else{
                $title = 'Modificar Estudiante';
                $urlA = 'modifyStudent.php';
                $warning = '';
                $showC = '<p>' . $_GET['codigo'] . '</p>';
                $typeC = 'hidden';
                echo '<span>' . $_GET['codigo'] . '</span>';
                $student = $studentController->readR($code);
            }        
    ?>

    <form action="<?php echo $urlA ?>" method="post">
        <h1><?php echo $title ?></h1>
        <br>
        <p><?php echo $warning?></p>
        <label>
            <span>Código: </span>
            <?php echo $showC ?>
            <input type="<?php echo $typeC ?>" value="<?php echo $student->getCode();?>" name="code" require>
        </label>
        <label>
            <span>Nombres: </span>
            <input type="text" value="<?php echo $student->getName();?>" name="name" require>
        </label>
        <label>
            <span>Apellidos: </span>
            <input type="text" value="<?php echo $student->getLastname();?>" name="lastname" require>
        </label>
        <button type="submit">Aceptar</button>
    </form>

    <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
    
</body>
</html>