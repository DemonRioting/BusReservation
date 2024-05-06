<?php
session_start();
include('includes/dbconnection.php');

$queryBusstation = "SELECT * FROM busstation ORDER BY BusStationID asc";
$resultBusstation = mysqli_query($con, $queryBusstation);

if(strlen($_SESSION['hid']==0)){
	header('location:../logout.php');
}
else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Employee</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include_once('includes/header.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Employee</h1>
          </div>
          <!-- Content Row -->
        </div>

            
        <form action="insert.php" method="post" name="employeeinfo"> 

              <div class="row">
                <div class="col-4 mb-3">Employee Role</div>
                  <style>
                    .list-col input{
                      margin-right: 15px;
                    }
                  </style>
                  <div class="col-8 mb-3">
                    <input type="radio" class="list-col" name="EmployeeRole" value="S">Staff &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="EmployeeRole" value="B">Bus Staff &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="EmployeeRole" value="D">Bus Driver &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="EmployeeRole" value="A">Admin &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="EmployeeRole" value="M">Bus Schedule Manager &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="EmployeeRole" value="H">HR &nbsp; &nbsp; &nbsp;
                  </div>
              </div>    

              <div class="row">
                <div class="col-4 mb-3">IDCard</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="IDCard" name="IDCard" aria-describedby="emailHelp" required="true" placeholder="IDCard"></div>
              </div>  

              <div class="row">
                <div class="col-4 mb-3">Title</div>
                  <style>
                    .list-col input{
                      margin-right: 15px;
                    }
                  </style>
                  <div class="col-8 mb-3">
                    <input type="radio" class="list-col" name="Title" value="Mr.">Mr. &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="Title" value="Mrs.">Mrs. &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="Title" value="Ms.">Ms. &nbsp; &nbsp; &nbsp;
                  </div>
              </div>

              <div class="row">
                <div class="col-4 mb-3">Firstname</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Firstname" name="Firstname" aria-describedby="emailHelp" required="true" placeholder="Firstname"></div>
                    </div>  

              <div class="row">
                <div class="col-4 mb-3">Lastname </div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Lastname" name="Lastname" aria-describedby="emailHelp" required="true" placeholder="Lastname"></div>  
              </div>
        
              <div class="row">
                <div class="col-4 mb-3">Gender</div>
                  <style>
                    .list-col input{
                      margin-right: 15px;
                    }
                  </style>
                  <div class="col-8 mb-3">
                    <input type="radio" class="list-col" name="EmployeeGender" value="M">Male &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="EmployeeGender" value="F">Female &nbsp; &nbsp; &nbsp;
        			      <input type="radio" class="list-col" name="EmployeeGender" value="O">Other &nbsp; &nbsp; &nbsp;
                  </div>
              </div>

              <div class="row">
                <div class="col-4 mb-3"><Datag>Height</Datag> </div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Height" name="Height" aria-describedby="emailHelp" required="true" placeholder="Height"></div>
                  <div class="col-4 mb-3"><Datag>Weight</Datag> </div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Weights" name="Weights" aria-describedby="emailHelp" required="true" placeholder="Weight"></div>
              </div> 

              <div class="row">
                <div class="col-4 mb-3"><Datag>Date Of Birth</Datag> </div>
                  <div class="col-8 mb-3"> 
                    <input type="date" id="DOB" name="DOB" value="2018-07-22" min="1918-01-01" max="2050-12-31"aria-describedby="emailHelp" required="true"></div>
              </div>

			          <div class="row">
               		<div class="col-4 mb-3"><Datag>BusStationID</Datag> </div>
						          <div class="col-8 mb-3"> 

							          <select name="BusStationID" class="form-control" require>
								          <option value="">-Choose-</option>

                            <?php 
                            foreach($resultBusstation as $resultBusstation)
                            {?>

									        <option value="<?php echo $resultBusstation["BusStationID"];?>"> 
										        <?php 
											      echo $resultBusstation["BusStationID"]; 
										        ?>
									        </option>
									          <?php } ?>
								
							          </select>

						          </div>
				        </div>
              

              <div class="row">
                <div class="col-4 mb-3"><Datag>Start Date</Datag> </div>
                  <div class="col-8 mb-3"> 
                    <input type="date" id="StartDate" name="StartDate" value="2018-07-22" min="1918-01-01" max="2050-12-31" aria-describedby="emailHelp" required="true"></div>
              </div>

              <div class="row">
                <div class="col-4 mb-3">Salary</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Salary" name="Salary" aria-describedby="emailHelp" required="true" placeholder="Salary"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3">Address</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Addresses" name="Addresses" aria-describedby="emailHelp" required="true" placeholder="Address"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3">Phone</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Phone" name="Phone" aria-describedby="emailHelp" required="true" placeholder="Phone"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3"><Datag>Email</Datag> </div>
                  <div class="col-8 mb-3"> <input type="email" class="form-control form-control-user" id="Email" name="Email" aria-describedby="emailHelp" required="true" placeholder="Email"></div>
              </div> 

              <div class="row">
                <div class="col-4 mb-3">Degree</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Degree" name="Degree" aria-describedby="emailHelp" required="true" placeholder="Degree"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3">Academy</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Academy" name="Academy" aria-describedby="emailHelp" required="true" placeholder="Academy"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3">Faculty</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Faculty" name="Faculty" aria-describedby="emailHelp" required="true" placeholder="Faculty"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3">Department</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="Department" name="Department" aria-describedby="emailHelp" required="true" placeholder="Department"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3">Disease Name</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="DiseaseName" name="DiseaseName" aria-describedby="emailHelp" required="true" placeholder="Disease Name"></div>  
              </div>

              <div class="row">
                <div class="col-4 mb-3">Note Disease</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="NoteDisease" name="NoteDisease" aria-describedby="emailHelp" required="true" placeholder="Note Disease"></div>  
              </div>

              <br>
              <div class="row" style="margin-top:4%">
                  <div class="col-4"></div>
                    <div class="col-4">
                      <input type="submit" name="submit"  value="Add Employee" class="btn btn-primary btn-user btn-block" onclick="myFunction()">
                    </div>
              </div>

              <script>
                function myFunction()
                {
                  alert("Add Employee Successfully"); // this is the message in ""
                }
              </script>
      
        </form>

        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
       <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

</body>

</html>

</html>

<?php
}
?>