<?php 
require_once('config/connect.php');
?>
<!doctype html>
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
		<div class="at-haslayout at-innerbannerholder">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-12 col-md-12">
						<div class="at-innerbannercontent">
							<div class="at-title"><h2>Welcome </h2></div>
							<ol class="at-breadcrumb">
								<li><a href="index.html">Main</a></li>
								<li>Property Listings</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Inner Banner End -->
		<!-- Inner Banner Start -->
		<div class="at-innerbanner-holder at-haslayout at-innerbannersearch">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="at-innerbanner-search">
					
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Home Slider End -->
		<!-- Main Start -->
		<main id="at-main" class="at-main at-haslayout">
			<!-- Two Columns Start -->
			<div class="at-haslayout at-main-section">
				<div class="container">
					<div class="row">
						<div id="at-twocolumns" class="at-twocolumns at-haslayout">
							
							<div class="col-xs-12 col-sm-12">
							<!-- Properties List Start -->
								<div class="at-showresult-holder">
									<div class="at-resulttitle">
										<!-- <strong>Tabs</strong> -->
									</div>
									<div class="at-rightarea">
										<div class="at-select">
											<select>
												<option value="Sort By:" hidden>Sort By:</option>
												<option value="Sort By:">Sort By Date</option>
												<option value="Sort By:">Sort By Featured</option>
											</select>
										</div>
										<div class="at-gridlist-option">
											<a href="javascript:void(0);" class="at-linkactive"><i class="ti-layout-grid2"></i></a>
											<a href="javascript:void(0);"><i class="ti-view-list"></i></a>
											<a href="javascript:void(0);"><i class="ti-location-pin"></i></a>
											<a href="javascript:void(0);" id="at-btnopenclose" class="at-btnopenclose"><i class="ti-settings"></i></a>
										</div>
									</div>
								</div>
								<!-- Listings  -->
								<div class="at-properties-grid at-haslayout">
									<div class="row">
									<?php
                            $listings = fetch_all_desc('listings');
                            if ($listings) {
                                foreach ($listings as $list) {
                                    extract($list); ?>
										<div class="col-12 col-md-6 col-lg-12 col-xl-6" onclick="move('property.php?id=<?=$list_id?>')">
											<div class="at-featured-holder">
												<div class="at-featuredslider owl-carousel">
													<figure class="item">
														<a href="javascript:void(0);"><img src="<?php 
														if($photo1 == ''){
															echo 'images/featured-img/img-01.jpg';
														}else{
															echo 'uploads/'.$photo1;
														}
														?>" alt="img description" class="item"></a>
														<figcaption>
															<div class="at-slider-details">
																<span class="at-photolayer"><i class="fas fa-layer-group"></i>05 Photos</span>
																<a href="javascript:void(0);" class="at-like at-liked"><?=$status?><i class="far fa-star"></i></a>
															</div>
														</figcaption>
													</figure>
													<figure class="item">
														<a href="javascript:void(0);">
															<img src="<?php 
														if($photo2 == ''){
															echo 'images/featured-img/img-02.jpg';
														}else{
															echo 'uploads/'.$photo2;
														}
														?>" alt="img description" class="item">
														</a>
														<figcaption>
															<div class="at-slider-details">
															
															</div>
														</figcaption>
													</figure>
													<figure class="item">
														<a href="javascript:void(0);">
															<img src="<?php 
														if($photo3 == ''){
															echo 'images/featured-img/img-03.jpg';
														}else{
															echo 'uploads/'.$photo3;
														}
														?>" alt="img description" class="item">
														</a>
														<figcaption>
														
														</figcaption>
													</figure>
													<figure class="item">
														<a href="javascript:void(0);">
															<img src="<?php 
														if($photo4 == ''){
															echo 'images/featured-img/img-01.jpg';
														}else{
															echo 'uploads/'.$photo4;
														}
														?>" alt="img description" class="item">
														</a>
														<figcaption>
														
														</figcaption>
													</figure>
												</div>
												<div class="at-featured-content">
													<div class="at-featured-head" onclick="move('property.php?id=<?=$list_id?>')">
														<div class="at-featured-tags"><a href="javascript:void(0);"><?=$category?></a> </div>
														<div class="at-featured-title">
															<h3  onclick="move('property.php?id=<?=$listing_id?>')"><?=$name?> <span>₦<?=formatNumber($price);?> <em> / <?=$frequency?></em></span></h3>
															
														</div>
														<?= substr($details, 0, 30) ?>...<a class="text-primary" href="property.php?id=<?=$listing_id?>">Read More</a>
													</div>
													<div class="at-featured-footer">
														<address><?=$location?></address>
														<div class="at-share-holder">
															<a href="javascript:void(0);"><i class="ti-more-alt"></i></a>
															<div class="at-share-option">
																<span>Share:</span>
																<ul class="at-socialicons">
																	<li class="at-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
																	<li class="at-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
																	<li class="at-youtube"><a href="javascript:void(0);"><i class="fab fa-youtube"></i></a></li>
																	<li class="at-instagram"><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
																</ul>
																<a href="javascript:void(0);">Report</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php }
                            } else {
                                echo "No Listings Yet";
                            } ?>
									</div>
								</div>
							<!-- Properties List End -->
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
					<a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross" data-dismiss="modal"></i></a>
				</div>
				<div class="modal-body">
					<form class="at-formtheme at-formlogin">
						<fieldset>
							<div class="form-group">
								<input type="text" name="email" value="" class="form-control" placeholder="Your Email*" required="">
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
							<li><a href="javascript:void(0);" class="at-facebookbox"><i class="fab fa-facebook-f"></i>Via facebook</a></li>
							<li><a href="javascript:void(0);" class="at-googlebox"><i class="fab fa-facebook-f"></i>Via facebook</a></li>
						</ul>
					</div>
				</div>
				 <div class="modal-footer">
				 	<div class="at-popup-footerterms">
				 		<span>By signing in  you agree to these <a href="javascript:void(0);"> Terms &amp; Conditions</a> &amp; consent to<a href="javascript:void(0);"> Cookie Policy &amp; Privacy Policy.</a></span>
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
					<a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross" data-dismiss="modal"></i></a>
				</div>
				<div class="modal-body">
					<form class="at-formtheme at-formlogin">
						<fieldset>
							<div class="form-group">
								<input type="text" name="email" value="" class="form-control" placeholder="Your Email*" required="">
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
							<li><a href="javascript:void(0);" class="at-facebookbox"><i class="fab fa-facebook-f"></i>Via facebook</a></li>
							<li><a href="javascript:void(0);" class="at-googlebox"><i class="fab fa-facebook-f"></i>Via facebook</a></li>
						</ul>
					</div>
				</div>
				 <div class="modal-footer">
				 	<div class="at-popup-footerterms">
				 		<span>By signing in  you agree to these <a href="javascript:void(0);"> Terms &amp; Conditions</a> &amp; consent to<a href="javascript:void(0);"> Cookie Policy &amp; Privacy Policy.</a></span>
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
													<input type="text" id="at-startdatetwo" class="form-control" placeholder="date">
												</div>
												<div class="at-select">
													<label>Check Out:</label>
													<input type="text" id="at-enddatetwo" class="form-control" placeholder="date">
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
	<script>
	function move(link) {
  window.location.href = link;
}
	</script>
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/tipso.js"></script>
	<script src="js/readmore.js"></script>
	<script src="js/lightpick.js"></script>
	<script src="js/main-min.js"></script>
</body>
</html>