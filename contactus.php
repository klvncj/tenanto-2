<?php 
if (isset($_POST['send'])) {
    $response = SendMessage($_POST);
    if ($response === true) {
        echo "<div class=\"alert alert-success alert-dismissible text-bg-danger z-3 border-0 fade show\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Success - </strong> Sent
        </div>";
        
    } elseif (is_array($response)) {
        foreach ($response as $error) {
            echo "<div class=\"alert alert-danger alert-dismissible text-bg-danger border-0 fade show\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Error - </strong> '$error'
        </div>";
        }
    } else {
        echo "<div class=\"alert alert-danger alert-dismissible text-bg-danger border-0 fade show\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Error - </strong> There was an issue while signing up
        </div>";
    }
}
?>

<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact Us </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/fontawesome/fontawesome-all.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/fullcalendar.min.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/tipso.css">
	<link rel="stylesheet" href="css/lightpick.css">
	<link rel="stylesheet" href="css/main-min.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/responsive-min.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	
	<!-- Preloader Start -->
	<div class="preloader-outer">
		<div class="at-preloader-holder">
			<img src="images/loader.png" alt="laoder img">
			<div class="at-loader"></div>
		</div>
	</div>
	<!-- Preloader End -->
	<!-- Wrapper Start -->
	<div id="at-wrapper" class="at-wrapper at-haslayout">
		<!-- Header Start -->
		<?php
		require_once('header.php')
			?>
		<!-- Header End -->
		<!-- Inner Banner Start -->
		<div class="at-haslayout at-innerbannerholder">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-12 col-md-12">
						<div class="at-innerbannercontent">
							<div class="at-title"><h2>We’re Happy To Serve You</h2></div>
							<ol class="at-breadcrumb">
								<li><a href="index.html">Main</a></li>
								<li>Contact</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Home Slider End -->
		<!-- Main Start -->
		<main id="at-main" class="at-main at-haslayout">
			<!-- Contact Form Start -->
			<section class="at-haslayout at-main-section">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
							<div class="at-sectionhead">
								<div class="at-sectiontitle">
									<h2>Get In Touch With Us</h2>
									<span>We Offer 24/7 Support</span>
								</div>
								<div class="at-description">
									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco laboris nisiut aliquip</p>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-12 col-xl-10 push-xl-1">
							<form class="at-formtheme at-formcontactus">
								<fieldset>
									<div class="form-group form-group-half">
										<input type="text" name="Firstname" class="form-control" placeholder="First Name">
									</div>
									<div class="form-group form-group-half">
										<input type="text" name="Lastname" class="form-control" placeholder="Last Name">
									</div>
									<div class="form-group form-group-half">
										<input type="email" name="to" class="form-control" placeholder="Your Email">
									</div>
									<div class="form-group form-group-half">
										<input type="text" name="subject" class="form-control" placeholder="Subject">
									</div>
									<div class="form-group">
										<textarea class="form-control" name="message" placeholder="Message" required></textarea>
									</div>
									<div class="form-group">
										<button type="submit" name="send" class="at-btn">Send Now</button>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- Contact Form End -->
			
			<!-- Map Start -->
			
			<!-- Map Start -->
		</main>
		<!-- Main End -->
		<!-- Footer Start -->
		<?php
		require_once('footer.php')
			?>
		<!-- Footer End -->
	</div>
	<!-- Wrapper End -->

	<div class="modal fade at-findpropertypopup" tabindex="-1" role="dialog" id="findproperty" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="at-modalcontent modal-content">
				<div class="at-slider-content">
					<div class="at-title">
						<h4>Start Your Search Here</h4>
						<a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross" data-dismiss="modal"></i></a>
					</div>
					<div class="at-findpropertypopup-content at-haslayout">
						<div class="row">
							<div class="col-12 col-md-12 col-lg-6 float-left">
								<form class="at-formtheme at-formbanner">
									<fieldset class="at-datetime">
										<div class="form-group">
											<div class="at-select">
												<select >
													<option value="" hidden>Where You Want To Stay</option>
													<option value="twitter">China</option>
													<option value="linkedin">France</option>
													<option value="rss">Germany</option>
													<option value="vimeo">Italy</option>
													<option value="tumblr">Japan</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="at-selectdate-holder">
												<div class="at-select">
													<label>Check-In:</label>
													<input type="text" id="at-startdate" class="form-control" placeholder="date">
												</div>
												<div class="at-select">
													<label>Check-Out:</label>
													<input type="text" id="at-enddate" class="form-control" placeholder="date">
												</div>
												<a href="javascript:void(0);" class="at-calendarbtn"><i class="ti-calendar"></i></a>
											</div>
										</div>
									</fieldset>
									<fieldset class="at-guestsform">
										<legend class="at-formtitle">Guests</legend>
										<div class="form-group">
											<ul class="at-guestsinfo">
												<li>
													<div class="at-gueststitle">
														<span>Adults</span>
													</div>
													<div class="at-guests-radioholder">
														<span class="at-radio">
															<input id="at-adults1p" type="radio" name="adults" value="adults" checked="">
															<label for="at-adults1p">01</label>
														</span>
														<span class="at-radio">
															<input id="at-adults2p" type="radio" name="adults" value="adults2">
															<label for="at-adults2p">02</label>
														</span>
														<span class="at-radio">
															<input id="at-adults3p" type="radio" name="adults" value="adults3">
															<label for="at-adults3p">03</label>
														</span>
														<div class="at-dropdown">
															<span><em class="selected-search-type">Other </em><i class="ti-angle-down"></i></span>
														</div>
														<div class="at-radioholder">
															<span class="at-radio">
																<input id="at-adults4p" data-title="04" type="radio" name="adults" value="adults4">
																<label for="at-adults4p">04</label>
															</span>
															<span class="at-radio">
																<input id="at-adults5p" data-title="05" type="radio" name="adults" value="adults5">
																<label for="at-adults5p">05</label>
															</span>
															<span class="at-radio">
																<input id="at-adults6p" data-title="06" type="radio" name="adults" value="adults6">
																<label for="at-adults6p">06</label>
															</span>
														</div>
													</div>
												</li>
												<li>
													<div class="at-gueststitle">
														<span>Children <em>(Ages 2–12)</em></span>
													</div>
													<div class="at-guests-radioholder">
														<span class="at-radio">
															<input id="at-adultsv1p" type="radio" name="adultsv" value="adultsv1">
															<label for="at-adultsv1p">01</label>
														</span>
														<span class="at-radio">
															<input id="at-adultsv2p" type="radio" name="adultsv" value="adultsv2">
															<label for="at-adultsv2p">02</label>
														</span>
														<span class="at-radio">
															<input id="at-adultsv3p" type="radio" name="adultsv" value="adultsv3" checked="">
															<label for="at-adultsv3p">03</label>
														</span>
														<div class="at-dropdown">
															<span><em class="selected-search-type">Other </em><i class="ti-angle-down"></i></span>
														</div>
														<div class="at-radioholder">
															<span class="at-radio">
																<input id="at-adultsv4p" data-title="04" type="radio" name="adultsv" value="adultsv4">
																<label for="at-adultsv4p">04</label>
															</span>
															<span class="at-radio">
																<input id="at-adultsv5p" data-title="05" type="radio" name="adultsv" value="adultsv5">
																<label for="at-adultsv5p">05</label>
															</span>
															<span class="at-radio">
																<input id="at-adultsv6p" data-title="06" type="radio" name="adultsv" value="adultsv6">
																<label for="at-adultsv6p">06</label>
															</span>
														</div>
													</div>
												</li>
												<li>
													<div class="at-gueststitle">
														<span>Infants <em>(Under 2)</em></span>
													</div>
													<div class="at-guests-radioholder">
														<span class="at-radio">
															<input id="at-adultsv11" type="radio" name="adultsb" value="adultsb" checked="">
															<label for="at-adultsv11">01</label>
														</span>
														<span class="at-radio">
															<input id="at-adultsv2bp" type="radio" name="adultsb" value="adults2b">
															<label for="at-adultsv2bp">02</label>
														</span>
														<span class="at-radio">
															<input id="at-adults3bp" type="radio" name="adultsb" value="adults3b">
															<label for="at-adults3bp">03</label>
														</span>
														<div class="at-dropdown">
															<span><em class="selected-search-type">Other </em><i class="ti-angle-down"></i></span>
														</div>
														<div class="at-radioholder">
															<span class="at-radio">
																<input id="at-adults4bp" data-title="04" type="radio" name="adultsb" value="adults4b">
																<label for="at-adults4bp">04</label>
															</span>
															<span class="at-radio">
																<input id="at-adults5bp" data-title="05" type="radio" name="adultsb" value="adults5b">
																<label for="at-adults5bp">05</label>
															</span>
															<span class="at-radio">
																<input id="at-adults6bp" data-title="06" type="radio" name="adultsb" value="adults6b">
																<label for="at-adults6bp">06</label>
															</span>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</fieldset>
								</form>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left">
								<form class="at-formtheme at-formbanner" method="post">
									<fieldset class="at-roomform">
										<legend class="at-formtitle">Room Type</legend>
										<div class="form-group">
											<div class="at-room-radioholder at-room-radiovtwo">
												<span class="at-radio">
													<input id="at-privatep" type="radio" name="privatep" checked>
													<label for="at-privatep">
														<img src="images/radio-imgs/img-04.jpg" alt="img">
														<span><em>Private Room</em> (58,1250)</span>
													</label>
												</span>
												<span class="at-radio">
													<input id="at-sharedp" type="radio" name="privatep">
													<label for="at-sharedp">
														<img src="images/radio-imgs/img-05.jpg" alt="img">
														<span><em>Shared Room</em> (31,5245)</span>
													</label>
												</span>
												<span class="at-radio">
													<input id="at-entirep" type="radio" name="privatep">
													<label for="at-entirep">
														<img src="images/radio-imgs/img-06.jpg" alt="img">
														<span><em>Entire Place</em> (22,4523)</span>
													</label>
												</span>
											</div>
										</div>
										<div class="form-group at-btnarea">
											<a href="javascript:void(0);" class="at-btn">Search Now</a>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Find Property Popup End-->
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/readmore.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/tipso.js"></script>
	<script src="js/lightpick.js"></script>
	<script src="js/main-min.js"></script>
	<script>
		var center = [37.772323, -122.214897];
		$('#at-locationmap')
		.gmap3({
			center: center,
			zoom: 13,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		})
		.marker({
			position: center,
			icon: 'https://maps.google.com/mapfiles/marker_green.png'
		});
	</script>
</body>

<!-- Mirrored from amentotech.com/htmls/tenanto/contactus.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 21:02:25 GMT -->
</html>