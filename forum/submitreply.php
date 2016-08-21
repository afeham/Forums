<?php include "base.php"; ?>
<?php

if (!isset($_SESSION['Username'])) {
    echo "You are not logged in.";
    return;
}

if (!isset($_POST['forumid']) || !isset($_POST['postid']) || !isset($_POST['title']) || !isset($_POST['author']) || !isset($_POST['content'])) {

    if (!isset($_POST['forumid'])) {
        echo "NOT SET forumid";
    }
    if (!isset($_POST['title'])) {
        echo "NOT SET title";
    }
    if (!isset($_POST['author'])) {
        echo "NOT SET author";
    }
    if (!isset($_POST['content'])) {
        echo "NOT SET content";
    }
    if (!isset($_POST['postid'])) {
        echo "NOT SET postid";
    }

    echo "Required: forumid, title, author, content, postid";
    return;
}

$forumid = $_POST['forumid'];
$title = mysql_real_escape_string($_POST['title']);
$author = mysql_real_escape_string($_POST['author']);
$content = nl2br(mysql_real_escape_string($_POST['content']));
$postid = $_POST['postid'];

mysql_query("INSERT INTO forum_post (post_title, post_author, post_type, forum_id, content, reply) values('" . $title . "','" . $author . "','" . r . "',$forumid,'" . $content . "',$postid)") or die("Error in mysql query:" . mysql_error());

echo "<meta http-equiv=\"refresh\" content=\"0;../forum/viewtopic.php?forumid=$forumid&id=$postid\">";


?>