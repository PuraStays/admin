<?php
include_once('../admin/includes/db.inc.php');
include_once("session.php");


if (!empty($_POST))
{

  if($_POST["Member_Id"]!="")
  {
    $Member_Id = $_POST["Member_Id"]; 
    $db = new DB();
    $qry = "SELECT * from member where Owner_Email_Id ='$Member_Id'  && Status = '1'";
    $result = $db->_query($qry);
    if(mysqli_num_rows($result)>0)
          {
              $row = mysqli_fetch_array($result);

              
              $Mobile = $row['Owner_Mobile_No'];
              $Mobile2 = $row['Coordinator_Mobile_No'];
              
              $Password = $row['password'];
              $Cafe = $row['Cafe'];
              $Owner_Email_Id = $row['Owner_Email_Id'];

              $Mobile1 = '8750724589';
              $sms = "Dear ".$Cafe.", Please use following details to login your AME CET 2019 account. Login Id: ".$Owner_Email_Id." and password: ".$Password." For any support call us on 9560058919, 011-40109443 AME CET Team";
              
              if($db->_sms($sms, $Mobile)){
                $message = '<div class="alert alert-success"> <b>Password</b>  has been sent to your regsitered Mobile Number.</div>';
                $Owner_Email_Id = "";

                $db->_sms($sms, $Mobile1);
                $db->_sms($sms, $Mobile2);
              }
          }
          else
            $message = '<div class="alert alert-warning"> <b>Invalid</b> Member Id, Please try again !</div>';
  }
  else
  {
            $message = '<div class="alert alert-warning"> <b> Email Id</b> cannot be blank, Please try again !</div>';
  }
}
else
{
    $message = '<div class="alert alert-info"> Enter your Email Id to retrieve your password! </div>';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AME CET 2019 | Lockscreen</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href="http://www.amecet.in"><b>AME CET 2019</b></a>
      </div>
      <!-- User name -->
      <div class="lockscreen-name"><h3>Reset Password</h3></div><br /><br />

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="upload/member-login.png" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="post">
          <div class="input-group">
            <input type="text" name="Member_Id" id="Member_Id" class="form-control" placeholder="Member's Email Id" value="<?= $Member_Id; ?>">
            <div class="input-group-btn">
               <button class="btn" type="submit"  onclick="javascript:return val();"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form><!-- /.lockscreen credentials -->

    <script language="javascript" type="text/javascript">


        function val() {
           if (document.getElementById("Member_Id").value == "") {
                alert("Please enter Your Email Id")

                document.getElementById("Member_Id").focus();
                return false;
            }
         
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("Member_Id").value))) {
                alert("Invalid Member Email Id! Please re-enter.")

                document.getElementById("Member_Id").focus();
                return false;
            }
            return true;

        }
      </script>

      </div><!-- /.lockscreen-item -->
      

        <?= $message; ?>
      <br />
      <div class="text-center">
        <a href="login.php">Or sign in as a different user</a>
      </div>
      
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
