<?php 

        include "partials/_dbconnect.php";

        // code to insert comment for a thread
        if (isset($_POST['thread_id'])) {
            $threadid = $_POST['thread_id'];
            $sql = "SELECT * FROM `threads` WHERE `thread_id`='$threadid'";
            $result = mysqli_query($conn,$sql);
            $comment = $_POST['comment'];
            $comment = str_replace("<","&lt;",$comment);
            $comment = str_replace(">","&gt;",$comment);
            $user = $_POST['username'];
            $userid_sql = "SELECT * FROM `users988` WHERE `UserName`='$user'";
            $useridresult = mysqli_query($conn,$userid_sql);
            $userid_row = mysqli_fetch_assoc($useridresult);
            $userid = $userid_row['s.r.'];
            $insert_comment_sql="INSERT INTO `comments` (`comment_thread_id`, `comment_description`, `comment_user_id`, `time`) VALUES ('$threadid', '$comment', '$userid', current_timestamp())";
            $insert_comment_result=mysqli_query($conn,$insert_comment_sql);
            // echo "<script>console.log('Your Comment" . '"'." $comment " . '"' ." is posted successfully');</script>";
        }
?>