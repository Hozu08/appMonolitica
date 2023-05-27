<?php
    require '../models/activities.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';  

    use studentController\ActivityController;
    use activitiesM\Activity;

    $homeUrl = 'http://localhost/appMonolitica/index.php';
    
    $activity = new Activity();
    $activities = new ActivityController();

    $code = empty($_GET['codigoE'])? $_POST['codigoE'] : $_GET['codigoE'];
    $title = '';
    $showC = empty($_GET['codigoE'])? $_POST['codigoE'] : $_GET['codigoE'];
    $urlA = '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro actividad</title>
</head>
<body>
    <?php
        if(empty($_GET['description'])){
            $title = 'Registrar Actividad';
            $urlA = 'newActivity.php';
        }else{
            $title = 'Modificar Estudiante';
            $urlA = 'modifyActivity.php';
            echo '<span>' . $_GET['codigoE'] . '</span>';
            $activity = $activities->readR($code);
        }        
    ?>
 
    <form action="<?php echo $urlA ?>" methos='post'>
        <h1><?php echo $title ?></h1>
        <br>
        <label>
            <span>Código estudiante: </span>
            <p><?php echo $showC ?></p>
            <input type="hidden" name="codeStudent" value="<?php echo $activity->getCodeStudent();?>">
        </label>
        <label for="descriptionA">
            <span>Descripción: </span>
            <input type="text" id="descriptionA" name="description" value="<?php echo $activity->getDescription();?>">
        </label>
        <label for="scoreA">
            <span>Nota: </span>
            <input type="number" id="scoreA" name="score" value="<?php echo $activity->getScore();?>">
        </label>
        <button type="submit">Aceptar</button>
    </form>
    <br> 
    <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
</body>
</html>