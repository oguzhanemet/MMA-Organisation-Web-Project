<?php
session_start();
include('conn.php');

if(isset($_POST['update_user_btn']))
{
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    

    try {

        $query = "UPDATE users SET name=:name, surname=:surname, email=:email WHERE id=:user_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':name' => $name,
            ':surname' => $surname,
            ':email' => $email,
            ':user_id' => $users_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: index.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>