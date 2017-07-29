<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pura Stay | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?= $this->Html->css("../bootstrap/css/bootstrap.min.css"); ?>
    <!-- Font Awesome -->
    <?= $this->Html->css("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"); ?>
    <!-- Ionicons -->
    <?= $this->Html->css("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"); ?>
    <!-- Theme style -->
    <?= $this->Html->css("../dist/css/AdminLTE.min.css"); ?>
    <!-- iCheck -->
    <?= $this->Html->css("../plugins/iCheck/square/blue.css"); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?= $this->Html->script("https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"); ?>
        <?= $this->Html->script("https://oss.maxcdn.com/respond/1.4.2/respond.min.js"); ?>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <?= $this->fetch('content') ?>

    <!-- jQuery 2.1.4 -->
    <?= $this->Html->script("../plugins/jQuery/jQuery-2.1.4.min.js"); ?>
    <!-- Bootstrap 3.3.5 -->
    <?= $this->Html->script("../bootstrap/js/bootstrap.min.js"); ?>
    <!-- iCheck -->
    <?= $this->Html->script("../plugins/iCheck/icheck.min.js"); ?>
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
