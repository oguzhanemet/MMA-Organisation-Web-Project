<?php
include 'conn.php';
if (isset($_POST['name'], $_POST['surname'], $_POST['email'])) {

    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $surname = trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if (empty($name) || empty($surname) || empty($email)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<p>Lütfen geçerli bir e-posta adresin girin!</p>");
    }

      

        
        
        

        $sorgu = $conn->prepare("INSERT INTO f1s(name, surname, email) VALUES(?, ?, ?)");
        $sorgu->bindParam(1, $name, PDO::PARAM_STR);
        $sorgu->bindParam(2, $surname, PDO::PARAM_STR);
        $sorgu->bindParam(3, $email, PDO::PARAM_STR);

        $sorgu->execute(array($name , $surname , $email));

        header("Location: ../thx.html");
        die();

    

    $baglanti = null;
}

?>