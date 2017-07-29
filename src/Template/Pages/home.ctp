<?php
include_once('db.inc.php');
ini_set('display_errors', '0');    
  
session_start();
$_SESSION["login_status"] = "";
$_SESSION["user_type"] = "";
$_SESSION["email"] = "";
$_SESSION["Name"] = "";
$_SESSION["User_Image"] = "";

    

if(isset($_REQUEST["logout"]))
  {
    $_SESSION["login_status"] = "logout";

  }

if(isset($_POST["submit"]))
  {
    //session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

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
      $qry = "SELECT * from users where email ='$username' && password = '$password' && Status = '1' && Status = '1' limit 1";
      $result = $db->_query($qry);
        
      
   
    if(mysqli_num_rows($result)>0)
      {
         $status = "success";  
         $row = mysqli_fetch_array($result);
         $_SESSION["login_status"] = "login";          
         $_SESSION["user_type"] = "admin";
         $_SESSION["Name"] = $row["Name"];
         $_SESSION["email"] = $row["email"];
         $_SESSION["User_Image"] = $row["User_Image"];
         printf("<script>location.href='resorts'</script>");       
         exit();
      }
      else{
      } 
  }
?>

    <div class="login-box">
      <div class="login-logo">
        <a ><b>Admin</b> Pura Stays</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="username" id="username" class="form-control" placeholder="Email"  required="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <!--
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
              -->
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

        <!--<a href="#">I forgot my password</a> --><br>
        <?php /*?>
        <a href="register.html" class="text-center">Register a new membership</a>
        <?php */?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->