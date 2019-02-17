<?php
   session_start();
   mb_internal_encoding('UTF-8');
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
   
   $con = mysqli_connect('localhost','root', 'password');
  
   	mysqli_select_db($con,'quizdbase');
   
   ?>
<!DOCTYPE html>
<html>
   <head>
   <meta http-equiv="refresh" content="60;checked.php" />
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="
         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <style type="text/css">
         .animateuse{
         animation: leelaanimate 0.5s infinite;
         }
         @keyframes leelaanimate{
         0% { color: red },
         10% { color: yellow },
         20%{ color: blue }
         40% {color: green },
         50% { color: pink }
         60% { color: orange },
         80% {  color: black },
         100% {  color: brown }
         }
      </style>
	  <style type="text/css">
         body {
background: url('sfondo3.jpg') no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;

}
      </style>
	  <style type="text/css">
         .border-radius { border-radius: 10px; }
      </style>
	  <style type="text/css">
	  .selettore {margin-left: 10px;}
	  </style>
	  <style type="text/css">
	  .barra {
	  position: fixed;
z-index: 20;
width: 100%;
margin-bottom: 50px;
overflow: hidden;}

		.timeout {
		left: 80%;
		}
		
		.courier {
    font-family: "Courier";
}


	  </style>
	  
	  
	  <script type="text/javascript">
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

jQuery(function ($) {
    var fiveMinutes = 60 * 1,
        display = $('#time');
    startTimer(fiveMinutes, display);
});
</script>
   </head>
   <body>
   

      <?php 

      $page1 = $_GET['page'];

      if($page1=="" ||  $page1==1){
         $page1 = 0;
      } else{
         $page1 = (($page1 * 1)-1);

      }

      ?>

      <div>
       <!--   <h1 class="text-center text-white font-weight-bold text-uppercase bg-dark" >  Complete Quiz Website using PHP and MYSQL using Session</h1><br>
      <div class="container "><br> -->
         <h1 class="text-center text-white font-weight-bold text-uppercase bg-dark barra" >  Pro-med </h1><h1 class="text-white font-weight-bold text-uppercase timeout barra" id="time">01:00</h1><br>
      <div class="container quizsetting"><br>
         <div class="container">
         
            <!-- <h1 class="text-center text-success text-uppercase animateuse" >  ThapaTechnical  Webdeveloper Quiz </h1>
            <br> -->
            <div class=" col-lg-12 text-center">
               
  

			   <!-- <h3> <a href="#" class="text-uppercase text-warning"> <?php //echo $_SESSION['username']; ?>,</a> pronto per la sfida? </h3> -->
            </div>
            <br>
            <div class="col-lg-8 d-block m-auto bg-light border-radius ">
			
               <form id ="myquiz" action="checked.php" method="post">
                  <?php
                     for($i=1;$i<481;$i++){
                     $l = 1;
                  
                     $ansid = $i;

                     $sql1 = "SELECT * FROM `questions` WHERE `qid` = $i ";
                     	$result1 = mysqli_query($con, $sql1);
                     		if (mysqli_num_rows($result1) > 0) {
                     						while($row1 = mysqli_fetch_assoc($result1)) {
                     	?>				
                  <br>
                  <div class="card ">
                     <br>
                     <b class="card-header">  <?php echo $i ." : ". $row1['question']; ?> </b>
					 
                    
                     <?php
                        $sql = "SELECT * FROM `answers` WHERE `qid` = $i ";
                        	$result = mysqli_query($con, $sql);
							$cicle = 0;
                        		if (mysqli_num_rows($result) > 0) {
                        						while($row = mysqli_fetch_assoc($result)) {
                        	?>	
                           
                     <div class="card-block selettore">
					 <?php
                        if($cicle == 0){
                        	?>
                        <p>A.<input class=" selettore"type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" > <?php echo $row['answer']; ?>
                        <?php
                        }else if($cicle == 1){
                        	?>
                        <p>B.<input class=" selettore" type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" > <?php echo $row['answer']; ?>
						<?php
                        }else if($cicle == 2){
                        	?>
                        <p>C.<input class=" selettore" type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" > <?php echo $row['answer']; ?> 
						<?php
                        }else if($cicle == 3){
                        	?>
                        <p>D.<input class=" selettore" type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" > <?php echo $row['answer']; ?> 
						<?php
                        }else if($cicle == 4){
                        	?>
                        <p>E.<input class=" selettore" type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" > <?php echo $row['answer']; ?> 
						<?php } ?>
						<br>
					</div>

                     <?php
                        
                        $cicle++;} }
                        $ansid = $ansid + $l;
                        ?>
						</div>
						<?php
						} }}
                        
                     ?>
                  

                  <br>
                  <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
               </form>
               <p id="letc"></p>
            </div>
            <br>
            <a href="logout.php" class="btn btn-primary d-block m-auto text-white" > Logout </a> <br>
         </div>
         <br>
         <footer>
            <h5 class="text-center"> &copy2018 ProMed Services </h5> 
         </footer>
      </div>


      <?php

      $startlimit  = 0;
      $q =" select qid from questions";
      $query = mysqli_query($con,$q);
      $lastpage = mysqli_num_rows($query);

      $totalpage = ceil($lastpage / 2);
      ?>
      <div class="m-auto"><br>
         <ul class="pagination">
      <?php
      for($i=1; $i<=$totalpage; $i++){
         ?>
      
      <!-- <li class="float-left list-unstyled page-item" > <a href="home.php?page=<?php echo $i; ?>" class="page-link">  <?php  echo $i;  ?> </a> </li> -->
      
       <?php  
           }
        ?>
        </ul>
      </div>


	<script type="text/javascript">
secs = 55;
timer = setInterval(function () {
    var element = document.getElementById("status");
    //element.innerHTML = "<h2>You have <b>"+secs+"</b> seconds to answer the questions</h2>";
    if(secs < 1){
        clearInterval(timer);
        document.getElementById('myquiz').submit();
    }
    secs--;
}, 1000)
</script>
   </body>
</html>
