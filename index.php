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
                <h1 style="font-size: 70pt;"><font color="white"><strong>MCVerge Network</strong></font></h1>

                <h2><font color="white">Competetive PVP minigames for the minecraft community </font></h2>

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
                    <h2>Complex</h2>

                    <p>We take PvP to the next level-this isn't just your ordinary PvP server. It's alright when you're fighting 1 person, but when you get sandwiched between 2 people of the same team, it's an entirely different story.</p>
                    <a href="/games" data-toggle="tooltip" data-placement="top" title="Check out our servers">
                        <button class="btn btn-default">Play Now »</button>
                    </a>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 callout">
                    <!--<span class="icon icon-eye"></span>--->
                    <h2>Community</h2>

                    <p>With new members joining everyday, we offer a variety of players to play with. For each day you come on, it is an entirely new and different experience. Our community is central to Minecraft Verge.</p>
                    <a href="/forum" data-toggle="tooltip" data-placement="top" title="Check out our forums!">
                        <button class="btn btn-default">Visit Forums »</button>
                    </a>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 callout">
                    <!--<span class="icon icon-heart"></span>-->
                    <h2>Entertaining</h2>

                    <p>We offer a plethora of many different types of gamemodes, from Destroy the Monument to Mobster Brawl. We even feature games for just a few friends. You will never get bored whilst playing on Minecraft Verge!</p>
                    <a href="/support/gamemodes" data-toggle="tooltip" data-placement="top" title="View your profile">
                        <button class="btn btn-default">View Gamemodes »</button>
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
