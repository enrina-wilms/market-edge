<?php  

foreach($list as $status) {	
	
	//DATE WHEN THE STATUS WAS CREATED
	$datePosted = date('l, F d, Y', strtotime($status->date_post));
	
	//GETTING FIRSTNAME AND LASTNAME FOR USERS NAME AND INITIALS TO BE DISPLAY SO USER WILL KNOW WHO OWNS THE POSTS
	$fName = $status->user_fname;
	$lName = $status->user_lname;
	
	/*THIS PART WILL ACT LIKE AND AVATAR FOR POSTED STATUS
	 *FIRST LETTER OF THE FIRSTNAME AND LASTNAME OF THE USER WILL
	 *BE TAKEN AND DISPLAY IT*/
	
	$firstChar = mb_substr($fName, 0, 1, "UTF-8");
	$secChar = mb_substr($lName, 0, 1, "UTF-8");
	
	
	
	echo '<div class="card text-center status-container">'
	.'<div class="card-header text-left status-headbg">'
	. '<div class="status-avatar-circle">'
	. '<span class="status-initials">' . $firstChar . $secChar . '</span>'
	. '</div>'
	. '<div class="status-userInfo">' . '<span class="status-userName">' . $fName . " " . $lName
	. '</span>'
	. '<span class="status-date"><i class="fas fa-clock"></i>&nbsp;'
	. $datePosted
	. '</span>' 
	. '</div>'
	. '</div>'
	.'<div class="card-body status-card-body">'
	. '<span class="status-content">' . $status->content . '</span>'
	.'</div>'
	. '<div class="status-settings mr-auto">'
		
	.'<div class="dropdown">'
	.'<a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
	. '<i class="fas fa-ellipsis-h"></i>'
	.'</a>'
	.'<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
	if($status->user_id == $_SESSION['uid']) {
		
	echo '<a class="dropdown-item">'
	. '<input type="hidden" value="' . $status->id . '" name="id"'
	. 'class="statusBtn"' . '/>'
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Update Status" id="update" name="updateBtn" data-toggle="modal" data-target="#updateModal">' . '<i class="fas fa-user-edit"></i>' . '</i>&nbsp; Edit Status</button>'
	.'</a>'	
		
	.'<a class="dropdown-item" href="">'
	. "<form class='action-btn-style' action='' method='post'>" 
	. "<input type='hidden' value='$status->id' name='id'"
	. 'class="statusBtn"'
	. " />" 
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Delete Status" name="delStatus">'
	. '<i class="fas fa-trash-alt status-delete"></i>&nbsp; Delete Status'
	. '</button>'
	. "</form>"
	.'</a>';
	}else{
		echo '<a class="dropdown-item" href="">'
		.'Hide Post'
		
	.'</a>';
	}
	echo '</div>'
	.'</div>'
	. '</div>'
	.'<div class="card-footer status-headbg">';
	
	/*SUPPOSED TO BE COMMENT SECTION
	 *IF THE SESSION['UID'] DOESNT BELOW TO THAT USER ONLY COMMENTBUTTON WILL APPEAR
	 *THE COMMENT SECTION IS IN DEVELOPMENT PROCESS IN THE FUTURE IT WILL BE ADDED SO USER CAN ADD COMMENTS
	 *AND DISCUSS THINGS ABOUT STOCK MARKET*/
	echo '<div class="status-action-btn">'
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Favourite Status" name="favourite">' . '<i class="far fa-thumbs-up"></i>' . '</i>&nbsp; Favourite</button>'
	. "</div>";
	echo '<div class="status-action-btn">'
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Comment Status" name="comment" data-toggle="modal" data-target="#exampleModalCenter">' . '<i class="far fa-comments"></i>' . '</i>&nbsp; Comment</button>'
	. "</div>";
	echo '<div class="status-action-btn">'
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Comment Status" name="comment">' . '<i class="far fa-share-square"></i>' . '</i>&nbsp; Share</button>'
	. "</div>";
		
	echo "</div>"
	. '</div>';


}

//EOF