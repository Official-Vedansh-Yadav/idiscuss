<?php 
        
        include "partials/_dbconnect.php";
        
	// While loop to get data from Comments Table
	$threadid = $_POST['thread_id'];
	$comment_sql="SELECT * FROM `comments` WHERE `comment_thread_id`='$threadid'";
	$comment_result = mysqli_query($conn,$comment_sql);
	$html = "";
	while ($comments_row = mysqli_fetch_assoc($comment_result)){
		$noresult = false;
		$comment_desc = $comments_row['comment_description'];
		// getting username
		$userid = $comments_row['comment_user_id'];
		$usersql = "SELECT * FROM `users988` WHERE `s.r.`='$userid'";
		$user_result = mysqli_query($conn,$usersql);
		$row2 = mysqli_fetch_assoc($user_result);
		$username = $row2['UserName'];
		// printing all threads from table
		$html .= "<div class='media d-flex px-3 my-1'>
					<img src='img/unknown-user.png' class='mr-3' alt='unknown-user' style='height: 65px; padding-right: 10px;'>
					<div class='media-body'>
						<h5 class='mt-0'>". $username ."</h5>
						<p>$comment_desc</p>
					</div>
			</div>";
		}
		// Alert when there is no comment
		if($noresult == true){
			$html .= "<div class='alert alert-success fade show' role='alert'>
			<strong>No Threads Found!</strong> - Be the first person to Start Discussion
			</div><br><hr>";
		}
		
		echo $html;
?>