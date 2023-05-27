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
    $id = empty($_GET['id'])? $_POST['id'] : $_GET['id'];;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro actividad</title>
</head>
<body>
    <?php
        if(empty($_GET['id'])){
            $title = 'Registrar Actividad';
            $urlA = 'newActivity.php';
        }else{
            $title = 'Modificar Estudiante';
            $urlA = 'modifyActivity.php';
            $activity = $activities->readR($code);
        }        
    ?>
 
    <form action="<?php echo $urlA ?>" method='post'>
        <h1><?php echo $title ?></h1>
        <br>
        <label>
            <span>Código estudiante: </span>
            <p><?php echo $showC ?></p>
            <input type="number" name="codeStudent" value="<?php echo $activity->getCodeStudent();?>" require>
        </label>
        <label for="descriptionA">
            <span>Descripción: </span>
            <input type="text" id="descriptionA" name="description" value="<?php echo $activity->getDescription();?>" require>
        </label>
        <label for="scoreA">
            <span>Nota: </span>
            <input type="number" min="0" max="5" step="any" id="scoreA" name="score" value="<?php echo $activity->getScore();?>" require>
        </label>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit">Aceptar</button>
    </form>
    <br> 
    <button onclick="location.href='<?php echo $homeUrl ?>'" type="button">Regresar</button>
</body>
</html>