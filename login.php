<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="styles/style2.css">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounder-5 p-3 bg-white shadow box-area">
      <div class="col-md-6">
        <div class="image">
        <img src="images/apiProject.jpg" class="image-fluid" style="width:250px">
        </div>
       
      </div>
      <div class="col-md-6">
        <div class="row align-items-centre">
          <div class="header-text mb-4">
            <p class="h3 " style="color: blue;">Login</p>
          </div>
          <form action="includes/login.php" method="post">
          <div class="imput-group mb-3">
            <input type="email" class="form-control form-control-lg bg-light fs-6 "  name="email" placeholder="Email Address" >
          </div>
          <div class="imput-group mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6 " placeholder="Password" name="password" >
          </div>
          <div class="input-group mb-3">
            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
          </div>
          </form>
          <div class="row">
            <small>Do Not Have an Account? <a href="signup.php">Sign Up</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
