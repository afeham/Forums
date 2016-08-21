<?php
include "base.php";
if (empty($_SESSION['Username'])) {
    echo "Not logged in";
    return;
}

$user = $_SESSION['Username'];

if (!empty($_GET['changepassword'])) {

    $newpass = $_POST['newpassword'];

    $md5newpass = md5($newpass);

    $oldpass = $_POST['oldpassword'];

    $md5oldpass = md5($oldpass);

    $checkpass = mysql_query("SELECT * FROM users WHERE Username='" . $user . "' AND Password='" . $md5oldpass . "'");

    if (mysql_num_rows($checkpass) != 1) {
        echo "<meta http-equiv=\"refresh\" content=\"3; url=../../user/account/\" />";
        echo "Incorrect old password";
        echo "If you still see this after 10s, please <a href=\"../../user/account\">click here</a>";
        return;
    }

    $setpassword = mysql_query("UPDATE users SET password='$md5newpass' WHERE Username='$user'");

    if ($setpassword) {
        echo "<meta http-equiv=\"refresh\" content=\"3; url=../..//user/account\" />";
        echo "Password changed successfully.";
        echo "If you still see this after 10s, please <a href=\"../../user/account\">click here</a>";
    } else {
        echo "error";
        echo "Please <a href=\"../../user/account\">click here</a>";
    }


} else {
    echo "invalid action";
}

?>