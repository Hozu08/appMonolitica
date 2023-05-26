<?php 
    require '../models/students.php';
    require '../models/activities.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';    

    use studentController\StudentController;
    use studentsM\Student;

    $student = new Student();

    $title = '';
    $urlA = '';

    if(empty($_GET['codigo'])){
        $title = 'Registrar Estudiante';
        $urlA = 'newStudent.php';
    }else{
        $title = 'Modificar Estudiante';
        $urlA = 'modifyStudent.php';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario Estudiantes</title>
</head>
<body>

    <form action="<?php echo $urlA ?>" method="post">
        <h1><?php echo $title ?></h1>
        <label>
            <span>Código: </span>
            <input type="number" value="<?php echo $student->getCode();?>" name="code" require>
        </label>
        <label>
            <span>Nombres: </span>
            <input type="text" value="<?php echo $student->getName();?>" name="name" require>
        </label>
        <label>
            <span>Apellidos: </span>
            <input type="text" value="<?php echo $student->getLastname();?>" name="lastname" require>
        </label>
        <button type="submit">Aceptar</button>
    </form>
    
</body>
</html>