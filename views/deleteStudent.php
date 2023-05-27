<?php
    require '../models/students.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';    
    
    use studentController\StudentController;

    $homeUrl = 'http://localhost/appMonolitica/index.php';

    $studentController = new StudentController();
    $result = $studentController->delete($_GET['codigo']);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Eliminar estudiante</title>
    </head>
    <body>

        <?php 
            if($result){
                echo '<h1>Estudiante eliminado</h1>';
            }else{
                echo '<h1>No se pudo eliminar el estudiante</h1>';
            }    
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>