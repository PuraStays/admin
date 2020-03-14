<?php
include_once('../dashboard/admin/includes/db.inc.php');
include_once("session.php");

if(isset($_REQUEST["logout"]))
  {
          $_SESSION["counselling_login_status"] = "";
          $_SESSION["user_type"] = "";
          $_SESSION["centre_id"] = "";
          $_SESSION["username"] = "";
  }


if(isset($_POST["submit"]))
  {
    session_start();
    $Login_Id = $_POST["username"];
    $Password = $_POST["password"];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
      }   
      
      date_default_timezone_set('Asia/Kolkata');
      $login_time =  date('Y-m-d H:i:s');
      $doc =  date('Y-m-d H:i:s');
      
      $db = new DB();
       $qry = "SELECT * from counselling_members where Login_Id ='$Login_Id' && Password = '$Password' && Status = '1'";
      $result = $db->_query($qry);
  
      
   
    if(mysqli_num_rows($result)>0)
      {
        $row = mysqli_fetch_array($result);
        $status = "success";  
        $qry1 = "insert into user_login_details (User_Id,  Password,  ip_address, User_Type,login_time, status, doc) VALUES ('$Login_Id', '$Password', '$ip_address', 'counselling_members','$login_time','success', '$doc');";
        $db->_query($qry1);          
         
         $_SESSION["counselling_login_status"] = "login";          
         $_SESSION["user_type"] = "counseller";
         $_SESSION["centre_id"] = $row["Centre"];
         $_SESSION["username"] = $row["Name"];
         $_SESSION["id"] = $row["Id"];
         
         
         
         
          
         printf("<script>location.href='index.php?m=management&p=ame_institute'</script>");       
         exit();
      }
      else{

        $qry1 = "insert into user_login_details (User_Id,  Password,  ip_address, User_Type,  login_time, status, doc) VALUES ('$User_Id', '$Password', '$ip_address', 'counselling_members', '$login_time','fail', '$doc');";
        $db->_query($qry1);
      }
      
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AME CET 2019| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <?php include_once("../includes/meta.php"); ?>

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="http://www.amecet.in"><b>AME CET 2019</b> Counselling Panel</a>

      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="username" id="username" class="form-control" value="" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" value="" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" id="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <?php /*?>
        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->
        <?php */?>

        <?php /*?>
        <a href="#">I forgot my password</a><br>
        
        <a href="register.html" class="text-center">Register a new associateship</a>
        <?php */?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
