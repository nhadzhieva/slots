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
            <h1>Details for the slot</h1>
        </div>
         
        <?php
// get passed ID
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
 
<!--we have our html table here where the record will be displayed-->
<table class='table '>
    <tr>
        <td>Title</td>
        <td><?php echo htmlspecialchars($title, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Time</td>
        <td><?php echo htmlspecialchars($time, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Place</td>
        <td><?php echo htmlspecialchars($place, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Speaker</td>
        <td><?php echo htmlspecialchars($speaker, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='index.php' class='btn btn-back'>Back to all slots</a>
        </td>
    </tr>
</table>
 
    </div> <!-- end .container -->


</body>
</html>