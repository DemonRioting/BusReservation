<?php
include_once('includes/dbconnection.php');

if (strlen($_SESSION['uid'] == 0)) {
	header('location:logout.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reservation Form</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main2.css">
<!--===============================================================================================-->
<!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>


	<div id="wrapper">

		<!-- Sidebar -->
		<?php include_once('includes/sidebar.php');?>
		<!-- End of Sidebar -->

		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Topbar -->
			<?php include_once('includes/header.php');?>
			<!-- End of Topbar -->
	
			<form class="contact100-form validate-form" action="passengerinfo_submit.php" method="POST">
				<span class="contact100-form-title">
					Passenger Info
				</span>

                <div class="wrap-input100">
                    <span class="label-input100">Passenger</span>
				</div>

                <div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Title *</span>
					<div>
						<select class="js-select2" name="passengerTitle">
							<option value = NULL>none</option>
							<option value = "Mr.">Mr.</option>
							<option value = "Mrs.">Mrs.</option>
							<option value = "Ms.">Ms.</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type First Name">
					<span class="label-input100">First Name *</span>
					<input class="input100" type="text" name="firstName" placeholder="Enter Your First Name">
				</div>

                <div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Gender *</span>
					<div>
						<select class="js-select2" name="passengerGender">
							<option value = "M">Male</option>
							<option value = "F">Female</option>
							<option value = "O">Other</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Last Name">
					<span class="label-input100">Last Name *</span>
					<input class="input100" type="text" name="lastName" placeholder="Enter Your Last Name">
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Date of Birth">
					<span class="label-input100">Date of Birth *</span>
					<input class="input100" type="date" name="birthDate" placeholder="Enter Your Date of Birth ">
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Nationality">
					<span class="label-input100">Nationality *</span>
					<input class="input100" type="text" name="nationality" placeholder="Enter Your Nationality">
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Religion">
					<span class="label-input100">Religion *</span>
					<input class="input100" type="text" name="religion" placeholder="Enter Your Religion">
				</div>

				<div class="wrap-input100 rs1-wrap-input100">
				    <span class="label-input100">ID Card</span>
				    <input class="input100" type="text" name="IDCard" placeholder="Enter Your ID Card">
				 </div>

                <div class="wrap-input100">
                    <span class="label-input100">Contact</span>
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Email">
				    <span class="label-input100">Email *</span>
				    <input class="input100" type="text" name="email" placeholder="Enter Your Email">
				 </div>

                 <div class="wrap-input100 rs1-wrap-input100">
				    <span class="label-input100">Phone Number</span>
				    <input class="input100" type="text" name="phoneNumber" placeholder="Enter Your Phone Number">
				 </div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Next
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
			<!-- Footer -->
			<?php include_once('includes/footer.php');?>
      		<!-- End of Footer -->
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
