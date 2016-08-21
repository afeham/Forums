<?php include "../base.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Minecraft One In The Chamber">

    <title>Cubition</title>

    <!-- Bootstrap core CSS -->
    <?php include "../assets/includes/cssIncludes.php"; ?>

</head>
<body>

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

    <?php include "../assets/includes/navbar.php"; ?>

    <div class="container" style="margin-top: 0; margin-bottom: 0; padding-bottom: 15px; padding-top: 50px"
         align="left">

        <div class="page-header">

            <h1><strong>Forums</strong>
                <small>Get to know the community</small>
            </h1>

        </div>

        <ol class="breadcrumb"
            style="border: 1px solid #ededed; box-shadow: none; background-color: #F2F2F2; border-radius: 3px;">
            <li class="active"><a href="index.php">Forum</a></li>
            <li><a href="index.php">Index</a></li>
        </ol>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">News and Announcements</h3>
            </div>
            <div class="panel-body">
                <?php

                $sql = "SELECT forum_id,forum_name,forum_description,restricted FROM forum WHERE forum_id=1 OR forum_id=2 ORDER BY forum_id";

                $ret = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_assoc($ret)) {


                    $forum_id = $row['forum_id'];
                    $forum_name = $row['forum_name'];
                    $forum_description = $row['forum_description'];
                    $restricted = $row['restricted'];

                    if ($forum_id < 3) {

                        if ($restricted == 1) {
                            echo "<div class='row-fluid'><a href=\"../forum/subforum.php?id=$forum_id\">";
                            echo "<strong><font size='4px'>" . $forum_name . "</font></strong></a>";
                            echo "</br><font size='2px'><small>";
                            echo $forum_description;
                            echo "</small></font></div>";
                            echo "<hr/>";
                        }
                    }

                }

                ?>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Server Related</h3>
            </div>
            <div class="panel-body">
                <?php

                $sql = 'SELECT forum_id,forum_name,forum_description,restricted FROM forum WHERE forum_id=5 OR forum_id=4 ORDER BY forum_id DESC';

                $ret = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_assoc($ret)) {


                    $forum_id = $row['forum_id'];
                    $forum_name = $row['forum_name'];
                    $forum_description = $row['forum_description'];
                    $restricted = $row['restricted'];

                    echo "<div class='row-fluid'><a href=\"../forum/subforum.php?id=$forum_id\">";
                    echo "<strong><font size='4px'>" . $forum_name . "</font></strong></a>";
                    echo "</br><font size='2px'><small>";
                    echo $forum_description;
                    echo "</small></font></div>";
                    echo "<hr/>";

                }

                ?>
            </div>
        </div>

        <!--

        TODO REFORMAT TO WORK PROPER

        -->

    </div>


</div>


<!--//////////////////////////////////
  END PAGE CONTENT
  ////////////////////////////////// -->
</div>
<?php include "../assets/includes/footer.php"; ?>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>

</body>
</html>