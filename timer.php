<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="timer_function.js"></script>
    <title>Timer</title>
</head>
<body >
<div class="body-timer">
<div id="clockdiv">
<form class="smalltext" >
Minutes: <input class="timer-input" type="text" id="mns" name="mns" value="7" size="3" maxlength="3" /> &nbsp; &nbsp; Seconds: <input type="text" class="timer-input" id="scs" name="scs" value="0" size="2" maxlength="2" /><br/>
<input type="button" id="btnct" value="START" class="btn btn-start-timer" onclick="countdownTimer()"/>
</form>
<h1>Countdown Timer</h1>

<div>
<span id="showmns">00</span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
  <span id="showscs">00</span>
  
    <div class="smalltext">Seconds</div>
  </div>
</div>
</div>
</body>
</html>

