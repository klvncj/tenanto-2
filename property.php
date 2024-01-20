<?php
require_once('config/connect.php');
// allow_access($_SESSION['id'], "./Admin/login.php");
// if (isset($_SESSION['id'])) {
//     $account_id = $_SESSION['id'];
//     $response = get_user($account_id);
//     if ($response) {
//         extract($response);
//     }
// } else {
//     echo "<script>alert('User not found')</script>";
//     header("Location: login.php");
// }

if (isset($_GET['id'])) {
	$list = $_GET['id'];

	$info = get_listing($list);
	if ($info) {
		extract($info);
	}
}


?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BootStrap HTML5 CSS3 Theme</title>
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
	<link rel="stylesheet" href="css/jquery-ui.css">
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
		<div class="at-haslayout at-propertybannerholder">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-12">
						<div class="at-propertybannercontent">
							<div class="at-propertyholder">
								<?php
								$response = get_user($lister);
								if ($response) {
									extract($response);
								}
								?>
								<figure class="at-propertyuserimg at-verifieduser">
									<img src="uploads/<?= $profile_pic ?>" alt="img description">
									<i class="fa fa-shield-alt"></i>
								</figure>
								<div class="at-title">
									<!-- <div class="at-tags">
										<a href="javascript:void(0);" class="at-tag">Featured</a>
										<a href="javascript:void(0);" class="at-tag at-rated">Top Rated</a>
									</div> -->
									<div class="at-username">
										<a href="javascript:void(0);">
											<?= $firstname ?>
											<?= $lastname ?>
										</a>
										<h2>
											<?= $name ?>
										</h2>
										<address><i class="fa fa-location-arrow"></i>
											<?= $location ?>
										</address>
									</div>
								</div>
							</div>
							<div class="at-rightarea">
								<div class="at-singlerate">
									<span><em>₦
											<?= formatNumber($price) ?>
										</em> /
										<?= $frequency ?>
									</span>
								</div>
								<ul class="at-featureabout">
									<li><a href="javascript:void(0);" class="at-like at-liked"><i
												class="far fa-heart"></i>
											<?= $status ?>
										</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="at-propertysilder" class="at-propertysilder owl-carousel">
				<div class="item">
					<div class="at-propertysilder-img at-propertysilder-mtr">
						<figure>
							
                           
								<!-- <img src="images/property-single/img-01.jpg" alt="img description">
                                <img src="images/property-single/img-02.jpg" alt="img description">
								<img src="images/property-single/img-03.jpg" alt="img description"> -->
						</figure>
						<figure>
							
								<img src="uploads/<?= $photo1 ?>" alt="img description">
								<!-- <img src="uploads/<?= $photo2 ?>" alt="img description"> -->
								
							
						</figure>
					</div>
				</div>
				<div class="item">
					<div class="at-propertysilder-img at-propertysilder-mtr2">
						<figure>
							
								<!-- <img src="images/featured-img/icons/360.png" alt="img description" class="at-360-img"> -->
								<img src="uploads/<?= $photo3 ?>" alt="img description">
							
						</figure>
						<figure>
							
								<!-- <img src="images/property-single/img-02.jpg" alt="img description">
								<img src="images/property-single/img-03.jpg" alt="img description"> -->
							
						</figure>
					</div>
				</div>
				<div class="item">
					<div class="at-propertysilder-img at-propertysilder-mtr">
						<figure>
							
								<!-- <img src="images/featured-img/icons/360.png" alt="img description" class="at-360-img"> -->
								<!-- <img src="images/property-single/img-01.jpg" alt="img description"> -->
							
						</figure>
						<figure>
							
								<img src="uploads/<?= $photo4 ?>" alt="img description">
							
							
								<!-- <img src="uploads/<?= $photo5 ?>" alt="img description"> -->
								<!-- <span class="at-video-icon"><i class="fab fa-youtube"></i></span> -->
							
						</figure>
					</div>
				</div>
				<div class="item">
					<div class="at-propertysilder-img at-propertysilder-mtr2">
						<figure>
							
								<!-- <img src="images/featured-img/icons/360.png" alt="img description" class="at-360-img"> -->
								<img src="uploads/<?= $photo5 ?>" small alt="img description">
							
						</figure>
						<figure>
							
								<img src="uploads/<?= $photo2 ?>" small alt="img description">
							
							
								<!-- <img src="images/property-single/img-03.jpg" small alt="img description"> -->
								<!-- <span class="at-video-icon"><i class="fab fa-youtube"></i></span> -->
							
						</figure>
					</div>
				</div>
			</div>
		</div>
		<!-- Home Slider End -->
		<!-- Main Start -->
		<main id="at-main" class="at-main at-haslayout">
			<!-- Two Columns Start -->
			<div class="at-haslayout at-main-section at-propertysingle-mt">
				<div class="container">
					<div class="row">
						<div id="at-twocolumns" class="at-twocolumns at-haslayout">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 float-right">



								<aside id="at-sidebar" class="at-sidebar float-left mt-md-0">
									<div class="at-sideholder">
										<a href="javascript:void(0);" id="at-closesidebar" class="at-closesidebar"><i
												class="ti-close"></i></a>
										<div class="at-sidescrollbar">
											<div class="at-widgets-holder at-textfee-holder">
												<div class="at-widgets-title at-title-textfee" id="headingone" <h2>₦
													<?= formatNumber($price) ?><span>/
														<?= $frequency ?>
													</span></h2>
												</div>


											</div>
											<div class="at-widgets-holder">
												<?php
												$response = get_user($lister);
												if ($response) {
													extract($response);
												}else{
													echo "No agent avalable yet";
												}
												?>
												<div class="at-widgets-title">
													<h2>About Agent</h2>
												</div>
												<div class="at-widgets-content at-authorholder at-authorholdertwo">
													<figure class="at-authorimg at-verifieduser">
														<img src="images/blog-single/user-img/img-07.jpg" alt="img description" width="10" height="10">
														<i class="fa fa-shield-alt"></i>
													</figure>
													<div class="at-authordetails">
														<div class="at-featurerating">
														</div>
														<h3>
															<?= $firstname ?>
															<?= $lastname ?>
														</h3>
													</div>
													<div class="at-btnarea">
														<a href="https://wa.me/+2348107595254" class="at-btn">Contact
															Agent</a>
													</div>
												</div>
											</div>
											<!-- <div class="at-adholder">
												<figure class="at-adimg">
													<a href="javascript:void(0);">
														<img src="images/ad-img.jpg" alt="img description">
													</a>
													<figcaption><span>Advertisement 300px X 250px</span></figcaption>
												</figure>
											</div> -->
										</div>
									</div>
								</aside>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 float-left">
								<div class="at-gridlist-option at-option-mt">
									<a href="javascript:void(0);" id="at-btnopenclose" class="at-btnopenclose"><i
											class="ti-settings"></i></a>
								</div>
								<div class="at-propertylinkdetails at-haslayout">
									<ul class="at-propertylink">
										<li><a href="#at-about">About</a></li>
										<li><a href="#at-amenetiesproperty">Ameneties Others</a></li>
									</ul>
									<div id="at-about" class="at-propertydetails at-aboutproperty">
										<div class="at-propertytitle">
											<h3>About Property</h3>
										</div>
										<div class="at-description">
											<p>
												<?= $details ?>
											</p>

										</div>
									</div>

									<!-- 									
									
									<div id="at-termspolicy-holder" class="at-termspolicy-holder at-haslayout">
										<div class="at-termspolicy">
											<figure class="at-termspolicy-img">
												<img src="images/property-single/team-img.jpg" alt="img description">
											</figure>
											<div class="at-termspolicy-content">
												<div class="at-title">
													<h3>Terms &amp; Policy</h3>
												</div>
												<div class="at-description">
													<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt
														labore etdolore magna aliqua enim adminim veniam quis nostrud
														exercitation ullamco laboris nisi ut aliquip ex ea commodo
														consequat aute irure dolor in reprehenderit ina voluptate velit
														esse cillum fugiat nulla pariatur.</p>
												</div>
												<div class="at-btnarea">
													<a href="javascript:void(0);" class="at-btn at-btnactive">Read All
														Policies</a>
												</div>
											</div>
										</div>
									</div> -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Two Columns End -->
		</main>
		<!-- Main End -->
		<!-- Footer Start -->
		<?php
		require_once('footer.php')
			?>
		<!-- Footer End -->
	</div>
	<!-- Wrapper End -->
	<!-- Login Popup Start-->
	<div class="modal fade at-loginpopup" tabindex="-1" role="dialog" id="loginpopup" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="at-modalcontent modal-content">
				<div class="at-popuptitle">
					<h4>Login</h4>
					<a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross"
							data-dismiss="modal"></i></a>
				</div>
				<div class="modal-body">
					<form class="at-formtheme at-formlogin">
						<fieldset>
							<div class="form-group">
								<input type="text" name="email" value="" class="form-control" placeholder="Your Email*"
									required="">
							</div>
							<div class="form-group">
								<input type="password" value="" class="form-control" placeholder="Password*">
							</div>
							<div class="form-group at-btnarea">
								<span class="at-checkbox">
									<input id="at-login" type="checkbox" name="rememberme">
									<label for="at-login">Remember me here</label>
								</span>
								<button type="submit" class="at-btn">login</button>
							</div>
						</fieldset>
					</form>
					<span class="at-optionsbar"><em>or</em></span>
					<div class="at-loginicon">
						<ul>
							<li><a href="javascript:void(0);" class="at-facebookbox"><i
										class="fab fa-facebook-f"></i>Via facebook</a></li>
							<li><a href="javascript:void(0);" class="at-googlebox"><i class="fab fa-facebook-f"></i>Via
									facebook</a></li>
						</ul>
					</div>
				</div>
				<div class="modal-footer">
					<div class="at-popup-footerterms">
						<span>By signing in you agree to these <a href="javascript:void(0);"> Terms &amp; Conditions</a>
							&amp; consent to<a href="javascript:void(0);"> Cookie Policy &amp; Privacy
								Policy.</a></span>
					</div>
					<div class="at-loginfooterinfo">
						<a href="javascript:void(0);"><em>Not a member?</em> Signup Now</a>
						<a href="javascript:;" class="at-forgot-password">Forgot password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Login Popup End-->
	<!-- Register Popup Start-->
	<div class="modal fade at-loginpopup" tabindex="-1" role="dialog" id="registerpopup" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="at-modalcontent modal-content">
				<div class="at-popuptitle">
					<h4>Register</h4>
					<a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross"
							data-dismiss="modal"></i></a>
				</div>
				<div class="modal-body">
					<form class="at-formtheme at-formlogin">
						<fieldset>
							<div class="form-group">
								<input type="text" name="email" value="" class="form-control" placeholder="Your Email*"
									required="">
							</div>
							<div class="form-group">
								<input type="password" value="" class="form-control" placeholder="Password*">
							</div>
							<div class="form-group">
								<input type="password" value="" class="form-control" placeholder="Retype Password*">
							</div>
							<div class="form-group at-btnarea">
								<button type="submit" class="at-btn">Register</button>
							</div>
						</fieldset>
					</form>
					<span class="at-optionsbar"><em>or</em></span>
					<div class="at-loginicon">
						<ul>
							<li><a href="javascript:void(0);" class="at-facebookbox"><i
										class="fab fa-facebook-f"></i>Via facebook</a></li>
							<li><a href="javascript:void(0);" class="at-googlebox"><i class="fab fa-facebook-f"></i>Via
									facebook</a></li>
						</ul>
					</div>
				</div>
				<div class="modal-footer">
					<div class="at-popup-footerterms">
						<span>By signing in you agree to these <a href="javascript:void(0);"> Terms &amp; Conditions</a>
							&amp; consent to<a href="javascript:void(0);"> Cookie Policy &amp; Privacy
								Policy.</a></span>
					</div>
					<div class="at-loginfooterinfo">
						<a href="javascript:void(0);"><em>Have Account?</em> Login Now</a>
						<a href="javascript:;" class="at-forgot-password">Forgot Your Password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Register Popup End-->
	<!-- Find Property Popup Start-->
	<div class="modal fade at-findpropertypopup" tabindex="-1" role="dialog" id="findproperty" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="at-modalcontent modal-content">
				<div class="at-slider-content">
					<div class="at-title">
						<h4>Start Your Search Here</h4>
						<a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross"
								data-dismiss="modal"></i></a>
					</div>
					<div class="at-findpropertypopup-content at-haslayout">
						<div class="row">
							<div class="col-12 col-md-12 col-lg-6 float-left">
								<form class="at-formtheme at-formbanner">
									<fieldset class="at-datetime">
										<div class="form-group">
											<div class="at-select">
												<select>
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
													<input type="text" id="at-startdatetwo" class="form-control"
														placeholder="date">
												</div>
												<div class="at-select">
													<label>Check-Out:</label>
													<input type="text" id="at-enddatetwo" class="form-control"
														placeholder="date">
												</div>
												<a href="javascript:void(0);" class="at-calendarbtn"><i
														class="ti-calendar"></i></a>
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
															<input id="at-adults1p" type="radio" name="adults"
																value="adults" checked="">
															<label for="at-adults1p">01</label>
														</span>
														<span class="at-radio">
															<input id="at-adults2p" type="radio" name="adults"
																value="adults2">
															<label for="at-adults2p">02</label>
														</span>
														<span class="at-radio">
															<input id="at-adults3p" type="radio" name="adults"
																value="adults3">
															<label for="at-adults3p">03</label>
														</span>
														<div class="at-dropdown">
															<span><em class="selected-search-type">Other </em><i
																	class="ti-angle-down"></i></span>
														</div>
														<div class="at-radioholder">
															<span class="at-radio">
																<input id="at-adults4p" data-title="04" type="radio"
																	name="adults" value="adults4">
																<label for="at-adults4p">04</label>
															</span>
															<span class="at-radio">
																<input id="at-adults5p" data-title="05" type="radio"
																	name="adults" value="adults5">
																<label for="at-adults5p">05</label>
															</span>
															<span class="at-radio">
																<input id="at-adults6p" data-title="06" type="radio"
																	name="adults" value="adults6">
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
															<input id="at-adultsv1p" type="radio" name="adultsv"
																value="adultsv1">
															<label for="at-adultsv1p">01</label>
														</span>
														<span class="at-radio">
															<input id="at-adultsv2p" type="radio" name="adultsv"
																value="adultsv2">
															<label for="at-adultsv2p">02</label>
														</span>
														<span class="at-radio">
															<input id="at-adultsv3p" type="radio" name="adultsv"
																value="adultsv3" checked="">
															<label for="at-adultsv3p">03</label>
														</span>
														<div class="at-dropdown">
															<span><em class="selected-search-type">Other </em><i
																	class="ti-angle-down"></i></span>
														</div>
														<div class="at-radioholder">
															<span class="at-radio">
																<input id="at-adultsv4p" data-title="04" type="radio"
																	name="adultsv" value="adultsv4">
																<label for="at-adultsv4p">04</label>
															</span>
															<span class="at-radio">
																<input id="at-adultsv5p" data-title="05" type="radio"
																	name="adultsv" value="adultsv5">
																<label for="at-adultsv5p">05</label>
															</span>
															<span class="at-radio">
																<input id="at-adultsv6p" data-title="06" type="radio"
																	name="adultsv" value="adultsv6">
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
															<input id="at-adultsv11" type="radio" name="adultsb"
																value="adultsb" checked="">
															<label for="at-adultsv11">01</label>
														</span>
														<span class="at-radio">
															<input id="at-adultsv2bp" type="radio" name="adultsb"
																value="adults2b">
															<label for="at-adultsv2bp">02</label>
														</span>
														<span class="at-radio">
															<input id="at-adults3bp" type="radio" name="adultsb"
																value="adults3b">
															<label for="at-adults3bp">03</label>
														</span>
														<div class="at-dropdown">
															<span><em class="selected-search-type">Other </em><i
																	class="ti-angle-down"></i></span>
														</div>
														<div class="at-radioholder">
															<span class="at-radio">
																<input id="at-adults4bp" data-title="04" type="radio"
																	name="adultsb" value="adults4b">
																<label for="at-adults4bp">04</label>
															</span>
															<span class="at-radio">
																<input id="at-adults5bp" data-title="05" type="radio"
																	name="adultsb" value="adults5b">
																<label for="at-adults5bp">05</label>
															</span>
															<span class="at-radio">
																<input id="at-adults6bp" data-title="06" type="radio"
																	name="adultsb" value="adults6b">
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
								<form class="at-formtheme at-formbanner">
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
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/tipso.js"></script>
	<script src="js/readmore.js"></script>
	<script src="js/lightpick.js"></script>
	<script src="js/main-min.js"></script>
</body>



</html>