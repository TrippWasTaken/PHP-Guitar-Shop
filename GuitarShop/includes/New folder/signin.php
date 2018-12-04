<?php
include 'includes/header.php';
?>

<section class="d-flex flex-column justify-content-between" id="login-bg">
    <div id="login">
        <div id="login-screen">
            <div id="app-title">
                <h1 id=login-heading>Login</h1>
            </div>
            <form id="login-form" action="includes/login.inc.php" method="POST">
                <div id="control-group">
                    <input type="text" id="login-field" name="uid" placeholder="username">
                </div>
                <div id="control-group">
                    <input type="password" id="login-field" name="pwd" placeholder="password">
                </div>
                <div id="control-group">
                    <button id="btn" type="submit" name="signin">Sign in</button>
                    <a id="login-link" href="forgotpw.html">Forgotten password? Click here to reset</a>
                    <a id="login-link" href="Signup.php">Not Registered? Sign up now</a>
                </div>
            </form>
        </div>
    </div>
    <div>
        <?php
            $full = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if ( strpos( $full, "login=empty" ) !== false ) {
                    echo "<p class='error'>Please fill in all fields!</p>";
            } elseif ( strpos( $full, "login=usernotfound" ) !== false ) {
                    echo "<p class='error' >Invalid Username</p>";
            } elseif ( strpos( $full, "login=pwderrer" ) !== false ) {
                    echo "<p class='error' >Invalid Password</p>";
            }
        ?>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
