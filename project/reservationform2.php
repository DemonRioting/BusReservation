<?php
include_once('includes/dbconnection.php');

if (strlen($_SESSION['uid'] == 0)) {
	header('location:logout.php');
	exit();
}

if (!isset($errors)) {
	$errors = array();
}

$form = $_SESSION["form"];

$start_time = $form["date"]." 00:00:00";
$end_time = $form["date"]." 23:59:59";
$now = date("Y-m-d H:i:s");
$stmt = mysqli_prepare($con, "SELECT
		bs.BusScheduleID, 
		bs.DepartDateTime, 
		bs.ArriveDateTime, 
		bs.DepartLocation, 
		bs.ArriveLocation, 
		bc.BuscraftModel,
		concat(substring(bs.DepartDateTime,12,5),' - ',substring(bs.ArriveDateTime,12,5)) as ScheduleTime,
		case 
			when bc.BuscraftModel = '01' then 'Standard'
			when bc.BuscraftModel = '02' then 'Exclusive'
		end as BuscraftCategory
		FROM busschedule bs
		LEFT JOIN buscraft bc ON bc.BuscraftNO = bs.BuscraftNO
		WHERE bs.DepartLocation = ? 
		AND bs.ArriveLocation = ?
		AND bs.DepartDateTime > ?
		AND bs.DepartDateTime BETWEEN ? AND ?
		ORDER BY bs.DepartDateTime");
mysqli_stmt_bind_param($stmt, "sssss", $form["from"], $form["to"], $now, $start_time, $end_time);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$schedules = array();
while ($row = mysqli_fetch_assoc($result)) {
	array_push($schedules, $row);
}
mysqli_free_result($result);

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

			<form class="contact100-form validate-form" action="reservationform2_submit.php" method="POST">
				<span class="contact100-form-title">
					Reservation
				</span>

				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Time *</span>
					<div data-validate="<?= array_key_exists('departTime', $errors) ? $errors['departTime'] : 'required!!!' ?>">
						<select class="js-select2" name="departTime">
                            <?php foreach ($schedules as $schedule) { ?>
                                <option value="<?= $schedule["BusScheduleID"] ?>"><?= $schedule["ScheduleTime"] ?> <?= $schedule["BuscraftCategory"] ?></option>
                            <?php } ?>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" id="mybutton">
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
	<script>
	$(function() {
		<?php
		foreach ($errors as $field => $msg) {
			echo("showValidate($('[name=$field]'));");
		}
		?>
	});
	</script>

</body>
</html>
