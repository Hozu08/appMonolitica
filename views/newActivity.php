<?php
    require '../models/activities.php';
    require '../models/students.php';
    require '../controllers/DBConnectionController.php';
    require '../controllers/baseStudentsController.php';
    require '../controllers/studentController.php';  
    
    use studentController\ActivityController;
    use activitiesM\Activity;

    $activitiesM = new Activity();
    $studentController =new ActivityController();
?>