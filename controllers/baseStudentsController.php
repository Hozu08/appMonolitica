<?php 
    namespace dBController;
    
    abstract class DBController{
        abstract function create($student);
        abstract function read();
        abstract function update($code, $student);
        abstract function delete($code);
        abstract function readCR($code);
        abstract function readR($code);
    }
?>