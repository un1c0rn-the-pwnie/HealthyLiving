// Συναρτηση διεγραφης comments αν ο χρηστης ειναι admin μεσω ajax post requests.
function deleteComment(commentdb, id) {
	$.post(".classes/delete_comment.php",
	{ comment_id: id,
	  comment_database: commentdb
	},
	function(data, status){
		if(data == "success") {
			$("#comment_" + id).remove();
		}
	});
}