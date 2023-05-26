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
    <title>Registro de Estudiantes</title>
</head>
<body>
    <header>
        <h1 id="titulo">Registro de estudiantes</h1>
    </header>
    <main>

        <!-- Tabla principal -->

        <table id="contenedorT">
            <h2>Estudiantes</h2>
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
                <?php
                    foreach($students as $student){
                        echo '<tr>';
                            echo '<td>' . $student->getCode() . '</td>';
                            echo '<td>' . $student->getName() . '</td>';
                            echo '<td>' . $student->getLastname() . '</td>';
                            echo '<td><td><a>Notas</a></td></td>';
                            echo '<td><a href="views/formE.php?codigo=' . $student->getCode() .'">Modificar</a></td>';
                            echo '<td><a href="views/deleteStudent.php?codigo=' . $student->getCode() .'">Eliminar</a></td></td>';
                        echo '</tr>';        
                    }
                ?>
            </tbody>
        </table>
        <button id="agregarEBtn" onclick="location.href='<?php echo $urlE ?>'" type="button">Agregar estudiante</button>
    </main>
    <footer></footer>
</body>
</html>
