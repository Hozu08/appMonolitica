<?php 
    namespace activitiesM;

    class Activity{
        private $id;
        private $description;
        private $score;
        private $codeStudent;
        
        public function getId(){
            return $this->id;
        }

        public function setId($value){
            $this->id = $value;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($value){
            $this->description = $value;
        }
        
        public function getScore(){
            return $this->score;
        }

        public function setScore($value){
            $this->score = $value;
        }
        
        public function getCodeStudent(){
            return $this->codeStudent;
        }

        public function setCodeStudent($value){
            $this->codeStudent = $value;
        }
    }
?>