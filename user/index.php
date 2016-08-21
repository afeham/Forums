<?php include "../base.php"; ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cubition | Next Gen Sandbox Game">
    <meta name="author" content="Luke199">

    <title>minetality</title>

    <!-- Bootstrap core CSS -->
    <?php include "../assets/includes/cssIncludes.php"; ?>
</head>
<body>
<div id="main">
    <?php
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = mysql_real_escape_string($_POST['username']);
        $password = md5(mysql_real_escape_string($_POST['password']));
        $email = mysql_real_escape_string($_POST['email']);

        $checkusername = mysql_query("SELECT * FROM users WHERE Username = '" . $username . "'");

        if (mysql_num_rows($checkusername) == 1) {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
        } else {
            $registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress, Rank) VALUES('" . $username . "', '" . $password . "', '" . $email . "', 'default')");
            if ($registerquery) {
                echo "<h1>Success</h1>";
                echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
            } else {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
            }
        }
    } else {
        ?>

        <div id="wrap">

            <?php include "../assets/includes/navbar.php"; ?>

            <div class="container" style="padding-top: 50px;">

                <div class="page-header">
                    <h3>Register</h3>
                </div>

                <div class="row" align="center">
                    <div class="row-fluid">
                <span class="col-lg-3">
                <strong>Step 1.</strong> Join one of our servers
                </span>

                <span class="col-lg-3">
                <strong>Step 2.</strong> Type /register
                </span>

                <span class="col-lg-3">
                <strong>Step 3.</strong> Done.
                </span>
                    </div>
                </div>
                <br/>

                <div class="jumbotron">
                    <h2>Yes, it's really that easy</h2>

                    <p>You even get some awesome new features, for free.</p>
                </div>

            </div>


        </div>

        <?php include "../assets/includes/footer.php"; ?>

    <?php
    }
    ?>

</div>
<script src="http://shawckz.com/js/bootstrap.js"></script>
<script src="http://shawckz.com/js/bootstrap.min.js"></script>
<script src="http://shawckz.com/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="http://www.minetality.com/js/bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown()
    });
</script>
</body>
</html>