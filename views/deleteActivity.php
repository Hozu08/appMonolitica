<?php
    require '../models/activities.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';    

    use studentController\ActivityController;

    $homeUrl = 'http://localhost/appMonolitica/index.php';

    $studentController = new ActivityController();
    $result = $studentController->delete($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Eliminar Actividad</title>
    </head>
    <body>

        <?php 
            if($result){
                echo '<h1>Actividad eliminada</h1>';
            }else{
                echo '<h1>No se pudo eliminar la actividad</h1>';
            }    
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>