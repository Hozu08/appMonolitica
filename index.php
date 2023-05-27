<?php 
    require 'models/students.php';
    require 'models/activities.php';
    require 'controllers/DBConnectionController.php';
    require 'controllers/baseStudentsController.php';
    require 'controllers/studentController.php';

    use studentController\StudentController;

    $studentController = new StudentController();
    $students = $studentController->read();


    $urlE = 'views/formE.php';
    $urlA = 'views/scoreTable.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
    <header>
        <h1 id="titulo">Registro de estudiantes</h1>
    </header>
    <main>

        <!-- Tabla principal -->

        <form action="<?php echo $urlE ?>" method="post">
            <table id="contenedorT">
                <h2 id="tituloE">Estudiantes</h2>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="contenidoTb">

                    <!-- Se traen todos los registros existentes -->

                    <?php
                        foreach($students as $student){
                            echo '<tr>';
                                echo '<td>' . $student->getCode() . '</td>';
                                echo '<td>' . $student->getName() . '</td>';
                                echo '<td>' . $student->getLastname() . '</td>';
                                echo '<td><td><a href="views/scoreTable.php?codigo=' . $student->getCode() .'">Notas</a></td></td>';
                                echo '<td><a href="views/formE.php?codigo=' . $student->getCode() .'">Modificar</a></td>';
                                echo '<td><a href="views/deleteStudent.php?codigo=' . $student->getCode() .'">Eliminar</a></td></td>';
                            echo '</tr>';        
                        }
                    ?>
                </tbody>
            </table>
        </form>
        <button id="agregarEBtn" onclick="location.href='<?php echo $urlE ?>'" type="button">Agregar estudiante</button>
    </main>
    <footer></footer>
</body>
</html>
