<?php
        require '../models/students.php';
        require '../controllers/DBConnectionController.php';
        require '../controllers/baseStudentsController.php';
        require '../controllers/studentController.php';    
    
        use studentController\StudentController;
        use studentsM\Student;

        $homeUrl = 'http://localhost/appMonolitica/index.php';
        
        $student = new Student();
        $student->setCode($_POST['code']);
        $student->setName($_POST['name']);
        $student->setLastname($_POST['lastname']);

        $studentController = new StudentController();
        $result = $studentController->update($student->getCode(), $student);            
?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Modificar estudiante</title>
    </head>
    <body>

        <?php 
                 if($result){
                        echo '<h1>Estudiante modificado</h1>';
                }else{
                        echo '<h1>No se pudo modificar el estudiante</h1>';
                }
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>