<!DOCTYPE HTML>
<html>
<head>
    <title>Slots for conference</title>
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
            <h1>Create many slots at once </h1>
            <h3>Since you don't insert values we will use default ones you see now<h3>
    </div>
      
        <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO slots SET title=:title, description=:description, time=:time,place=:place,speaker=:speaker, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $title=htmlspecialchars(strip_tags($_POST['title']));
        $description=htmlspecialchars(strip_tags($_POST['description']));
        $time=htmlspecialchars(strip_tags($_POST['time']));
        $place=htmlspecialchars(strip_tags($_POST['place']));
        $speaker=htmlspecialchars(strip_tags($_POST['speaker']));
        $number=htmlspecialchars(strip_tags($_POST['number']));
        
 
        // bind the parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':place', $place);
        $stmt->bindParam(':speaker', $speaker);
        
         
        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
        // Execute the query
        for($x=0;$x<$number;$x++){
            $success=($stmt->execute());
            if(!$success){
                echo "<div class='alert-danger'>Unable to save record.</div>";
                break;
            }
        }
        if($success){
            echo "<div class='alert-success'>Record was saved.</div>";
        }
               
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!-- html form here where the product information will be entered -->
<div class="form-container">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class=''>
        <tr>
            <td>Number of slots</td>
            <td><input type='text' name='number' class='form-control' required/></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type='text' value = "Title" name='title' class='form-control' required/></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' value="Description" class='form-control'>Description</textarea></td>
        </tr>
        <tr>
            <td>Time</td>
            <td><input type='text' name='time' value="Time" class='form-control' required /></td>
        </tr>
        <tr>
            <td>Place</td>
            <td><input type='text' name='place' value="Place" class='form-control' required /></td>
        </tr>
        <tr>
            <td>Speaker</td>
            <td><input type='text' name='speaker' value="Speaker" class='form-control' required /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-save' />
                <a href='index.php' class='btn btn-back'>Back to all slots</a>
            </td>
        </tr>
    </table>
</form>
</div class="form-container"
          
    </div> <!-- end .container -->
     
  
</body>
</html>