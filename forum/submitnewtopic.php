<?php include "base.php"; ?>
<?php

if (!isset($_SESSION['Username'])) {
    echo "You are not logged in.";
    return;
}

if (!isset($_POST['forumid']) || !isset($_POST['title']) || !isset($_POST['author']) || !isset($_POST['content'])) {

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

    echo "Required: forumid, title, author, content";
    return;
}

$forumid = $_POST['forumid'];
$title = mysql_real_escape_string($_POST['title']);
$author = mysql_real_escape_string($_POST['author']);
$content = nl2br(htmlspecialchars(stripslashes(mysql_real_escape_string($_POST['content']))));

mysql_query("INSERT INTO forum_post (post_title, post_author, post_type, forum_id, content) values('$title','$author','o',$forumid,'$content')") or die("Error in mysql query: " . mysql_error());

$postid = mysql_fetch_array(mysql_query("SELECT post_id FROM forum_post WHERE post_author='$author' AND content='$content' AND forum_id=$forumid AND post_title='$title'"))['post_id'] or die("Mysql query ID fetch error");

echo "<meta http-equiv=\"refresh\" content=\"0;../forum/viewtopic.php?forumid=$forumid&id=$postid\">";


?>