<?php
        require '../models/students.php';
        require '../controllers/DBConnectionController.php';
        require '../controllers/baseStudentsController.php';
        require '../controllers/studentController.php';    
    
        use studentController\StudentController;
        use studentsM\Student;

        $student = new Student();
        $usuario->setId($_POST['code']);
        $usuario->setName($_POST['name']);
        $usuario->setUsername($_POST['lastname']);

        $studentController = new StudentController();
        
?>