<?php include 'servercrud.php'; 
   //fetch the record
    if(isset($_GET['id'])){
         $id=$_GET['id'];
         $edit_state=true;
         $rec=mysqli_query($con,"SELECT * from crud WHERE id=$id");
         $record=mysqli_fetch_array($rec);
         $name=$record['name'];
         $city=$record['city'];
         $id=$record['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php if (isset($_SESSION['msg'])): ?>
<div class="msg">
    <?php  
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    ?>
    </div>
    <?php endif ?>
<div class="container">
  <div class="col-lg-12">
  <h1>Display Table Data</h1>
  <table class="table table-striped table-hover table-bordered">
    <thead>
    <tr>
    <th>name</th>
    <th>city</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($result)){ ?>
      <tr>
     <td> <?php echo $row['name']; ?></td>
     <td><?php echo $row['city']; ?></td>
     <td><button class="btn-danger btn"><a href="servercrud.php?id=<?php echo $row['id']; ?>">Delete</a></button></td>
     <td><button class="btn-primary btn"><a href="index3.php?id=<?php echo $row['id']; ?>" class="text-white">Edit</a></button></td>
   </tr>
    <?php  } ?>
    </tbody>
    </table>
     </div>
     </div>



    <div class="col-lg-6 m-auto">
    <form action="servercrud.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
    <label>City</label>
    <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
    </div>
    <div class="form-group">
    <?php if($edit_state ==false): ?>
    <button class="btn btn-success" type="submit" name="submit">submit</button>
    <?php else: ?>
      <button class="btn btn-success" type="submit" name="update">Update</button>
      <?php endif ?>
      </div>
     </form>
     </div>


</body>
</html>