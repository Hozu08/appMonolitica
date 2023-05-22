<?php 
    namespace studentController;

    use dBController\DBController;
    use dBConnectionController\DBConnectionController;
    use studentsM\Student;
    use activitiesM\Activity;

    class StudentController extends DBController{
        function create($student){

        }

        function read(){
            $sql = 'select * from estudiantes';
            $db_connection = new DBConnectionController();
            $resultSQL = $db_connection->execSQL($sql);
            $students = [];
            while($register = $resultSQL->fetch_assoc()){
                $student = new Student();
                $student->setCode($register['codigo']);
                $student->setName($register['nombres']);
                $student->setLastname($register['apellidos']);
                array_push($students,$student);
            }
            $db_connection->close();
            return $students;
        }

        function update($code, $student){

        }

        function delete($code){

        }

        function readR($code){

        }
    }

    class ActivityController extends DBController{
        function create($Score){

        }

        function read(){

        }

        function update($id, $Score){

        }

        function delete($id){

        }

        function readR($id){

        }
    }
?>