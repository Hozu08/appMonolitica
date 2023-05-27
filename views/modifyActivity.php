<?php
    require '../models/activities.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';    

    use studentController\ActivityController;
    use activitiesM\Activity;

    $homeUrl = 'http://localhost/appMonolitica/index.php';
    
    $activity = new Activity();
    $studentController = new ActivityController();
    $activity->setDescription($_POST['description']);
    $activity->setScore($_POST['score']);
    $activity->setCodeStudent($_POST['codeStudent']);

    $result = $studentController->update($_POST['id'], $activity);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Modificar actividad</title>
    </head>
    <body>

        <?php 
                 if($result){
                        echo '<h1>Actividad modificada</h1>';
                }else{
                        echo '<h1>No se pudo modificar la actividad</h1>';
                }
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>