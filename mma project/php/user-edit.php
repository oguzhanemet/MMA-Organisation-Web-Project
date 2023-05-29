<?php
session_start();
include('conn.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title></title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <a href="index.php" class="btn btn-danger float-end">geri</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $user_id = $_GET['id'];

                            $query = "SELECT * FROM users WHERE id=:users_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':users_id' => $user_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                        ?>
                        <form action="edit.php" method="POST">

                            <input type="hidden" name="user_id" value="<?=$result->id?>" />

                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="name" value="<?= $result->name; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>surname</label>
                                <input type="text" name="surname" value="<?= $result->surname; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>email</label>
                                <input type="text" name="email" value="<?= $result->email; ?>" class="form-control" />
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="update_student_btn" class="btn btn-primary">Update user</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>