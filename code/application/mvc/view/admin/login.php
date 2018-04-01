
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />		
	<title>ECOMMERCE | LOGIN</title>
        <link href="<?php echo ASSETS; ?>js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>		
        <link href="<?php echo ASSETS; ?>css/font-icons/entypo/css/entypo.css" rel="stylesheet" type="text/css"/>	
	<link rel="stylesheet" href="<?php echo ASSETS; ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ASSETS; ?>css/neon-core.css">
	<link rel="stylesheet" href="<?php echo ASSETS; ?>css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo ASSETS; ?>css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo ASSETS; ?>css/custom.css">        
	<script src="<?php echo ASSETS; ?>js/jquery-1.11.0.min.js"></script>
</head>
<body class="page-body login-page login-form-fall">
<!-- This is needed when you send requests via Ajax --><script type="text/javascript">
var baseurl = '';
</script>
<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="javascript:void(0)" class="logo">
				<img src="<?php echo ASSETS; ?>images/ibrandlogo.png" width="200" alt="" />
			</a>
			
			<p class="description">Dear user, log in to access the admin area!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Please Enter valid <strong> Username</strong>/<strong>Password</strong></p>
			</div>			
           <form method="post" role="form" id="form_login" action="login/admin-login">				
				<div class="form-group">					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>						
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" />
					</div>					
				</div>				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
					</div>				
				</div>				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login" name="login">
						Login In
						<i class="entypo-login"></i>
					</button>
				</div>			
			</form>
			<div class="login-bottom-links">				
                            <a href="#" class="link">Forgot your password?</a>							
			</div>			
		</div>
		
	</div>
	
</div>
	<!-- Bottom Scripts -->
        <script src="<?php echo ASSETS; ?>js/gsap/main-gsap.js" type="text/javascript"></script>       
        <script src="<?php echo ASSETS; ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" type="text/javascript"></script>	
	<script src="<?php echo ASSETS; ?>js/bootstrap.js"></script>
	<script src="<?php echo ASSETS; ?>js/joinable.js"></script>
	<script src="<?php echo ASSETS; ?>js/resizeable.js"></script>
	<script src="<?php echo ASSETS; ?>js/neon-api.js"></script>
	<script src="<?php echo ASSETS; ?>js/jquery.validate.min.js"></script>
	<script src="<?php echo ASSETS; ?>js/neon-login.js"></script>
	<script src="<?php echo ASSETS; ?>js/neon-custom.js"></script>
	<!--<script src="<?php echo ASSETS; ?>js/neon-demo.js"></script>-->
</body>
</html>