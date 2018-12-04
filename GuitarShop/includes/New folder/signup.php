<?php
include 'includes/header.php';
?>

    <section class="d-flex flex-column justify-content-between" id="login-bg">
        <div id="login">
			<div id="login-screen">
				<div id="app-title">
					<h1 id=login-heading>Sign up</h1>
				</div>
				<form id="login-form" action="includes/signup.inc.php" method="POST">
					<div id="control-group">
						<input type="text" id="login-field" name="uid" placeholder="username" required>
					</div>
                    <div id="control-group">
						<input type="text" id="login-field" name="fullname" placeholder="full name" required>
					</div>
					<div id="control-group">
						<input type="email" id="login-field" name="email" placeholder="email" required>
					</div>
                    <div id="control-group">
						<input type="password" id="login-field" name="pwd" placeholder="password" required>
					</div>
                    <div id="control-group">
						<input type="password" id="login-field" name="repwd" placeholder="re-enter password "required>
					</div>
					<div id="control-group">
                        <button id="btn" type="submit" name="Signup">Create Account</button>
						<a id="login-link" href="Signin.php">Already have an account? Sign in here</a>
					</div>
				</form>
            </div>
            <div>
            	<?php
            		$full =
            		"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                
					if ( strpos( $full, "signup=success" ) !== false ) {
					   echo "<p>User successfully registered</p>";
					}
            	?>
            </div>
        </div>
    </section>

<?php
include 'includes/footer.php';
?>

