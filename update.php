<!DOCTYPE HTML>
<html>
<head>
    <title>Slots for Conference</title>
    <link rel="stylesheet" href="style.css" />
             
</head>
<body>
 
    <!-- container -->
    <div class="container">
    <div class="topnav">
                <a class="active" href="index.php">Home</a>
                <a href="timer.php">Start timer</a>
    </div>
    <div class="page-header">
            <h1>Update Product</h1>
    </div>
     
        <?php
// get passed the record ID
// isset() is used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT id, title, description, time, place, speaker FROM slots WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $title = $row['title'];
    $description = $row['description'];
    $time = $row['time'];
    $place = $row['place'];
    $speaker = $row['speaker'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
 <?php
 
 // check if form was submitted
 if($_POST){
     try{
        // write update query
         $query = "UPDATE slots 
                     SET title=:title, description=:description, time=:time, place=:place, speaker=:speaker
                     WHERE id=:id";
  
         // prepare query for excecution
         $stmt = $con->prepare($query);
  
         // posted values
         $title=htmlspecialchars(strip_tags($_POST['title']));
         $description=htmlspecialchars(strip_tags($_POST['description']));
         $time=htmlspecialchars(strip_tags($_POST['time']));
         $place=htmlspecialchars(strip_tags($_POST['place']));
         $speaker=htmlspecialchars(strip_tags($_POST['speaker']));
         
         // bind the parameters
         $stmt->bindParam(':title', $title);
         $stmt->bindParam(':description', $description);
         $stmt->bindParam(':time', $time);
         $stmt->bindParam(':place', $place);
         $stmt->bindParam(':speaker', $speaker);
         $stmt->bindParam(':id', $id);
          
         // Execute the query
         if($stmt->execute()){
             echo "<div class='alert-success'>Record was updated.</div>";
         }else{
             echo "<div class='alert-danger'>Unable to update record. Please try again.</div>";
         }
          
     }
      
     // show errors
     catch(PDOException $exception){
         die('ERROR: ' . $exception->getMessage());
     }
 }
 ?>
 
<!--html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Title</td>
            <td><input type='text' name='title' value="<?php echo htmlspecialchars($title, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Time</td>
            <td><input type='text' name='time' value="<?php echo htmlspecialchars($time, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Place</td>
            <td><input type='text' name='place' value="<?php echo htmlspecialchars($place, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
       <tr>
            <td>Speaker</td>
            <td><input type='text' name='speaker' value="<?php echo htmlspecialchars($speaker, ENT_QUOTES);  ?>" class='form-control' /></td>
       </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn' />
                <a href='index.php' class='btn btn-back'>Back to all slots</a>
            </td>
        </tr>
    </table>
</form>
         
    </div> <!-- end .container -->
    
 
</body>
</html>