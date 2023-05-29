<?php 
session_start();
include ('conn.php');

if (isset($_POST['name'], $_POST['surname'], $_POST['email'])) {


	
	$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
	$surname = trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING));


	if (empty('name')||empty('surname')||empty('email')) {
		die("<p> BOŞ </p>");
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
		die("<p>GEÇERLİ EMAİL GİR </p>");
		
	}

}

try {

 $query = "INSERT INTO users (name ,surname, email) VALUES (? ,? ,?)";
 $query2 = $conn->prepare($query);
 $query2->bindParam(1, $name, PDO::PARAM_STR);
 $query2->bindParam(2, $surname, PDO::PARAM_STR);
 $query2->bindParam(3,$email, PDO::PARAM_STR);
 $query2->execute();

 echo"<p>başarılı </p>";
 header('Location: index.php');
	
} catch (Exception $e) {
	
}







 ?>