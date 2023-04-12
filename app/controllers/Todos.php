<?php
  class Todos extends Controller {
    public function __construct(){
     $this->taskModel = $this->model('Task');
    }
    
    public function index(){
      ob_start();

      $tasks = $this->taskModel->getTasks();
      $getDoneTask = $this->taskModel->getDoneTask();
      $getTasksRowCount = $this->taskModel->getTasksRowCount();

      if(isset($_POST['task'])){
        
        $data = [
          'tasks' => $tasks,
          'task' => trim($_POST['task']),
          'status' => '',
          'getDoneTask' => $getDoneTask,
          'getTasksRowCount' => $getTasksRowCount,
          'task_err' => ''
        ];

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
        if(empty($data['task'])){
          $data['task_err'] = 'Please enter a Task.';
        }

        if(empty($data['task_err'])){
          if($this->taskModel->addTask($data)){
            redirect('');
          } else {
            die('Something Went Wrong.');
          }
        } else {
          $this->view('todos/index', $data);
        }
      } else {

        $data = [
          'getTasksRowCount' => $getTasksRowCount,
          'getDoneTask' => $getDoneTask,  
          'tasks' => $tasks,
          'task' => '',
          'status' => ''
        ];

        $this->view('todos/index', $data);
      }

      if(isset($_POST['doneTask'])){

        $data = [
          'id' => trim($_POST['id']),
          'status' => 'Done'
        ];

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $this->taskModel->doneTask($data);

        redirect(''); 
        
      }

      if(isset($_POST['deleteTask'])){

        $data = [
          'id' => trim($_POST['id'])
        ];

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $this->taskModel->deleteTask($data);

        redirect(''); 
        
      }
      ob_end_flush();
    }
  }