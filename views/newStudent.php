<?php
    require '../models/students.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';

    use studentsM\Student;
    use studentController\StudentController;

    $homeUrl = 'http://localhost/appMonolitica/index.php';

    $student = new Student();

    $studentController = new StudentController();
    $studentsR = $studentController->read(); 

    $flag = true;
    $code = $_POST['code'];
    $warning = '';

    foreach($studentsR as $studentR){
        if($code == $studentR->getCode()){
            $flag = false;
        }
    }

    if($flag){
        $student->setCode($_POST['code']);
        $student->setName($_POST['name']);
        $student->setLastname($_POST['lastname']);
        $result = $studentController->create($student);
    }else{
        $result = false;
        $warning = 'Error código existente';
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Estudiante nuevo</title>
    </head>
    <body>

        <?php 
            if($result){
                echo '<h1>Estudiante registrado</h1>';
            }else{
                echo '<h1>No se pudo registrar el estudiante</h1>';
                echo '<p>' . $warning . '</p>';
            }
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>