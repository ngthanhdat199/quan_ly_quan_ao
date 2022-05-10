<?php
    $hoten = $emailAddress = $ngaysinh = $matkhau = $xacnhan = $diachi = '';
    $isPwdMapping = true;
    if(!empty($_GET)) {
      if(isset($_GET['fullname'])) {
        $hoten = $_GET['fullname'];
      }
      if(isset($_GET['email'])) {
        $emailAddress = $_GET['email'];
      }
      if(isset($_GET['birthday'])) {
        $ngaysinh = $_GET['birthday'];
      }
      if(isset($_GET['pwd'])) {
        $matkhau = $_GET['pwd'];
      }
      if(isset($_GET['confirmation_pwd'])) {
        $xacnhan = $_GET['confirmation_pwd'];
      }
      if(isset($_GET['address'])) {
        $diachi = $_GET['address'];
      }
      if($matkhau == $xacnhan) {
        header('Location: welcome.php?ten='.$hoten);

      }
      else {
        $isPwdMapping = false;
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="text-center">Register form</h2>
        </div>
        <div class="panel-body">
          <form method = "get" action = "">
            <div class="form-group">
              <label for="usr">Name:</label>
              <input require="true" type="text" class = "form-control" id = "usr" name = "fullname" name = "fullname" value="<?=$hoten?>">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input require="true" type="email" class = "form-control" id = "email" name= "email" value="<?=$emailAddress?>">
            </div>
            <div class="form-group">
              <label for="birthday">Birthday:</label>
              <input require="true" type="date" class = "form-control" id = "Birthday" name = "birthday" value="<?=$ngaysinh?>">
            </div>
            <div class="form-group">
              <label for="pwd">Password: <?=$isPwdMapping?'':'<font color= red>Mật khẩu không khớp</font>'?></label>
              <input require="true" type="password" class = "form-control" id = "pwd" name = "pwd">
            </div>
            <div class="form-group">
              <label for="confirmation_pwd">Confirmation Password:</label>
              <input require="true" type="password" class = "form-control" id = "confirmation_pwd" name = "confirmation_pwd">
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input require="true" type="text" class = "form-control" id = "address" name = "address" value="<?=$diachi?>">
            </div>
            <button class= "btn btn-success">Register</button>
          </form>
        </div>
      </div>
    </div>
</body>
  <?php
 
  ?>
</html>