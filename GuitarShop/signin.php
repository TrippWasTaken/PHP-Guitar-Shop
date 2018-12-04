<?php
include 'includes/header.php';
?>

    <section class="d-flex flex-column justify-content-between" id="login-bg">
        <div id="login">
			<div id="login-screen">
				<div id="app-title">
					<h1 id=login-heading>Login</h1>
				</div>
				<form id="login-form" action="includes/signin_2.php" method="POST">
					<div id="control-group">
						<input type="text" id="login-field" name="uid" placeholder="username" required>
					</div>
					<div id="control-group">
						<input type="password" id="login-field" name="pwd" placeholder="password" required>
					</div>
					<div id="control-group">
						<button class="btn btn-danger" type="submit" name="signin">Sign in</button>
						<a id="login-link" href="signup.php">Not Registered? Sign up now</a>
                        <?php
                        $full = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if ( strpos( $full, "login=usernotfound" ) == true ) {
						echo "<p class='error' >Invalid Username</p>";
					       }
					       elseif ( strpos( $full, "login=pwderror" ) == true ) {
						      echo "<p class='error' >Invalid Password</p>";
					           }
					   ?>
					</div>
				</form>
            </div>
        </div>
    </section>
<?php
include 'includes/footer.php';
?>