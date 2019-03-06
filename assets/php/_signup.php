    <?php
        $img_path = "assets/images/users/";
        $new_user_img = $img_path."_user.png";
        if (isset($_POST['email'])){
            extract($_POST);
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
        $passwords_match = $password == $confirmpassword;
        $password = md5($password);
        $status = "active";

        $eml_query = "SELECT * FROM users WHERE email = '$email'";
        $eml_res = mysqli_query($db, $eml_query);
        $eml_count = mysqli_num_rows($eml_res);

        if ($eml_count==1){
            $error = "<script> alert('Signup failed! The account $email already exists.');</script>";
            if (isset($_SESSION['login_error'])) $_SESSION['login_error'] = null;
            $_SESSION['signup_error'] = $error;
        } else if (!$passwords_match){
            $error = "<script> alert('Signup failed! The passwords do not match.');</script>";
            if (isset($_SESSION['login_error'])) $_SESSION['login_error'] = null;
            $_SESSION['signup_error'] = $error;
        }else {
            $reg_query = "INSERT INTO users VALUES (null, '$token', '$name', '$email', '$password', '$status')";
            mysqli_query($db, $reg_query);
            $user_img = $img_path.$token.".jpg";
            copy($new_user_img, $user_img);
            $_SESSION['token'] = $token;
            $_SESSION['user'] = $name;
            if (isset($_SESSION['login_error'])) $_SESSION['login_error'] = null;
            if (isset($_SESSION['signup_error'])) $_SESSION['signup_error'] = null;
            header("location: $this_page");
        }
    }
?>