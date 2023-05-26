<?php
        require '../models/students.php';
        require '../controllers/DBConnectionController.php';
        require '../controllers/baseStudentsController.php';
        require '../controllers/studentController.php';    
    
        use studentController\StudentController;
        use studentsM\Student;

        $homeUrl = 'http://localhost/appMonolitica/index.php';
        $originCode = $_POST['codigo'];

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
    <title>Modificar estudiante</title>
    </head>
    <body>

        <?php 
                 if($result){
                        if($originCode == $student->getCode()){
                                echo '<h1>Estudiante Modificado</h1>';
                        }else{
                                echo '<h1>No se pudo modificar el estudiante</h1>';
                                echo '<p>El codigo ingresado no corresponde al estudiante...</p>';
                       }       
                }else{
                        echo '<h1>No se pudo modificar el estudiante</h1>';
                }
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>