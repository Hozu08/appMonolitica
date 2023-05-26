<?php
    require '../models/students.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';

    use studentsM\Student;
    use studentController\StudentController;

    $homeUrl = 'http://localhost/appMonolitica/index.php';

    $student = new Student();
    $student->setCode($_POST['code']);
    $student->setName($_POST['name']);
    $student->setLastname($_POST['lastname']);

    $studentController = new StudentController();
    $result = $studentController->create($student);



?>

<!DOCTYPE html>
<html lang="en">
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
            }
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>