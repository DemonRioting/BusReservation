<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
//error_reporting(0);
include('includes/dbconnection.php');

if (!isset($errors)) {
  $errors = array();
}

$form = $_SESSION["form"];

$stmt = mysqli_prepare($con, "SELECT SeatID,
SeatNO,
SeatStatus,
Price
FROM seat
WHERE BusScheduleID = ?
ORDER BY SeatNO");
mysqli_stmt_bind_param($stmt, "d", $form["departTime"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
  $seats[substr($row["SeatNO"], 4, 2)] = $row;
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
    <link rel="stylesheet" href="style.css" />
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
  
			<form class="contact100-form validate-form" action="reservation_submit.php" method="POST">
				<span class="contact100-form-title">
					Seat Reservation
				</span>
              
                  <ul class="showcase">
                    <li>
                      <div class="seat"></div>
                      <small>Available</small>
                    </li>
                    <li>
                      <div class="seat selected"></div>
                      <small>Selected</small>
                    </li>
                    <li>
                      <div class="seat sold"></div>
                      <small>Sold</small>
                    </li>
                  </ul>
                  <div class="container">            
                    <div class="row">
                      <div id="seat-01" class="seat"></div>
                      <div id="seat-02" class="seat"></div>
                      <div id="seat-03" class="seat"></div>
                      <div id="seat-04" class="seat"></div>
                    </div>
              
                    <div class="row">
                      <div id="seat-05" class="seat"></div>
                      <div id="seat-06" class="seat"></div>
                      <div id="seat-07" class="seat"></div>
                      <div id="seat-08" class="seat"></div>
                    </div>

                    <div class="row">
                      <div id="seat-09" class="seat"></div>
                      <div id="seat-10" class="seat"></div>
                      <div id="seat-11" class="seat"></div>
                      <div id="seat-12" class="seat"></div>
                    </div>
                    <div class="row">
                      <div id="seat-13" class="seat"></div>
                      <div id="seat-14" class="seat"></div>
                      <div id="seat-15" class="seat"></div>
                      <div id="seat-16" class="seat"></div>
                    </div>

                    <div class="row">
                      <div id="seat-17" class="seat"></div>
                      <div id="seat-18" class="seat"></div>
                      <div id="seat-19" class="seat"></div>
                      <div id="seat-20" class="seat"></div>
                    </div>

                    <div class="row">
                      <div id="seat-21" class="seat"></div>
                      <div id="seat-22" class="seat"></div>
                      <div id="seat-23" class="seat"></div>
                      <div id="seat-24" class="seat"></div>
                    </div>

                    <div class="row">
                        <div id="seat-25" class="seat"></div>
                        <div id="seat-26" class="seat"></div>
                        <div id="seat-27" class="seat"></div>
                        <div id="seat-28" class="seat"></div>
                    </div>

                    <div class="row">
                        <div id="seat-29" class="seat"></div>
                        <div id="seat-30" class="seat"></div>
                        <div class="seat sold"></div>
                        <div class="seat sold"></div>
                    </div>
                  </div>
              
                  <p class="text">
                    You have selected <span id="count">0</span> seat.
                  </p>

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Payment Method *</span>
					<div>
						<select class="js-select2" name="paymentMethod">
							<option value = "M">Master Card</option>
							<option value = "V">Visa Card</option>
							<option value = "C">Cash</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="w-full dis-none js-show-service">
                    <div class="wrap-input100" data-validate = "Enter Your Card ID">
                        <span class="label-input100">Card ID *</span>
                        <input class="input100" type="text" name="cardID" placeholder="Enter Your Card ID">
                    </div>

                    <div class="wrap-input100 rs1-wrap-input100" data-validate = "Enter Your Expire Date">
                        <span class="label-input100">Expire Date *</span>
                        <input class="input100" type="text" name="expireDate" placeholder="Enter Your Expire Date">
                    </div>
                    
                    <div class="wrap-input100 rs1-wrap-input100" data-validate = "Enter Your CVV/CVC">
                        <span class="label-input100">CVV/CVC *</span>
                        <input class="input100" type="text" name="CVV" placeholder="Enter Your CVV/CVC">
                    </div>
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate = "Enter Your Number of Passenger">
					<span class="label-input100">Sub Total</span>
					<input class="input100" type="number" name="subTotal" placeholder="Enter Your Number of Passenger" readonly>
				</div>

        <input name="seatID[]" type="hidden"/>
        <input name="seatID[]" type="hidden"/>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
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
					if($(this).val() == "Please chooses" || $(this).val() == "C") {
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
    var noOfPassenger = <?= $form["noOfPassenger"] ?>;
    var seats = <?= json_encode($seats) ?>;
    for (key in seats) {
      var seat = seats[key];
      var div = $('#seat-'+seat["SeatNO"].substring(4, 6));
      if (seat["SeatStatus"] == "1") {
        div.addClass("sold");
      }
      div.data('SeatID', seat["SeatID"]);
      div.data('SeatNO', seat["SeatNO"]);
      div.data('Price', seat["Price"]);
    }

    $('.seat').on('click', function() {
      var selectedCount = $(".seat.selected").length-1;
      if ($(this).hasClass("selected") || selectedCount < noOfPassenger) {
        $(this).toggleClass("selected");
      }
      var divs = $('input[name="seatID[]"]');
      divs.val("");
      var selectedSeat = $(".seat.selected");
      var subtotal = 0;
      for (var i = 0; i < selectedSeat.length-1; i++) {
        $(divs[i]).val($(selectedSeat[i+1]).data('SeatID'));
        subtotal += parseInt($(selectedSeat[i+1]).data('Price'));
      }
      $('#count').html(selectedSeat.length-1);
      $('input[name=subTotal]').val(subtotal);
    });

  });
  </script>
</body>
</html>
