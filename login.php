<?php include "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Minecraft One In The Chamber">

    <title>Cubution | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link
        href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
        rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/pricing-tables.css" rel="stylesheet">
    <link href="/landing-page.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

        /* Sticky footer styles
          -------------------------------------------------- */

        html,
        body {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
        }

        /* Wrapper for page content to push down footer */
        #wrap {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            /* Negative indent footer by it's height */
            margin: 0 auto -60px;
        }

        /* Set the fixed height of the footer here */
        #push,
        #footer {
            height: 60px;
        }

        #footer {
            background-color: #f5f5f5;
        }

        /* Lastly, apply responsive CSS fixes as necessary */
        @media (max-width: 767px) {
            #footer {
                margin-left: -20px;
                margin-right: -20px;
                padding-left: 20px;
                padding-right: 20px;
            }
        }

    </style>
</head>
<body>
<div id="wrap">
    <?php
    if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
        ?>

        <h1>Login Successful</h1>
        <p>Welcome, <code><?= $_SESSION['Username'] ?></code>!</p>
        <p><b>You will be redirected momentarily.</b></p>

        <meta http-equiv="refresh" content="0;/index.php\">

    <?php
    } elseif (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = mysql_real_escape_string($_POST['username']);
        $password = md5(mysql_real_escape_string($_POST['password']));

        $rankcheck = mysql_query("SELECT Rank FROM users WHERE Username='" . $username . "'");

        $row = mysql_fetch_array($rankcheck);
        $rank = $row['Rank'];


        $checklogin = mysql_query("SELECT * FROM users WHERE Username = '" . $username . "' AND Password = '" . $password . "'");

        if (mysql_num_rows($checklogin) == 1) {
            $row = mysql_fetch_array($checklogin);
            $email = $row['EmailAddress'];

            $_SESSION['Username'] = $username;
            $_SESSION['EmailAddress'] = $email;
            $_SESSION['LoggedIn'] = 1;
            $_SESSION['Rank'] = $rank;

            echo "<h1>Login Successful</h1>
     <p><b>Welcome, 
	 ";
            echo $_SESSION['Username'];
            echo "!</b></p>";
            echo "<p>You will be redirected momentarily.</p>";
            echo "<meta http-equiv=\"refresh\" content=\"0;/index.php\">";
        } else {
            echo "<h1>Invalid Username and/or Password</h1>
	 <p><b>You will be redirected momentarily.</b></p>
	 
	 <meta http-equiv=\"refresh\" content=\"0;/index.php\">";
        }
    } else {
        ?>

        <meta http-equiv="refresh" content="0;/index.php\">

    <?php
    }
    ?>

</div>
</body>
</html>