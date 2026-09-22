<?php

session_start();

include './config/db.php';
include './views/layouts/head.php';

$page = isset($_GET['page']) ? $_GET['page'] : "home";


switch ($page) {
  case 'home': 
  include './controller/taskController.php';
  $tasks = indexTask();
  include './views/tasks/index.php';
  break;
 
  
  case 'task-store': 
  include './controller/taskController.php';
  storeTask();
  break; 


  case 'task-update': 
  include './controller/taskController.php';
  updateTask();
  break; 


  case 'task-edit': 
  include './controller/taskController.php';
  $task = editTask($_GET['id']);
  include './views/tasks/edit.php';
  break; 


  case 'task-destroy': 
  include './controller/taskController.php';
  $task = destroyTask($_GET['id']);
  break; 



  default:
  include './views/errors/404.php';
  break;
}


include './views/layouts/scripts.php';
