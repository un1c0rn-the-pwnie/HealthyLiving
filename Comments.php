<?php 
	require_once '.classes/db.php';
    require_once '.classes/funcs.php';
    require_once '.classes/auth.php';
    require_once 'header.php';

    error_reporting(0); // For not showing any error
	//Ελέγχουμε άμα έχει σταλθεί η φόρμα
    if (isset($_POST['submit'])) {
        if($logged == true){
		//Άμα είναι συνδεδεμένος ελέγχουμε άμα κάθε πεδίο έχει υποβληθεί σωστα
            $comment = $_POST['comment']; 
            $comment = test_input($comment);
            $comment = safe_sqlparam($comment, $conn);

			//το εισάγουμε στην βάση μαζι με το όνομα του που παίρνετε απο το session στο header
            $sql = "INSERT INTO " .$commentdb." (name, comment)
                    VALUES ('$user', '$comment')";                   
            $result = mysqli_query($conn, $sql);
        }
        else{
            die("τί πάς να κάνεις hacker;");
        }       
    }
	//φιλτράρισμα κακόβουλου κώδικα
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<?php
	if($admin === true) {
		echo '<script src="JavaScript/delete_comments.js"></script>';
	}
?>

<!--Εμφάνηση των σχολίων-->
<center>
	<div class="wrapper">
		<div class="prev-comments">
		<?php 
		//Δείχνει κάθε σχόλιο που έχει αποθηκευμένο η βάση της μεταβλητής $commentdb που δίνεται στο αρχείο που καλείται
		$sql = "SELECT * FROM " . $commentdb ;
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div class="single-item" id="comment_<?php echo $row['id']; ?>">
			<?php	
				if($admin === true) {
					echo '<button onclick="deleteComment(\'' . $commentdb . '\', \'' . $row['id'] . '\');" style="padding:0; border: none; background: none; float:right;"><i class="fas fa-eraser" style="color:red;"></i></button>';
				}
			?>
			<h4><?php echo $row['name']; ?></h4>
			<p><?php echo $row['comment']; ?></p>
			</div>
		<?php
			}
		}
		?>
		</div>
		<?php
			//Έλεγχος άμα είναι συνδεδεμένος ως χρήστης δείξε την φόρμα υποβολής σχολίου
			if($logged){
				include_once '.classes/comment_form.php';
			}
			else{
				echo "Απαιτείται σύνδεση για να αφήσετε σχόλιο";
			}
		?>
	</div>
</center>

