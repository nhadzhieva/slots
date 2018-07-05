<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Slots for Conference</title>
     <link rel="stylesheet" href="style.css" />
    <script src="timer_function.js"></script>
    
</head>
<body>
 
    <!-- container -->
    <div class="container">
    <div class="topnav">
                <a class="active" href="index.php">Home</a>
                <a href="timer.php">Start timer</a>
    </div>
    
<?php
// include database connection
include 'config/database.php';
include 'timer.php';
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div class='alert-success'>Record was deleted.</div>";
 
}
// select all data
$query = "SELECT id, title, description, time, place, speaker FROM slots ORDER BY id DESC";
       

$stmt = $con->prepare($query);
$stmt->execute();

 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
// link to create record form
echo "<a href='create.php' class='btn btn-create'>Create New Slot</a>";
echo "<a href='create_many.php' class='btn btn-create'>Create Many Slots</a>";

 
//check if more than 0 record found
if($num>0){
 
    echo "<table >";//start table
 
    //creating our table heading
    echo "<tr >";
        echo "<th>Title</th>";
        echo "<th>Description</th>";
        echo "<th>Time</th>";
        echo "<th>Place</th>";
        echo "<th>Speaker</th>";
    echo "</tr>";
     
  // retrieve our table contents
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    extract($row);
    $text = $description;
    $maxPos = 50;
    if (strlen($text) > $maxPos)
    {
        $lastPos = ($maxPos - 25) - strlen($text);
        $text = substr($text, 0, strrpos($text, ' ', $lastPos)) . '...';
    }
    // creating new table row per record
    echo "<tr >";
        echo "<td>{$title}</td>";
        echo "<td>{$text}</td>";
        echo "<td>{$time}</td>";
        echo "<td>{$place}</td>";
        echo "<td>{$speaker}</td>";
    echo "<td>";
            // read one record 
            echo"<input type='button' id='btnct' value='start' class='btn btn-start' onclick='countdownTimer()'/>";
            echo "<a href='read_one.php?id={$id}' class='btn btn-read'>More</a>";
            // we will use this links on next part of this post
            echo "<a href='update.php?id={$id}' class='btn btn-edit'>Edit</a>";
             // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_record({$id});'  class=' btn btn-delete'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
 
// execute query
$stmt->execute();
 
 
}
 
// if no records found
else{
    echo "<div class='alert-danger'>No records found.</div>";
}
?>
         
    </div> <!-- end .container -->
<script type='text/javascript'>
// confirm record deletion
function delete_record( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    } 
}
</script>
 
</body>
</html>