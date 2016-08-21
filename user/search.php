<?php include "../base.php"; ?>

<?php

if (!empty($_POST['user'])) {

    $user = $_POST['user'];

    echo "<meta http-equiv=\"refresh\" content=\"0;http://localhost:1337/user/profile?user=$user\">";

} elseif (!empty($_GET['user'])) {
    $user = $GET['user'];

    echo "<meta http-equiv=\"refresh\" content=\"0;http://localhost:1337/user/profile?user=$user\">";
} else {
    echo "User not specified";
}

?>