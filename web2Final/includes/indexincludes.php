<div class="wrapper">
    <div id="logInBox">
        <div id="logInBoxHeader">Login</div>
    <?php
    if(isset($_POST['login'])){
        //check token
        if($_SESSION['csrf_token'] !== $_POST['csrf_token']){
            //something wrong or session expierd, dont update
            die('invalid token');
        }
        // get form values
        $email = $_POST['email'];
        $password = $_POST['password'];

        // get user record from database and check login
        $query = "SELECT userId, email, password, role FROM authDemoUsers WHERE email = ?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        // bind these variables to the columns in the record (same order)
        mysqli_stmt_bind_result($stmt, $userId, $email, $hashedPassword, $role);

        // fetch the values into the variables
        // (this is what you would loop over if you had more than one record)
        mysqli_stmt_fetch($stmt);

        // check the password
        if(password_verify($password, $hashedPassword)){


            // update the session with the current user
            $_SESSION['users']['email'] = $email;
            $_SESSION['users']['role'] = $role;

            // redirect
            header('Location: schedule.php');
            die();
        }else{
            echo"<div id='warning'>wrong password or email</div>";
        }
    }

    // logout and redirect to login page
    if(isset($_GET['logout'])){
        // remove session data
        // (only removes username, reuses same cookie -- this is bad)
        unset($_SESSION['users']);

        // destroy the session (and cookie)
        session_destroy();

        // redirect
        header("Location: index.php");
        die();
    }

    ?>
    <?php if(isset($_SESSION['users'])): ?>
        <form method="get">
            <input type="submit" name="logout" value="Log Out">
        </form>
    <?php else: ?>
    <form method="post">
        <div class="formInputs">
            <label for="email">Enter Your Email:</label>
            <input type="text" id="email" name="email" placeholder="Your Email *" value="">
        </div>
        <div class="formInputs">
            <label for="password">Enter Your Password:</label>
            <input type="password" id="password" name="password"  placeholder="Your Password *" value="">
        </div>
        <div class="form-group">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                <div id="loginButton">
            <input class="btn btn-success" type="submit" name="login" value="Login"></div>
        </div>
    </form>
</div>
    </div>
<?php endif; ?>
<div id="forClassOnly">
    Would remove this for actuall use:<br>
    hi viewer login with<br>
    username: r@google.com
    password: 111
</div>

