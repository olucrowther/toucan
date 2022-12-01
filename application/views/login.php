
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script>var baseUrl = '<?php echo base_url(); ?>';</script>
  <link href="<?php //echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="back">


<div class="div-center">


  <div class="content">
    <div class="login-logo-container"><img src="<?php ?>assets/img/logo.png" /></div>
    <div class="login-alert alert alert-danger" role="alert">
        This is a danger alert—check it out!
    </div>
    <hr />
    <form autocomplete="off" id="loginForm">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" required class="form-control" id="email-add" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" required class="form-control" id="password" placeholder="Password" required>
      </div>
      <button type="submit" class="login-btn btn btn-primary btn-block">Login</button>
      <hr />

    </form>

  </div>


  </span>
</div>

</body>
<script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</html>

