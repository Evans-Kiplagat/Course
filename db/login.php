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
        <h1><a href="../index.php">COURS<span>ES</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
     <!--     <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->

      </div>

    
 <nav id="navbar" class="navbar">
        <ul>
          <h1><a href="../index.php">Home</a></h1>
          <h1><a href="register.php">Register</a></h1>
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
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input name="email" type="email" id="form1Example1" class="form-control" />
                  <label class="form-label" for="form1Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input name="password" type="password" id="form1Example2" class="form-control" required="fill first" />
                  <label class="form-label" for="form1Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                      <label class="form-check-label" for="form1Example3">
                        Remember me
                      </label>
                    </div>
                  </div>

                  <div class="col text-center">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                  </div>
                </div>

                <!-- Submit button -->
                <button name="login" type="submit" class="btn btn-primary btn-block">login</button>

                <?php
          require 'connect.php';

           if(isset($_POST["login"])) 
           {

              $email =$_POST['email'];
              $password =$_POST['password'];

                     //db select
                     $sql ="SELECT * FROM students WHERE email=?";

                        //bind
                       //prepare stmt
                         if ($stmt = mysqli_prepare($conn,$sql))
     {
              // bind
              mysqli_stmt_bind_param($stmt,'s',$param_email);

              $param_email=$email;
              /*$param_password= $password;*/

                    //execute the program
                    mysqli_execute($stmt);

                       $result = mysqli_stmt_get_result($stmt);
             if ($result) 
         {
           $rows = mysqli_num_rows($result);
           if ($rows>0) 
           {
             $record =mysqli_fetch_assoc($result);
               //echo "logined succeessful".$record['firstname'];
                  $dbpass=$record['password'];
               $statu =password_verify($password,$dbpass);

                if ($statu) {
                  session_start();
                  $_SESSION['name']=$record['firstname'];
                  $_SESSION['id']=$record['id'];
                  $_SESSION['role'] =$record['role'];

                  echo "succeessful registered well".$record['firstname'];
echo <<<_END
<script>location.href="../"</script>
_END;                

                                }else
                                {
                                  echo "<span class='text-danger'>wrong username/password</span>";
                                }
             }
               else
                { 
                  echo "<span class='text-danger'>wrong username/password</span>";
                }
      
    }            else{
                       echo "some error".mysql_error($result);
                     }


                   }



    }
    
                  /*else{echo "<h2>fill the login first then login</h2>";}*/


   ?>
  
              </form>

            </div>


          </div>

        </div>

      </div>


    </div>
    <!-- Background image -->


  </header>
  <!--Main Navigation-->

  

  
    <script type="text/javascript" src="../login/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../login/js/script.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>