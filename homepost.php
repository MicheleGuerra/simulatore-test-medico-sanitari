<?php
   session_start();
   
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
   
   $con = mysqli_connect('localhost','root', 'password');
  
   	mysqli_select_db($con,'quizdbase');
   
   ?>
<!DOCTYPE html>
<html>
   <head>
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
	  .barra {
	  position: fixed;
z-index: 20;
width: 100%;
margin-bottom: 50px;
overflow: hidden;}
	  </style>
	  
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
         <h1 class="text-center text-white font-weight-bold text-uppercase bg-dark barra" >  Pro-med  </h1><br>
      <div class="container "><br>
         <div class="container">
         
            <!-- <h1 class="text-center text-success text-uppercase animateuse" >  ThapaTechnical  Webdeveloper Quiz </h1>
            <br> -->
            <div class=" col-lg-12 text-center">
               <!--<h3> <a href="#" class="text-uppercase text-warning"> <?php //echo $_SESSION['username']; ?>,</a></h3>-->
            </div>
            <br>
            <div class="col-lg-8 d-block m-auto bg-light  border-radius ">
			
               
               
               <form action="checked.php" method="post">
                  <?php
                     for($i=1;$i<61;$i++){
                     $l = 1;
					 
                     $ansid = $i;

                     $sql1 = "SELECT * FROM `questions` WHERE `qid` = $i ";
                     	$result1 = mysqli_query($con, $sql1);
                     		if (mysqli_num_rows($result1) > 0) {
                     						while($row1 = mysqli_fetch_assoc($result1)) {
												$cardColor = '';
                     	?>				
                  <br>
                  <div class="card">
                     <br>
                     <p class="card-header">  <?php echo $i ." : ". $row1['question']; ?> </p>
					 
                    
                     <?php
                        $sql = "SELECT * FROM `answers` WHERE `qid` = $i ";
                        	$result = mysqli_query($con, $sql);
                        		if (mysqli_num_rows($result) > 0) {
                        						while($row = mysqli_fetch_assoc($result)) {
                        	?>

					<?php 
						$select = $_SESSION['selected'];
						//se la risposta data è corretta
						if(array_key_exists($ansid, $select) && $row['aid'] == $row1['ans_id'] ){
						//$cardColor = 'green';
					?>
							
                           
                     <div class="card-block selettore">
                        <input type="checkbox" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" checked="checked" disabled="disabled"> <font color=#00FF00>  <?php echo $row['answer']; ?> </font>
                        <br>
					</div>
					
					<?php 
						
						//se la risposta data è sbagliata
						}else if(array_key_exists($ansid, $select) && $select[$ansid] == $row['aid'] && $row['aid'] != $row1['ans_id'] ){
						$cardColor = $cardColor . 'red';
					?>
							
                           
                     <div class="card-block selettore">
                        <input type="checkbox" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" checked="checked" disabled="disabled"> <font color=#FF0000>  <?php echo $row['answer']; ?> </font>
                        <br>
					</div>
					
					<?php 
						
						//se la risposta non è stata data
						}else if( $row['aid'] == $row1['ans_id'] ){
						$cardColor = $cardColor . 'blue';
					?>
							
                           
                     <div class="card-block selettore">
                        <input type="checkbox" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" checked="checked" disabled="disabled"> <font color=#116062>  <?php echo $row['answer']; ?> </font>
                        <br>
					</div>
					
					<?php 
						//per stampare le altre opzioni
						}else{
					?>
					
					<div class="card-block selettore">
                        <input type="checkbox" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" disabled="disabled"> <?php echo $row['answer']; ?>
                        <br>
					</div>

                     <?php
                        
								} }}
                        $ansid = $ansid + $l;
                        if(strpos($cardColor, 'red') !== false){
						?><div class="card">
                  <p class="card-footer text-center bg-danger" > <?php echo $row1['commento'];?> 	 </p>
               </div>

			   <?php 
						}else if(strpos($cardColor, 'blue') !== false){
				?>
				<div class="card">
                  <p class="card-footer text-center bg-info" > <?php echo $row1['commento'];?> 	 </p>
               </div>
			   
			   <?php 
						}else{
				?>
				<div class="card">
                  <p class="card-footer text-center bg-success" > <?php echo $row1['commento'];?> 	 </p>
               </div>
			   
			   <?php 
						}
						
						?>
						</div>
						<?php
						}}}
                        
                     ?>
                  

                  <br>
                  
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
      $q =" select aid from answers";
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



   </body>
</html>
