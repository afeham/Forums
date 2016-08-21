<?php include "base.php"; ?>
<!DOCTYPE html>
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

    <?php include "../assets/includes/navbar.php"; ?>

    <?php
    if (!isset($_GET['id'])) {
        echo "Forum id not specified";
        return;
    }

    $forumid = $_GET['id'];

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
            $ret = mysql_fetch_array(mysql_query("SELECT * FROM forum WHERE forum_id=$forumid"));
            $forumname = $ret['forum_name'];
            $restricted = $ret['restricted'];

            echo "<li><a href=\"../forum/subforum.php?id=$forumid\">$forumname</a></li>";
            echo "<li class='active'><a href='../forum/newtopic.php'>New Topic</a></li>"
            ?>
        </ol>

        <div class="page-header">

            <h4><strong>New Topic</strong></h4>
        </div>

        <?php

        if (isset($_GET['id'])) {


            ?>
            <?php

            if (isset($_SESSION['Username'])) {

                if ($restricted) {
                    $rank = $_SESSION['Rank'];
                    if (strtolower($rank) != "owner"
                        and strtolower($rank) != "padmin"
                        and strtolower($rank) != "developer"
                        and strtolower($rank) != "admin"
                        and strtolower($rank) != "smod"
                        and strtolower($rank) != "mod"
                    ) {

                        ?>


                        <div class="alert alert-danger" role="alert">You do not have permission to post here.<br>If
                            you believe this
                            is an error, contact an administrator.
                        </div>


                    <?php
                    } else {
                        ?>

                        <form action="../forum/submitnewtopic.php" method="post">
                            <input type="hidden" name="author" id="author"
                                   value="<?php echo $_SESSION['Username']; ?>"/>
                            <input type="hidden" name="forumid" id="forumid" value="<?php echo $forumid; ?>"/>

                            <input type="text" id="title" class="form-control" placeholder="Topic Title" required
                                   data-validation-required-message="Specify a title for your topic" maxlength="100"
                                   name="title"/>
                            <br/>
                                <textarea rows="10" cols="100" class="form-control" placeholder="Topic Content"
                                          name="content"
                                          id="content" required
                                          data-validation-required-message="Please enter your message"
                                          maxlength="999" style="resize:none"></textarea>
                            <br/>
                            <input type="submit" class="btn btn-primary" value="Create Topic" name="submit" id="submit">
                        </form>


                    <?php
                    }

                } else {


                    ?>

                    <form action="../forum/submitnewtopic.php" method="post">
                        <input type="hidden" name="author" id="author"
                               value="<?php echo $_SESSION['Username']; ?>"/>
                        <input type="hidden" name="forumid" id="forumid" value="<?php echo $forumid; ?>"/>

                        <input type="text" id="title" class="form-control" placeholder="Topic Title" required
                               data-validation-required-message="Specify a title for your topic" maxlength="100"
                               name="title"/>
                        <br/>
                            <textarea rows="10" cols="100" class="form-control" placeholder="Topic Content"
                                      name="content"
                                      id="content" required data-validation-required-message="Please enter your message"
                                      maxlength="999" style="resize:none"></textarea>
                        <br/>
                        <input type="submit" class="btn btn-primary" value="Create Topic" name="submit" id="submit">
                    </form>


                <?php

                }
            } else {
                echo "<p>You must be logged into to create a new topic.</p>";
                echo "<p><a href='../forum/subforum.php?id=$forumid'>Go back</a></p>";
            }
        } else {
            echo "<p>No forum id specified</p>";
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