<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login & Register form</title>
  
  
  
      <link rel="stylesheet" href="<?=BASE_URL?>css/style.css">
    <!--  
  hoi cho nay
    <link rel="stylesheet" href="<??>app/view/quantri/css/style.css"> -->

  
</head>

<body>
  <div class="login-wrap">
  <h2>Login</h2>
  <div class="form">
    <p style="color:red; margin: 0 auto;" align="center"><?php  if(isset($_SESSION['error'])) echo $_SESSION['error'];?></p>
    
    <form method="POST" action="#">
    <input type="text" placeholder="Username" name="u" />
    <input type="password" placeholder="Password" name="p" />
    <input type="submit" value="Sign In" name="OK">
    
    </form>
  </div>
</div>
  <script src='https://code.jquery.com/jquery-1.10.0.min.js'></script>
  <script src="<?=BASE_URL?>js/index.js"></script>
</body>
</html>
