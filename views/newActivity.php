<?php
    require '../models/activities.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';  
    
    use studentController\ActivityController;
    use activitiesM\Activity;

    $homeUrl = 'http://localhost/appMonolitica/index.php';

    $activitiesM = new Activity();
    $studentController =new ActivityController();

    $activitiesM->setDescription($_POST['description']);
    $activitiesM->setScore($_POST['score']);
    $activitiesM->setCodeStudent($_POST['codeStudent']);

    $result = $studentController->create($activitiesM);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Actividad nueva</title>
    </head>
    <body>

        <?php 
            if($result){
                echo '<h1>Actividad agregada</h1>';
            }else{
                echo '<h1>No se pudo agregar la actividad</h1>';
            }
        ?>
        <br> 
        <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
   
    </body>
</html>