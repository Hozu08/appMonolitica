<?php 
    require 'models/students.php';
    require 'models/activities.php';
    require 'controllers/DBConnectionController.php';
    require 'controllers/baseStudentsController.php';
    require 'controllers/studentController.php';

    use studentController\StudentController;
    $studentController = new StudentController();
    $students = $studentController->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registro de Estudiantes</title>
</head>
<body>
    <header>
        <h1>Registro de estudiantes</h1>
    </header>
    <main>
        <form action="">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($students as $student){
                            echo '<tr>';
                            echo '<td>' . $student->getCode() . '</td>';
                            echo '<td>' . $student->getName() . '</td>';
                            echo '<td>' . $student->getLastname() . '</td>';
                            echo '</tr>';        
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </main>
    <footer>
        <!-- Insertar imagen -->
    </footer>
</body>
</html>