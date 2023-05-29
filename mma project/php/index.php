<?php 
include('conn.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    <th>surname</th>
                                    <th>email</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM users";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                                    $result = $statement->fetchAll();
                                    if($result)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row->id; ?></td>
                                                <td><?= $row->name; ?></td>
                                                <td><?= $row->surname; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <td><a href="user-edit.php?id=<?= $row->id; ?>" class="btn btn-primary">Edit</a></td>
                                                <td>
													 <form action="delete.php" method="POST">
													    <button type="submit" name="delete_user" value="<?=$row->id;?>" class="btn btn-danger">Delete</button>
													  </form>
												</td>
                                                
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-left: 30px;">
<form action="insert.php" method="POST">
<p>Adınız:</p><br>
<input type="text" name="name" required>
<br>
<br>
<p>soyAdınız:</p><br>	
<input type="text" name="surname" required>
<br>
<br>
<p>email;</p><br>
<input type="email" name="email" required>
<input type="submit" value="kaydet">

</form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
