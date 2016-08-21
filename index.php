<?php
/**
 * Created by PhpStorm.
 * User: Luke199
 * Date: 28/05/2015
 * Time: 17:34
 */
?>

<?php include "base.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cubition">

    <title>Cubition</title>

    <!-- Bootstrap core CSS -->

    <?php include "assets/includes/cssIncludes.php"; ?>


</head>

<body>

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

    <?php include "assets/includes/navbar.php"; ?>

    <div style="background: url('assets/img/index-background.png');">
        <div class="container" style="padding-top: 75px; height: 450px; vertical-align: middle">
            <div class="jumbotron" style="background: transparent; text-align: center;">
                <h1 style="font-size: 70pt;"><font color="white"><strong>Cubition</strong></font></h1>

                <h2><font color="white"> The Next generation <br/> sandbox game </font></h2>

                <div class="btn-group-lg">
                    <h2><a href="/download" class="btn btn-primary btn-lg">Download</a>
                        <a href="/forum" class="btn btn-primary btn-lg">Forums</a>
                    </h2>
                </div>
            </div>
        </div>
        <div class="panel panel-default"
             style="border-radius: 0; text-align: center; background-color: #f5f5f5; vertical-align: middle; padding-top: 7px; padding-bottom: 0px;">


        </div>

    </div>
    <div class="container" align="center">

        <div id="greywrap">
            <div class="row">
                <div class="col-lg-4 callout">
                    <!--<span class="icon icon-stack"></span>-->
                    <h2>Community</h2>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    <a href="/play" data-toggle="tooltip" data-placement="top" title="Join our forums">
                        <button class="btn btn-default">Join our forums »</button>
                    </a>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 callout">
                    <!--<span class="icon icon-eye"></span>--->
                    <h2>Game</h2>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    <a href="/store" data-toggle="tooltip" data-placement="top" title="What is Cubition?">
                        <button class="btn btn-default">What is Cubition? »</button>
                    </a>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 callout">
                    <!--<span class="icon icon-heart"></span>-->
                    <h2>Profile</h2>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    <a href="/forum" data-toggle="tooltip" data-placement="top" title="View your profile">
                        <button class="btn btn-default">View your profile »</button>
                    </a>
                </div>
                <!-- col-lg-4 -->
            </div>
            <!-- row -->
        </div>
    </div>
</div>
</div><!-- greywrap -->
</div>
</div>


<?php include "/assets/includes/footer.php"; ?>


</body>
</html>