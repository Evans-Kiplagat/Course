<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>login</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../login/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../login/css/style.css" />

      <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>


<!-- Navbar -->
    <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <h1><a href="../index.html">COURS<span>ES</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
     <!--     <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->

      </div>

    
 <nav id="navbar" class="navbar">
        <ul>
          <h1><a href="../index.php ?>">Home</a></h1>
          <h1><a href="../register.php">login</a></h1>
          <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="">Register</a></li> -->

          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

    
    <!-- Navbar -->

      <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white rounded shadow-5-strong p-5"
              method="POST" action="">
                <div class="form-outline mb-4">
                  <input name="firstName" type="text" id="form1Example1" class="form-control" />
                  <label class="form-label" for="form1Example1">First name</label>
                </div>
                 <!-- lastname input -->
                <div class="form-outline mb-4">
                  <input name="lastname" type="text" id="form1Example1" class="form-control" />
                  <label class="form-label" for="form1Example1">Last name</label>
                </div>
                 <!-- Email input -->
                <div class="form-outline mb-4">
                  <input name="email" type="email" id="form1Example1" class="form-control" />
                  <label class="form-label" for="form1Example2">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input  name="password" type="password" id="form1Example2" class="form-control" />
                  <label class="form-label" for="form1Example3">Password</label>
                </div>
                <!--  confirm Password input -->
                <div class="form-outline mb-4">
                  <input name="con_password" type="password" id="form1Example2" class="form-control" />
                  <label class="form-label" for="form1Example3">confirm password</label>
                </div>

              
                <!-- Submit button -->
                <button name ="register" type="submit" class="btn btn-primary btn-block">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </header>
       
   <?php

   require 'connect.php';

   if(isset($_POST["register"])){

    $firstName =$_POST["firstName"];
    $lastName =$_POST["lastname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
  /*  $con_password =$_POST["con_password"];
*/
    //save the above into the db

    $sql = "INSERT INTO students(firstname,lastname,email,password) VALUES(?,?,?,?)";

    //check if the above is correct
    if ($stmt =mysqli_prepare($conn,$sql)) {
      # bind the param
      mysqli_stmt_bind_param($stmt,"sssd",$param_first,$param_last,$param_email,$param_password);

      $param_first=$firstName;
      $param_last=$lastName;
      $param_email=$email;
      $param_password=$password;

      //execute into the db
      if(mysqli_stmt_execute($stmt)){
        echo "Registered sucessful";
        header("Location:login.php");
      }else{
        echo "failed to register".mysqli_error($conn);
      }
      
      mysqli_stmt_close($stmt);


    }else{
      echo "error in the  query";
    }
    mysqli_close($conn);
   }

   ?>
  
  <!--Main Navigation-->

  
    <script type="text/javascript" src="../login/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../login/js/script.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>