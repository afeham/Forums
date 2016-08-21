<?php include "base.php"; ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cubition</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link
        href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
        rel='stylesheet' type='text/css'>

    <?php include "../../assets/includes/cssIncludes.php"; ?>


</head>
<body>

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

    <?php include "../../assets/includes/navbar.php"; ?>

    <div style="padding-top: 50px;"></div>

    <?php

    if (!empty($_SESSION['Username'])) {

        $user = $_SESSION['Username'];
        $rank = $_SESSION['Rank'];
        echo "<div class=\"container\">";
        echo "<h1 align=\"left\">Your Settings</h1>";
        echo "</br>";

        echo "<div align=\"left\">";



        ?>

        <ul class="nav nav-pills responsive" id="myTab">
            <li class="active"><a href="#overview">Overview</a></li>
            <li><a href="#accountsettings">Account Settings</a></li>
            <li><a href="#profilesettings">Profile Settings</a></li>
        </ul>

        <div class="tab-content responsive">

            <div class="tab-pane active" id="overview">

                <h3>Hey there, <?php echo $user; ?>!</h3>

                <h3>
                    <small>Welcome to your account & profile settings page.</small>
                </h3>
                </br>
                <h4><b>Here's some basic information about your account:</b></h4>

                <p>Username: <?php echo $user; ?></p>

                <p>Rank: <?php
                    if ($rank == "lowdonor") {
                        echo "<a class=\"label label-success\">SHARP</a>";
                    } elseif ($rank == "middonor") {
                        echo "<a class=\"label label-primary\">HITMAN</a>";
                    } elseif ($rank == "highdonor") {
                        echo "<a class=\"label label-warning\">OUTLAW</a>";
                    } elseif ($rank == "jmod") {
                        echo "<a class=\"label label-danger\">JUNIOR MOD</a>";
                    } elseif ($rank == "mod") {
                        echo "<a class=\"label label-danger\">MOD</a>";
                    } elseif ($rank == "smod") {
                        echo "<a class=\"label label-danger\">SENIOR MOD</a>";
                    } elseif ($rank == "admin") {
                        echo "<a class=\"label label-danger\">ADMIN</a>";
                    } elseif ($rank == "owner") {
                        echo "<a class=\"label label-warning\">Developer</a>";
                    } else {
                        echo "<a class=\"label label-default\">PLAYER</a>";
                    }
                    echo "</p>";

                    ?>
                    </br>
                </p><i>This page is incomplete, more details will be available soon.</i></p><!-- TODO -->
            </div>

            <div class="tab-pane" id="accountsettings">

                <h2>Account Settings</h2>

                <hr class="divider" style="max-width: 80%;" align="left"/>

                <form action="editsettings.php?changepassword=true" method="post" name="changepassword"
                      id="changepassword" style="max-width: 25%;">
                    <h3 style="margin-top: 0px">Change Password</h3>
                    <input class="form-control" type="password" name="oldpassword" placeholder="Old Password"
                           id="oldpassword"/><br/>
                    <input class="form-control" type="password" name="newpassword" placeholder="New Password"
                           id="newpassword"/><br/>
                    <input type="hidden" name="changeusername" id="changeusername" value="changeusername"/>
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit" id="submit">
                </form>
            </div>

            <div class="tab-pane" id="profilesettings">

                <h2>Profile Settings</h2>

                <p>Nothing here yet...</p>

            </div>

        </div>

        <?php


        echo "</div>";
        echo "</div>";
    } else {

        echo "<h1>You are not logged in.</h1>";
        echo "<p><a href=\"../../index.php\">Click here to return to the homepage.</a></p>";
    }

    ?>

    <!--//////////////////////////////////
      END PAGE CONTENT
      ////////////////////////////////// -->
</div>
</div>
</div>


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
<script src="//raw.githubusercontent.com/openam/bootstrap-responsive-tabs/master/js/responsive-tabs.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        fakewaffle.responsiveTabs(['xs', 'sm']);
    })(jQuery);
</script>
<script type="text/javascript">
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
</script>

</body>
</html>