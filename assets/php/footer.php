    <section id="footer">
		<div class="container bg-dark">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="indx.php"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="offers.php"><i class="fa fa-angle-double-right"></i>Offers</a></li>
						<li><a href="browse.php"><i class="fa fa-angle-double-right"></i>Browse</a></li>
						<li><a href="#contactModal" data-toggle='modal'><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
						<li><a href="admin/"><i class="fa fa-angle-double-right"></i>Administrator</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Social</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-angle-double-right"></i>Facebook</a></li>
						<li><a href="https://www.twitter.com" target="_blank"><i class="fa fa-angle-double-right"></i>Twitter</a></li>
						<li><a href="https://www.instagram.com" target="_blank"><i class="fa fa-angle-double-right"></i>Instagram</a></li>
						<li><a href="https://www.github.com" target="_blank"><i class="fa fa-angle-double-right"></i>GitHub</a></li>
						<li><a href="mailto:plenjo15@gmail.com" target="_blank"><i class="fa fa-angle-double-right"></i>Email</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Profile</h5>
					<ul class="list-unstyled quick-links">
					<?php if(isset($_SESSION['user'])): ?>
						<li><a href="#profileModal" data-toggle='modal'><i class="fa fa-angle-double-right"></i>Profile</a></li>
						<li><a href="wishlist.php"><i class="fa fa-angle-double-right"></i>Wishlist</a></li>
						<li><a href="cart.php"><i class="fa fa-angle-double-right"></i>Cart</a></li>
						<li><a href="orders.php"><i class="fa fa-angle-double-right"></i>Orders</a></li>
						<li><a href="assets/php/_logout.php"><i class="fa fa-angle-double-right"></i>Log Out</a></li>
					<?php else:?>
						<li><a href="#loginModal" data-toggle='modal'><i class="fa fa-angle-double-right"></i>Log In</a></li>
						<li><a href="#signupModal" data-toggle='modal'><i class="fa fa-angle-double-right"></i>Sign Up</a></li>
					<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="https://www.github.com" target="_blank"><i class="fab fa-github"></i></a></li>
						<li class="list-inline-item"><a href="mailto:plenjo15@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>Source code available on <a href="https://www.github.com/Lenjo08/eDuka" target="_blank"><span class="fab fa-github-alt mx-1"></span><u>GitHub</u></a></p>
					<p class="h6">&copy <?php echo date("Y");?> All rights reserved.</p>
				</div>
				<hr>
			</div>	
		</div>
	</section>