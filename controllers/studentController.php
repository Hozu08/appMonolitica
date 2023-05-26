<?php 
    namespace studentController;

    use dBController\DBController;
    use dBConnectionController\DBConnectionController;
    use studentsM\Student;
    use activitiesM\Activity;

    class StudentController extends DBController{

        function create($student){
            $sql = 'insert into estudiantes ';
            $sql .= '(codigo, nombres, apellidos, created_at, updated_at) values ';
            $sql .= '(';
            $sql .= $student->getCode() . ', ';
            $sql .= '"' . $student->getName() . '", ';
            $sql .= '"' . $student->getLastname() . '", ';
            $sql .= 'null, ';
            $sql .= 'null)';

            $db_connection = new DBConnectionController();
            $result_SQL = $db_connection->execSQL($sql);
            $db_connection->close();
            return $result_SQL;
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
            $sql = 'update estudiantes set ';
            $sql .= 'codigo = "' . $student->getCode() . '", ';
            $sql .= 'nombres = "' . $student->getName() . '", ';
            $sql .= 'apellidos = "' . $student->getLastname() . '" ';
            $sql .= 'where codigo = ' . $code;

            $db_connection = new DBConnectionController();
            $result_SQL = $db_connection->execSQL($sql);
            $db_connection->close();
            return $result_SQL;  
        }

        function delete($code){

        }

        function readR($code){
            $sql = 'select * from estudiantes ';
            $sql .= 'where codigo = ' . $code;

            $db_connection = new DBConnectionController();
            $result_SQL = $db_connection->execSQL($sql);
            $student = new Student();

            while($register = $result_SQL->fetch_assoc()){
                $student->setCode($register['codigo']);
                $student->setName($register['nombres']);
                $student->setLastname($register['apellidos']);
            }

            $db_connection->close();
            return $student;  
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