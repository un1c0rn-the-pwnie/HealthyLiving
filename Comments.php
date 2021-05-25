<?php 
    include '.classes/configComments.php';

    require_once '.classes/funcs.php';
    require_once '.classes/auth.php';
    require_once 'header.php';

    error_reporting(0); // For not showing any error

    if (isset($_POST['submit'])) { // Check press or not Post Comment Button
        // $name = $_POST['name']; // Get Name from form
        // $email = $_POST['email']; // Get Email from form
        if($logged == true){

            $comment = $_POST['comment']; // Get Comment from form
            $comment = test_input($comment);
            $comment = safe_sqlparam($comment, $conn);

            $sql = "INSERT INTO comments_system (name, comment)
                    VALUES ('$user', '$comment')";                    // The variabel $user is from header.php 
            $result = mysqli_query($conn, $sql);
        }
        else{
            die("τί πάς να κάνεις hacker;");
        }       
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/Comments.css">
    
</head>
<body>
	<div class="wrapper">
	    <div class="prev-comments">
		<?php 
		$sql = "SELECT * FROM comments_system";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		    while ($row = mysqli_fetch_assoc($result)) {
		    ?>
		    <div class="single-item">
			<h4><?php echo $row['name']; ?></h4>
			<p><?php echo $row['comment']; ?></p>
		    </div>
		<?php
		    }
		}
		?>
	    </div>
	    <?php
	    if($logged){
		include_once '.classes/comment_form.php';
	    }
	    else{
		echo "Απαιτείται σύνδεση για να αφήσετε σχόλιο";
	    }
	?>
	</div>

</body>
</html>
