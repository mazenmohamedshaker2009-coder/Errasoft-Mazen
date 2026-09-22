<?php
 
$conn = mysqli_connect("localhost","root","","todo_task");

if(!$conn){

  header("location: ../views/errors/404.php");

}
