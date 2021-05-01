<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>new</title>
  
  <!-- <link href="css/style.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../css/mdb.dark.min.css"/>
    <!-- <link rel="stylesheet" href="../login/css/style.css" /> -->
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
          <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>

            <?php
            session_start();
  if (isset($_SESSION['name'])) {
   echo '<li> <a class="nav-link scrollto " href="#">'.$_SESSION['name']; '</a></li>';
   echo ' <li><a class="nav-link scrollto" href="../db/logout.php">Logout</a></li>';
 }
    else{
      // show login./register
      echo '<li><a class="nav-link scrollto" href="../db/login.php">Login</a></li>
          <li><a class="nav-link scrollto" href="../db/register.php">Register</a></li>';

    }
  
  ?>

          
          <li><a class="nav-link scrollto" href="#"></a></li>
          <li><a class="nav-link scrollto" href="#"></a></li>

          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


   



  
                <!--Section: Summary-->

                <?php 
          require ('../db/connect.php');
          $course=$_GET['course'];

           $sql = "SELECT * FROM career WHERE  courseName='$course' ";
          

           $result = mysqli_query($conn,$sql);
           if ($result) {
            $rows = mysqli_num_rows($result);
                if($rows>0){
                while ($records =mysqli_fetch_assoc($result)) {
                    /*echo $records["name"].$records["costs"].$records["descriptions"];*/
                    
                  
                    
               echo '<section>


    
            <div class="text-center" >
              <h4><strong>'.$records["courseName"].'</strong></h4>
            </div>

            <section class="border p-4 mb-4">
              <style>
                .scrollspy-example {
                  position: relative;
                  height: 200px;
                  overflow: auto;
                }
              </style>
              <div class="row">
                <div class="col-md-8">
                  <div
                    data-mdb-spy="scroll"
                    data-mdb-target="#scrollspy"
                    data-mdb-offset="0"
                    class="scrollspy-example"
                  >
                    <section id="example-1">
                      <h3>Description</h3>
                      
                        '. $records["description"].'
                    </section>
                  </div>
                </div>

                <div class="col-md-4">
                  <div id="scrollspy" class="sticky-top">
                    <ul class="nav flex-column nav-pills menu-sidebar">
                      <li class="nav-item">
                        <a class="nav-link active" href="#example-1"
                          >JOBS</a >
                      </li>
                   '.$records["jobs"].'
                      

                    </ul>
                  </div>
                </div>
              </div>



            </section>
          </section>
          <!--Section: Scrollspy-->
<!--Section: Summary-->
                <section>
                  <!-- <button type="button" class="btn btn-success btn-block mb-4">
                    Place order
                  </button> -->

                  <div class="card">
                    <div class="card-header bg-white text-center py-3">
                      <h5 class="mb-0 fw-bold">Cluster Summary</h5>
                    </div>

                    <div class="card-body">
                    '.$records["cluster"].'
                      <ul>
                        <li><strong>kenyatta university: </strong>44.7</li>
                        <li><strong>Univeristy of Nairobi: </strong>45.8</li>
                        <li><strong>Moi University: </strong>49.6</li>
                        <li><strong>kabarak university: </strong>44.7</li>
                        <li><strong>Univeristy of Nairobi: </strong>45.8</li>
                        <li><strong>Moi University: </strong>49.6</li>
                      </ul>
                    </div>

                    <div
                      class="card-footer bg-white d-flex justify-content-between py-3"
                    >
                      <strong>Minimun cluster:</strong>
                      <strong>44.2</strong>
                    </div>
                  </div>
                </section>';



                  } 
                }else{
                  echo "<center> No data for this course is availale </center";/*.mysql_error($rows);*/
                }
            # code...
           }else{
            echo "error".mysqli_error($sql);
           }

        
    ?>


	   

               


</body>
</html>