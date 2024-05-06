<?php
session_start();
include('includes/dbconnection.php');

/* ค้นหาพนักงานขับรถ   */
$query1 = "SELECT * FROM employeeinfo WHERE EmployeeRole IN ('B') && EmployeeStatus = '1' ";
$result1 = mysqli_query($con, $query1);

/* ค้นหาพนักงานบนรถ   */
$query2 = "SELECT * FROM employeeinfo WHERE EmployeeRole IN ('D') && EmployeeStatus = '1' ";
$result2 = mysqli_query($con, $query2);

/* ค้นหา  Busstation   */
$queryBusstation = "SELECT * FROM busstation ORDER BY BusStationID asc";
$resultBusstation = mysqli_query($con, $queryBusstation);

/* ค้นหา  Busstation2   */
$queryBusstation2 = "SELECT * FROM busstation ORDER BY BusStationID asc";
$resultBusstation2 = mysqli_query($con, $queryBusstation2);

/* ค้นหา รถคันนที่เท่าไหร่  Buscraft NO   */
$queryBuscraftNO = "SELECT * FROM buscraft ORDER BY BuscraftNO asc";
$resultBuscraftNO = mysqli_query($con, $queryBuscraftNO);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add BusSchedule</title>

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
            <h1 class="h3 mb-0 text-gray-800">ADD Bus Schedule</h1>
          </div>
          <!-- Content Row -->
        </div>

		<form action="insert.php" method="post" name="busschedule">

			<div class="container-fluid">
			<div class="row">
               		<div class="col-4 mb-3"><Datag>Depart Location</Datag> </div>
						<div class="col-8 mb-3"> 


							<select name="DepartLocation" class="form-control" required>
								<option 
									value="">-Choose-
								</option>

									<?php 
										foreach($resultBusstation as $resultBusstation){
									?>

									<option value="<?php echo $resultBusstation["BusStationID"];?>"> 
										<?php 
											echo $resultBusstation["BusStationID"]; 
										?>
									</option>
									<?php } ?>
								
							</select>
						</div>
				</div>

			<!--===================-->

			  <div class="row">
                <div class="col-4 mb-3"><Datag>Depart Date</Datag> </div>
                  <div class="col-8 mb-3"> 
                    <input type="datetime-local" id="DepartDateTime" name="DepartDateTime"
					
					></div>
              </div>
			<!--===============================================================================================-->
			<div class="row">
               		<div class="col-4 mb-3"><Datag>Arrive Location</Datag> </div>
						<div class="col-8 mb-3"> 


							<select name="ArriveLocation" class="form-control" required>
								<option 
									value="">-Choose-
								</option>
									<?php 
										foreach($resultBusstation2 as $resultBusstation2){
									?>

									<option value="<?php echo $resultBusstation2["BusStationID"];?>"> 
										<?php 
											echo $resultBusstation2["BusStationID"]; 
										?>
									</option>
									<?php } ?>
								
							</select>
						</div>
				</div>

			<!--===================-->
			  <div class="row">
                <div class="col-4 mb-3"><Datag>Arrive Date</Datag> </div>
                  <div class="col-8 mb-3"> 
                    <input type="datetime-local" id="ArriveDateTime" name="ArriveDateTime"
					></div>
              </div>
			  
		  	<!--===============================================================================================-->

			

				<div class="row">
               		<div class="col-4 mb-3"><Datag>เลือกคันรถ</Datag> </div>
						<div class="col-8 mb-3"> 

							<select name="BuscraftNO" class="form-control" required>
								<option 
									value="">-Choose-
								</option>

									<?php 
										foreach($resultBuscraftNO as $resultBuscraftNO){
									?>

									<option value="<?php echo $resultBuscraftNO["BuscraftNO"];?>">
										<?php 
											echo $resultBuscraftNO["BuscraftNO"]; 
										?>
									</option>
									<?php } ?>
								
							</select>
						</div>
				</div>
			<!--===============================================================================================-->

       

				<div class="row">
               		<div class="col-4 mb-3"><Datag>เลือกพนักงานขับรถ คนที่1 (Bus Driver)</Datag> </div>
						<div class="col-8 mb-3"> 


							<select name="BusDriverID" class="form-control" required>
								<option 
									value="">-Choose-
								</option>

									<?php 
										foreach($result1 as $results1){
									?>

									<option value="<?php echo $results1["Firstname"];?>"> <?php echo $results1["Firstname"];?>
										<?php 
											echo $results1["Lastname"]; 
										?>
									</option>
									<?php } ?>
								
							</select>
						</div>
				</div>

			<!--===============================================================================================-->

		

			<div class="row">
               		<div class="col-4 mb-3"><Datag>เลือกพนักงานบริการรถ คนที่1 (Bus Staff)</Datag> </div>
						<div class="col-8 mb-3"> 


							<select name="test" class="form-control" required>
								<option 
									value="">-Choose-
								</option>

									<?php 
										foreach($result2 as $results2){
									?>

									<option value="<?php echo $results2["Firstname"];?>"> <?php echo $results2["Firstname"];?>
										<?php 
											echo $results2["Lastname"]; 
										?>
									</option>

									<?php } ?>
								
							</select>
						</div>
				</div>
			<!--===============================================================================================-->
			
              <br>
              <div class="row" style="margin-top:4%">
                  <div class="col-4"></div>
                    <div class="col-4">
                      <input type="submit" name="submit"  value="Add Bus Schedule" class="btn btn-primary btn-user btn-block">
                    </div>
              </div>
      		<!--===============================================================================================-->

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

?>