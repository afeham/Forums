<?php include "base.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cubition | Forums</title>

    <!-- Bootstrap core CSS -->
    <?php include "../assets/includes/cssIncludes.php"; ?>

</head>
<body>

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

    <?php include "../assets/includes/navbar.php"; ?>

    <?php
    if (!isset($_GET['id']) || !isset($_GET['forumid'])) {
        echo "Post id or Forum id not specified";
        return;
    }

    $getid = $_GET['id'];
    $forumid = $_GET['forumid'];

    $sql = "SELECT * FROM forum_post WHERE post_id=$getid AND post_type='o'";

    $row = mysql_fetch_array(mysql_query($sql));

    $post_title = $row['post_title'];

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
            $forumname = mysql_fetch_array(mysql_query("SELECT forum_name FROM forum WHERE forum_id=$forumid"))['forum_name'];

            echo "<li><a href=\"../forum/subforum.php?id=$forumid\">$forumname</a></li>";
            echo "<li class='active'><a href=\"../forum/viewtopic.php?id=$getid&forumid=$forumid\">$post_title</a></li>";
            ?>
        </ol>



        <?php

        if (isset($_GET['id'])){


        ?>
        <?php

        if (isset($_SESSION['Username'])) {


        $post_author = $row['post_author'];
        $content = $row['content'];

        ?>

        <div class="page-header">

            <h4><?php echo $row['post_title']; ?></h4>

        </div>

        <img src="<?php echo "https://crafatar.com/avatars/$post_author?size=35"; ?>" style="border-radius: 3px"
             data-toggle='tooltip' data-placement='top' title='<?php echo $post_author; ?>'>

        <a href="../user/profile.php?user=<?php echo $post_author; ?>"
           style="font-size: 13pt"><?php echo $post_author; ?></a>

        <?php



        $prank = mysql_fetch_array(mysql_query("SELECT Rank FROM users WHERE Username='$post_author'"))['Rank'];

        if (strtolower($prank) == 'default') {

        } elseif (strtolower($prank) == 'lowdonor') {
            echo "<span class='label label-success'>VIP</span>";
        } elseif (strtolower($prank) == 'middonor') {
            echo "<span class='label label-primary'>MVP</span>";
        } elseif (strtolower($prank) == 'highdonor') {
            echo "<span class='label label-warning'>PRO</span>";
        } else {
            $prankupper = ucwords($prank);
            echo "<span class='label label-danger'>$prankupper</span>";
        }

        ?>

        <br/>

        <br/>

        <?php echo $content; ?>

        <hr/>
        <br/>


        <?php

        $sql = "SELECT * FROM forum_post WHERE post_type='r' AND reply=$getid ORDER BY post_id ASC";

        $ret = mysql_query($sql) or die("Error with mysql query");

        $ri = 0;

        while ($row = mysql_fetch_assoc($ret)) {

            ?>

            <?php

            $reply_author = $row['post_author'];
            $reply_id = $row['post_id'];
            $reply_title = $row['post_title'];
            $content = nl2br(htmlspecialchars(stripslashes($row['content'])));



            ?>

            <img src="<?php echo "https://crafatar.com/avatars/$reply_author?size=35"; ?>" style="border-radius: 3px"
                 data-toggle='tooltip' data-placement='top' title='<?php echo $reply_author; ?>'>

            <a href="/player/<?php echo $reply_author; ?>" style="font-size: 13pt"><?php echo $reply_author; ?></a>

            <?php



            $rank = mysql_fetch_array(mysql_query("SELECT Rank FROM users WHERE Username='$reply_author'"))['Rank'];

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

            <br/>

            <?php

            echo "<br/>";
            echo $content;
            $ri += 1;
            echo "<hr/>";
        }


        ?>

        <?php
        if ($ri == 0) {
            ?>
            <div class="panel panel-info">
                <div class="panel-body">
                    <?php
                    echo "<p>There are no replies yet.</p>";
                    ?>
                </div>
            </div>
        <?php
        }

        $restricted = mysql_fetch_array(mysql_query("SELECT restricted FROM forum"))

        ?>



        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Reply to this topic</h3>
            </div>
            <div class="panel-body">

                <form action="../forum/submitreply.php" method="post">
                    <input type="hidden" name="author" value="<?php echo $_SESSION['Username']; ?>"/>
                    <input type="hidden" name="forumid" value="<?php echo $forumid; ?>"/>
                    <input type="hidden" name="postid" value="<?php echo $getid; ?>"/>
                    <input type="hidden" name="title" value="Reply"/>

                    <textarea rows="10" cols="100" class="form-control" placeholder="Topic Content" name="content"
                              id="content" required data-validation-required-message="Type your reply..."
                              maxlength="1000" style="resize:none"></textarea>
                    <br/>
                    <input type="submit" class="btn btn-success" value="Submit Reply" name="submit" id="submit">
                </form>

            </div>

        </div>
    </div>

<br/>
<br/>
<br/>
<?php

}
else {
    echo "<p>You must be logged into to view this.</p>";
    echo "<p><a href='../forum/subforum.php?id=$getid'</p>";
}
}
else {
    echo "<p>No forum id specified</p>";
    return;
}


?>


</div>


<!--//////////////////////////////////
  END PAGE CONTENT
  ////////////////////////////////// -->
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