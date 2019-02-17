<?php
/**
 * Created by PhpStorm.
 * User: Michele Guerra
 * Date: 14/08/2018
 * Time: 12:39
 */
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body>
<h2>Administrator panel</h2>
<p></p>

<div class="container">
  <form action="csvtoarray.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="domanda">Domanda</label>
      </div>
      <div class="col-75">
        <input type="text" id="domanda" name="domanda" placeholder="Domanda..">
      </div>
    </div>
	
    <div class="row">
      <div class="col-25">
        <label for="lname">Risposta 1</label>
      </div>
      <div class="col-75">
        <input type="text" id="r1" name="risposta1" placeholder="Risposta 1..">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="lname">Risposta 2</label>
      </div>
      <div class="col-75">
        <input type="text" id="r2" name="risposta2" placeholder="Risposta 2..">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="lname">Risposta 3</label>
      </div>
      <div class="col-75">
        <input type="text" id="r3" name="risposta3" placeholder="Risposta 3..">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="lname">Risposta 4</label>
      </div>
      <div class="col-75">
        <input type="text" id="r4" name="risposta4" placeholder="Risposta 4..">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="lname">Risposta 5</label>
      </div>
      <div class="col-75">
        <input type="text" id="r5" name="risposta5" placeholder="Risposta 5..">
      </div>
    </div>
	
    <div class="row">
      <div class="col-25">
        <label for="country">Risposta corretta</label>
      </div>
      <div class="col-75">
        <select id="correct" name="correct">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
		  <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Commento</label>
      </div>
      <div class="col-75">
        <textarea id="commento" name="commento" placeholder="Commento.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" name='submit' value="Submit">
    </div>
  </form>
</div>

</body>
</html>


