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
            <p class="h3 " style="color: blue;">Verify</p>
          </div>
          <form onsubmit="return false;">
          <div class="verify1 imput-group mb-3 d-flex">
            <input type="text" class="form-control form-control-lg bg-light fs-6 verify" maxlength="1" name="user_code" >
            <input type="text" class="form-control form-control-lg bg-light fs-6 verify" maxlength="1" name="user_code" >
            <input type="text" class="form-control form-control-lg bg-light fs-6 verify " maxlength="1" name="user_code">
            <input type="text" class="form-control form-control-lg bg-light fs-6 verify " maxlength="1" name="user_code">
            <input type="text" class="form-control form-control-lg bg-light fs-6 verify " maxlength="1" name="user_code">
            <input type="text" class="form-control form-control-lg bg-light fs-6 verify " maxlength="1" name="user_code">

          </div>
          <div class="input-group mb-3">
            <button  onclick="submitCode()" class="btn btn-sm btn-primary w-60 fs-6">Verify</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="./jss/js1.js"></script>
</body>
</html>

