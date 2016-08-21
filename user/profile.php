<?php include "../base.php"; ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cubition</title>

    <!-- Bootstrap core CSS -->
    <?php include "../assets/includes/cssIncludes.php"; ?>

</head>
<body>

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

    <div class="container">

        <?php include "../assets/includes/navbar.php"; ?>

        <?php

        if (isset($_GET['user'])) {

            ?>



            <?php

            $name = $_GET['user'];

            $rows = mysql_num_rows(mysql_query("SELECT UserID FROM users WHERE username='$name'"));

            if ($rows != 0) {

                $rank = mysql_fetch_array(mysql_query("SELECT name FROM player_groups WHERE uuid='$uuid'"))['name'];

                $fjmil = mysql_fetch_array(mysql_query("SELECT time FROM player_firstjoin WHERE uuid='$uuid'"))['time'];

                $fjseconds = $fjmil / 1000;
                $firstjoined = date("d-m-Y", $fjseconds);

                $ljmil = mysql_fetch_array(mysql_query("SELECT time FROM player_lastlogin WHERE uuid='$uuid'"))['time'];

                $ljseconds = $ljmil / 1000;
                $lastlogin = date("d-m-Y", $ljseconds);

                $lldate = date("l jS \of F Y", $ljseconds);
                $lldatefull = date("l jS \of F Y h:i:s A", $ljseconds);

                $fjdate = date("l jS \of F Y", $fjseconds);

                $fjdatefull = date("l jS \of F Y h:i:s A", $fjseconds);


                $fontcolor = "#000000";

                $paneltype = "info";

                if (strtolower($rank) == 'default') {

                } elseif (strtolower($rank) == 'lowdonor') {
                    $fontcolor = "#00FF00";
                    $paneltype = "success";
                } elseif (strtolower($rank) == 'middonor') {
                    $fontcolor = "#0000FF";
                    $paneltype = "primary";
                } elseif (strtolower($rank) == 'highdonor') {
                    $fontcolor = "#FFD700";
                    $paneltype = "warning";
                } else {
                    $fontcolor = "#FF0000";
                    $paneltype = "danger";
                }

                ?>

                <div class="page-header">
                    <h1 style="color: <?php echo $fontcolor; ?>"><strong><span
                                style="margin-top: 30px; padding: 0 auto; margin-bottom: 0;"><?php echo $_GET['user'];?></span>
                        </strong>
                        <small>
                            <?php

                            if (strtolower($rank) == 'default') {

                            } elseif (strtolower($rank) == 'lowdonor') {
                                echo "<span class='label label-success'>VIP</span>";
                            } elseif (strtolower($rank) == 'middonor') {
                                echo "<span class='label label-primary'>MVP</span>";
                            } elseif (strtolower($rank) == 'highdonor') {
                                echo "<span class='label label-warning'>PRO</span>";
                            } else {
                                $rankupper = ucwords($rank);
                                echo "<span class='label label-danger'>$rankupper</span>";
                            }



                            ?>
                        </small>
                        <small>
                            <span class="pull-right" style="margin-top: 30px; padding: 0 auto; font-size: 13pt;"><span
                                    data-toggle="tooltip" data-placement="bottom" title="<?php echo $lldatefull; ?>">Last seen on <?php echo $lldate; ?></span></span>
                        </small>
                    </h1>
                </div>

                <div class="panel panel-<?php echo $paneltype; ?>">

                    <div class="panel-heading">
                        <h4>First joined on <strong><span data-toggle="tooltip" data-placement="bottom"
                                                          title="<?php echo $fjdatefull; ?>"><?php echo $fjdate; ?></span></strong>
                        </h4>
                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <!-- Head -->
                            <div class="col-md-2">

                                <img src="<?php echo "https://crafatar.com/avatars/$name?size=150";?>"
                                     style="border-radius: 3px" data-toggle='tooltip' data-placement='top'
                                     title='<?php echo $name; ?>'>

                            </div>

                            <div class="col-md-2">
                                <h3><strong>1394</strong>
                                    <small>kills</small>
                                </h3>
                                <h3><strong>494</strong>
                                    <small>deaths</small>
                                </h3>
                            </div>

                            <div class="col-md-2">
                                <h3><strong>11</strong>
                                    <small>killstreak</small>
                                </h3>
                                <h3><strong>0</strong>
                                    <small>deathstreak</small>
                                </h3>
                            </div>

                            <div class="col-md-2">
                                <h3><strong>21</strong>
                                    <small>achievements</small>
                                </h3>
                                <h3><strong>9034</strong>
                                    <small>coins</small>
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>

                <hr/>

                <div role="tabpanel">


                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab"
                                                                  data-toggle="tab">Overview</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li role="presentation"><a href="#stats" aria-controls="stats" role="tab" data-toggle="tab">Statistics</a>
                        </li>
                        <li role="presentation"><a href="#unlocks" aria-controls="unlocks" role="tab" data-toggle="tab">Unlocks</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="overview">
                            <br/>

                            <div class="well well-sm">
                                <p><span class="label label-primary">OVERVIEW</span> Coming soon...</p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <br/>

                            <div class="well well-sm">
                                <p><span class="label label-success">PROFILE</span> Coming soon...</p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="stats">
                            <br/>

                            <div class="well well-sm">
                                <p><span class="label label-warning">STATISTICS</span> Coming soon...</p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="unlocks">
                            <br/>

                            <div class="well well-sm">
                                <p><span class="label label-info">UNLOCKS</span> Coming soon...</p>
                            </div>
                        </div>
                    </div>
                </div>




            <?php

            } else {

                ?>



                <div style="padding-top:60px"></div>

                <div class="jumbotron">
                    <h1>User not found.</h1>

                    <p>Check the spelling and try again.</p>
                </div>
            <?php

            }

        } else {
            ?>
            <div class="page-header">
                <h3><strong>Please specify a username</strong></h3>
            </div>

        <?php
        }
        ?>


    </div>

</div>
<?php include "../assets/includes/footer.php"; ?>




<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
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