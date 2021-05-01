<!DOCTYPE html>
<html>
<head>
	<title>Add Career</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../login/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../login/css/style.css" />

      <link rel="stylesheet" href="../assets/css/style.css" />
</head>

</head>
<body>

  

          <?php
          session_start();
          if ($_SESSION['role']=='Admin') {
           
          }
          else{
          header('location:../index.php');
          }
          ?>
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
         <!--  <h1><a href="../index.php">Home</a></h1>
          <h1><a href="../register.php">Register</a></h1> -->
          <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="#">WELCOME ADIMIN</a></li>
          <li><a class="nav-link scrollto active" href="#"></a></li>
          <!-- <li><a class="nav-link scrollto" href="">Register</a></li> -->

          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
	<div class="container">
		
		<div class="row">
			<!-- <div class="col-4">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoFdNHXVApUh9u_OecVjTYqKEqTN_D5qxvhQ&usqp=CAU" class="img-fluid">
 -->
			</div>
			<div class="col-8">
				<form method="POST" action="">

				<div class="mb-6">
                    <label for="exampleFormControlInput1" class="form-label">CourseName</label>
                    <input type="text" class="form-control"  name ="CourseName">
                </div>

                <div class="mb-6">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                     <textarea   type="text"  name="Description" class="form-control" style=" min-width:500px; max-width:100%;min-height:170px;height:100%;width:100%;" ></textarea>
                   <!--  <input  type="text" class="form-control"  name="Description"> -->
                </div>

                <div class="mb-6">
                    <label for="exampleFormControlInput1" class="form-label">jobs</label>
                    <textarea type="nunber"   name="jobs" class="form-control" style=" min-width:100px; max-width:100%;min-height:50px;height:100%;width:100%;" ></textarea>
                    <!-- <input type="nunber" class="form-control"  name="jobs"> -->
                </div>

                <div class="mb-6">
                    <label for="exampleFormControlInput1" class="form-label">cluster</label>
                    <textarea type="nunber" name="cluster"  class="form-control" style=" min-width:70px; max-width:100%;min-height:50px;height:100%;width:100%;" ></textarea>
                   <!--  <input type="nunber" class="form-control"  name="cluster"> -->
                </div>

              

                 <button  name="save" type="submit" class="btn btn-primary">save</button>
               </form>

			</div>
		</div>
		
	</div>

	<?php require("connect.php");

	if (isset($_POST["save"])) {

		$CourseName =$_POST["CourseName"];
		$Description =$_POST["Description"];
		$jobs=$_POST["jobs"];
        $cluster=$_POST["cluster"];

	 	$sql ="INSERT INTO career(courseName, description, jobs, cluster) VALUES (?,?,?,?)";

        
        if ($stmt =mysqli_prepare($conn,$sql)) {
        	
        	mysqli_stmt_bind_param($stmt,"sssd",$param_Careername,$param_description,$param_job,$param_cluster);
            
            $param_Careername =$CourseName;
            $param_description=$Description;
            $param_job =$jobs;
            $param_cluster =$cluster;

            if (mysqli_stmt_execute($stmt)) {
            	echo "added succesuful";
            	# code...
            }else{
            	echo "something went wrong".mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);


        }else{
        	echo "something wrong";

        }
        mysqli_close($conn);


	 } 




   ?>

</body>
</html>