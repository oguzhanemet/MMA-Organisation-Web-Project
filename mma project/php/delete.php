<?php 
session_start();
include ('conn.php');



if (isset($_POST['delete_user'])) {
	
	$user_id = $_POST['delete_user'];

	try {
		$queryD="DELETE FROM users WHERE id=? LIMIT 1";
		$query2D=$conn->prepare($queryD);
		$query2D->bindParam(1, $user_id, PDO::PARAM_INT);
		$query_execute = $query2D->execute();

		 if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";

            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: index.php');
            exit(0);
        }

	} catch (Exception $e) {
		echo $e->getMessage();
	}

}

 ?>