<?php include "base.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Minecraft One In The Chamber">

    <title>Cubition</title>

    <!-- Bootstrap core CSS -->
    <?php include "../assets/includes/cssIncludes.php"; ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->

</head>
<body>

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

    <?php include "../assets/includes/navbar.php"; ?>

    <?php
    if (!isset($_GET['id'])) {
        echo "Forum id not specified";
        return;
    }

    $getid = $_GET['id'];

    $sql = "SELECT post_id,post_title,post_author,post_type,forum_id FROM forum_post WHERE forum_id=$getid AND post_type='o' ORDER BY post_id DESC";

    $ret = mysql_query($sql);


    ?>


    <div class="container" style="margin-top: 0; margin-bottom: 0; padding-bottom: 15px; padding-top: 50px"
         align="left">

        <div class="page-header">

            <h1><strong>Forums</strong>
                <small>Get to know the community</small>
            </h1>

        </div>

        <ol class="breadcrumb"
            style="border: 1px solid #ededed; box-shadow: none; background-color: #F2F2F2; border-radius: 3px;">
            <li><a href="../forum">Forum</a></li>
            <?php
            $forumname = mysql_fetch_array(mysql_query("SELECT forum_name FROM forum WHERE forum_id=$getid"))['forum_name'];

            echo "<li class='active'><a href=\"../forum/subforum.php?id=$getid\">$forumname</a></li>";
            ?>
        </ol>

        <?php

        if (isset($_GET['id'])) {


            ?>

            <div class="container-fluid" style="padding-bottom: 15px;" align="right">

                <?php

                if (isset($_SESSION['Username'])) {

                    ?>

                    <?php echo "<a href=\"../forum/newtopic.php?id=$getid\"><span class='btn btn-success'>New Topic</span></a>"; ?>
                <?php
                } else {
                    echo "<p>Please <a href='../login'>Login or Signup</a> to create a new topic.</p>";
                }
                ?>

            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Topics</h3>
                </div>
                <div class="panel-body">

                    <?php

                    $i = 0;

                    while ($row = mysql_fetch_assoc($ret)) {


                        $admin = false;

                        if (isset($_SESSION['Username'])) {
                            $sessionuser = $_SESSION['Username'];

                            $sessionrank = mysql_fetch_array(mysql_query("SELECT Rank FROM users WHERE Username='$sessionuser'"))['Rank'];


                            if ($sessionrank == 'mod') {
                                $admin = true;
                            } elseif ($sessionrank == 'smod') {
                                $admin = true;
                            } elseif ($sessionrank == 'admin') {
                                $admin = true;
                            }
                        } else {
                            $admin = false;
                        }

                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $forum_id = $row['forum_id'];

                        echo "<div class='row-fluid'>";
                        echo "<div class='col-md-11'><a href=\"../forum/viewtopic.php?id=$post_id&forumid=$getid\">";
                        echo "<strong><font size='4px'>$post_title</font></strong></a>";
                        echo "</br><font size='2px'><small>";
                        echo "By <a href='../user/profile.php?user=$post_author'>$post_author</a>";
                        echo "</small></font></div>";


                        echo "<div align='right' class='btn-group' role='group'>";
                        if ($admin) {
                            echo "<a href='../forum/deletetopic.php?id=$post_id&forumid=$getid'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o fa-fw'></i></button></a>";
                        }
                        echo "</div></div><hr/>";

                        $i += 1;

                    }

                    if ($i == 0) {
                        echo "<p>There are no posts yet.</p>";
                    }

                    ?>

                </div>
            </div>

        <?php

        } else {
            echo "No forum id specified";
            return;
        }


        ?>

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
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>

</body>
</html>