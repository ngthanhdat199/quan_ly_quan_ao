<?php
  function login() {
    if (!empty($_POST)) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      require_once('sql_connect.php');

      $sql = "select * from student where email = '".$email."' and password = '".$password."'";
      $result = mysqli_query($con,$sql);
      $data = array();
      while ($row = mysqli_fetch_array($result,1)) {
        $data[] = $row;
      }
      require_once('sql_close.php');
      if($data != null && count($data) > 0) {
        header('Location: welcome.php');
      }
    }
  }
?>