<?php
/**
 * header for other pages
 */
?>
<!DOCTYPE html>
<html class="no-js">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo bloginfo( 'name' );?></title>
		<meta name="description" content="<?php echo bloginfo( 'description' );?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/images/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
		<?php 
			wp_head();
			$options = get_option('theme_options');
		?>
</head>
<body class="inner-page">
		<header>
			<div class="header-primary">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="header-main">
							<?php
								$header_menu_args = array(
									'menu'            => 'header_menu',
									'container'       => 'div',
									'container_class' => 'top-header-left',
									'theme_location'  => 'header_menu'
									);
								wp_nav_menu( $header_menu_args );

								$header_menu_rt_args = array(
									'menu'            => 'header_right',
									'container'       => 'div',
									'container_class' => 'top-header-right',
									'theme_location'  => 'header_right'
									);
								wp_nav_menu( $header_menu_rt_args );
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-secondary">
				<div class="container">
					<div class="row">
						<div class="col-md-12"> 
							<div class="nav-wrapper">
								<a href="#" class="nav-button"></a>
								<nav class="nav">
									<?php
										$header_menu_args = array(
											'menu'           => 'header_menu',
											'menu_class'     => 'first-navi',
											'container'      => null,
											'theme_location' => 'header_menu'
										);
										wp_nav_menu( $header_menu_args );

										$main_menu_args = array(
											'menu'           => 'main_menu',
											'menu_class'     => 'main-nav',
											'menu_id'        => null,
											'container'      => null,
											'theme_location' => 'main_menu',
											'walker'         => new Esaf_walker(),
										);
										wp_nav_menu( $main_menu_args );
									?>
								</nav>  
							</div>
							<div class="logo">
								<a href="<?php echo home_url();?>">
								<img src="<?php echo $options['logo'];?>" alt="ESAF">
							</a>
							</div>
							<div class="login-search-block">
								<div class="header-search">
									<?php echo get_search_form(); ?>
								</div>
								<div class="header-user-login">
									<div class="header-login-wrap">
										<span class="header-login">Login</span>
										<div class="login-dropdown">
											<form class="form" action="https://netbanking.esafbank.com/RIB/#/" target="_blank">
												<div class="login-dropdown-view">                         
												  <div class="login-choose">
												    <input type="radio" name="pc" id="login-personal" class="login-personal">
												    <label for="login-personal" class="half-size">Personal</label>
												    <input type="radio" name="pc" id="login-corporate" class="login-corporate">
												    <label for="login-corporate">Corporate</label>                            
												  </div> 
												</div>
												<button type="submit" value="Submit" class="login-button">Login
												  <img src="<?php echo get_template_directory_uri()?>/images/login-arrow.png" alt="">
												</button>
											</form>
										</div>
									</div> 
									<div class="header-account">
										<a href="http://esafbank.cmots.com/current-account-apply-online" class="header-account-login">Open an Account</a>
									</div>
								</div>                
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>   