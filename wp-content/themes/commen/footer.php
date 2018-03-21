<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-xs-4 customWidth02">
				<ul>
				 <?php 
                   wp_nav_menu( array(
                        'theme_location' =>'footer',
                        'container'=>'',
                        'menu'=>'',
                        'items_wrap'=>'%3$s'
                    ) );
                    ?>
                  </ul>
			</div>
			<div class="col-md-7 col-xs-4 customWidth04">
				<p>Name</p>
				<p>Email Address</p>
				<p>&nbsp;</p>
				<p>© Commen Athletics 2018</p>
			</div>
			<div class="col-md-3 text-right col-xs-4 col-last customWidthLast">
				<p><i class="fa fa-instagram" aria-hidden="true"></i>COMMEN_ATHLETICS</p>
				<p><i class="fa fa-facebook-official" aria-hidden="true"></i>COMMEN_ATHLETICS</p>
			</div>
		</div>
	</div>
<?php wp_footer(); ?>
</footer>
</body>
</html>