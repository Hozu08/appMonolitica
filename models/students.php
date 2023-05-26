<?php 

    namespace studentsM; 

    class Student{
        private $code;
        private $name;
        private $lastname;

        public function getCode(){
            return $this->code;
        }

        public function setCode($value){
            $this->code = $value;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($value){
            $this->name = $value;
        }

        public function getLastname(){
            return $this->lastname;
        }

        public function setLastname($value){
            $this->lastname = $value;
        }
    }
?>