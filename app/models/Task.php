<?php

    class Task {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function addTask($data){
            $this->db->query('INSERT INTO tasks (task, status) VALUES(:task, :status)');
            $this->db->bind(':task', $data['task']);
            $this->db->bind(':status', $data['status']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getTasks(){
            $this->db->query('SELECT * FROM tasks');

            $results = $this->db->resultSet();

            return $results;
        }

        public function doneTask($data){
            $this->db->query('UPDATE tasks SET status = :status WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':status', $data['status']);

            // Execute 
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteTask($data){
            $this->db->query('DELETE FROM tasks WHERE id = :id');
            $this->db->bind(':id', $data['id']);

            // Execute 
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getDoneTask(){

            $this->db->query('SELECT COUNT(*) as total FROM tasks WHERE status="Done"');
            
            $row = $this->db->single();

            return $row;
            
        }

        public function getTasksRowCount(){
            $this->db->query('SELECT * FROM tasks');

            $results = $this->db->resultSet();

            return $this->db->rowCount();
        }


    }

?>