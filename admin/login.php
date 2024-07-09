<?php require_once('../config.php')?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<?php require_once('inc/header.php')?>
<body class="hold-transition" style="background-image: url('<?php echo validate_image($_settings->info('cover'))?>'); background-size: cover; background-repeat: no-repeat;">
  <script>
    start_loader()
  </script>
  <style>
    html, body {
      height: 100%;
      width: 100%;
      margin: 0;
      font-family: 'Lato', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
    }

   .card {
      background: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      padding: 50px;
      width: 350px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
   .card-body {
      padding: 0;
    }

   .form-control {
      height: 45px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
      width: 93%;
    }

   .input-group-text {
      background-color: transparent;
      border: none;
      padding: 0;
    }

   .input-group-text i {
      font-size: 18px;
      color: #007bff;
    }

   .btn {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      font-size: 16px;
      border-radius: 5px;
      width: 100%;
      transition: background-color 0.3s ease;
    }

   .btn:hover {
      background-color: #0056b3;
    }

   .form-check-label input {
      margin-right: 5px;
    }

   .register-link {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

   .register-link a {
      color: #007bff;
      text-decoration: none;
    }

   .register-link a:hover {
      text-decoration: underline;
    }
    .title-container {
      text-align: center;
      margin-bottom: 20px;
    }

   .title-container h1 {
      font-weight: bold;
      margin: 0;
      animation: pulse 3s infinite;
    }

    @keyframes pulse {
  0% {
    color: #007bff; 
  }
  25% {
    color: #0069d9; 
  }
  50% {
    color: #0056b3; 
  }
  75% {
    color: #0047a6; 
  }
  100% {
    color: #007bff;
  }
}

  .text-center {
    text-align: center;
  }
  </style>
  <div class="card">
    <div class="title-container">
      <h1>Fly Fly Fly Money</h1>
    </div>
    <h2 class="text-center">Login</h2>
    <div class="card-body">
      <form id="login-frm" action="" method="post">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
          <input type="text" class="form-control" autofocus name="username" placeholder="Username" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="register-link">
        Contact Admin? <a href="mailto:yearf9730@gmail.com">Contact</a>
        </div>
      </form>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      end_loader();
    });
  </script>
</body>
</html>