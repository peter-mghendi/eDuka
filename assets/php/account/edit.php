<?php
if (isset($_POST['submit'])){
    extract($_POST);
    $target_dir = "assets/images/users/";
    $target_file = $target_dir.$token.".jpg";

    $ac_query = "SELECT * FROM users WHERE token = '$token'";
    $ac_result = mysqli_query($db, $ac_query) or die(mysqli_error($db));
    $ac_row = mysqli_fetch_row($ac_result);
    if ($param == "account"){
        $check = getimagesize($_FILES["new_pic"]["tmp_name"]);
        $new_email = $new_email==$ac_row[3]? "": $new_email;
        $conf_query = "SELECT * FROM users WHERE email = '$new_email'";
        $conf_result = mysqli_query($db,$conf_query);
        $conf_count = mysqli_num_rows($conf_result);
        if ($conf_count > 0){
            $error = "<script> alert('Update failed! The email address $new_email is already in use.');</script>";
            $_SESSION['account_error'] = $error;
        } else if (!$check){
            $error = "<script> alert('Update failed! Invalid image selected.');</script>";
            $_SESSION['account_error'] = $error;
        } else {
            $new_user = empty($new_user)? $ac_row[2]: $new_user;
            $new_email = empty($new_email)? $ac_row[3]: $new_email;
            if (move_uploaded_file($_FILES['new_pic']['tmp_name'], $target_file)){
                $update_query = "UPDATE users SET name = '$new_user', email = '$new_email' WHERE token = '$token'";
                mysqli_query($db, $update_query);
                $_SESSION['user'] = $new_user;
            } else {
                $error = "<script> alert('Update failed! Could not upload your image.');</script>";
                $_SESSION['account_error'] = $error;
            }
            
            header("location: index.php");
        }
    } else if ($param == "password"){
        $current_password = md5($current_password);
        $new_password = md5($new_password);
        $confirm_new_password = md5($confirm_new_password);

        if ($new_password!=$confirm_new_password){
            $error = "<script> alert('Update failed! The passwords do not match.');</script>";
            $_SESSION['account_error'] = $error;
        } else if ($current_password != $ac_row[4]){
            $error = "<script> alert('Update failed! An incorrect current password was entered.');</script>";
            $_SESSION['account_error'] = $error;
        } else {
            $update_query = "UPDATE users SET password = '$new_password' WHERE token = '$token'";
            mysqli_query($db, $update_query);
            header("location: index.php");
        }
    }
}