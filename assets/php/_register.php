    <?php
        if (isset($_POST['email'])){
            extract($_POST);
            include '_connect.php';
            if (session_status() == PHP_SESSION_NONE) session_start();

            $len = 12; #Length of user tokens
        function getToken(int $length){
            $token = "";
            $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYX";
            $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
            $codeAlphabet .= "0123456789";
            $max = strlen($codeAlphabet);
            for ($i=0; $i<$length; $i++){
                $token .= $codeAlphabet[random_int(0, $max-1)];
            }
            return $token;
        }

        do{
            $token = getToken($len);
            $tkn_query = "SELECT * FROM users WHERE token = '$token'";
            $tkn_res = mysqli_query($db, $tkn_query);
            $tkn_count = mysqli_num_rows($tkn_res);
        } while ($tkn_count > 0);

        $eml_query = "SELECT * FROM users WHERE email = '$email'";
        $eml_res = mysqli_query($db, $eml_query);
        $eml_count = mysqli_num_rows($eml_res);

        if ($eml_count==0){
            $reg_query = "INSERT INTO users VALUES (null, '$token', '$name', '$email', '$password')";
            mysqli_query($db, $reg_query);
            $_SESSION['token'] = $token;
            $_SESSION['user'] = $name;
            if (isset($_SESSION['login_error'])) session_unregister('login_error');
            if (isset($_SESSION['signup_error'])) session_unregister('signup_error');
            header("location:index.php");
        } else {
            $error = "<div class='container-fluid form-container'><div class='container-fluid form-content'><div class='form-material'>";
            $error .= "<center><h4><b>Account already exists</b></h4></center>";
            $error .= "<hr>";
            $error .= "<center><p class='danger'>ERROR: The email address $email already has an account linked to it.</p></center>";
            $error .= "<br>";
            $error .= "<center><p>Click <a href='login.php'>here</a> to log in instead.</p></center>";
            $error .= "</div></div></div>";
            if (isset($_SESSION['login_error'])) $_SESSION['login_error'] = null;
            $_SESSION['signup_error'] = $error;
        }
    }
?>