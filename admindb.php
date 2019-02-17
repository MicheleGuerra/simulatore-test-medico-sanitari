<?php
/**
 * Created by PhpStorm.
 * User: Michele Guerra
 * Date: 14/08/2018
 * Time: 14:41
 */
 
session_start();
mb_internal_encoding('UTF-8');

$con = mysqli_connect('localhost','root', 'password');
if($con){
    echo"connection";
}

mysqli_select_db($con,'quizdbase');

if(isset($_POST['submit'])) {
    if(!empty($_POST['domanda'])){
        $domanda = $_POST['domanda'];
		$query = " insert into questions(question) values ('$domanda')";
        $result = mysqli_query($con,$query) ;
    }
    if(!empty($_POST['risposta1'])){
        $risposta1 = $_POST['risposta1'];
        $sql = "SELECT qid FROM questions ORDER BY qid DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
		$id = $row['qid'];
        echo $id;
		$sql1 = "INSERT INTO `answers`
		(`aid`, `answer`, `ans_id`, `qid`)
		VALUES ('', '$risposta1', '$id', '$id')";
		$result = mysqli_query($con, $sql1);
		if($_POST['correct'] == '1'){
			$correct = $_POST['correct'];
			$sql2 = "SELECT aid FROM answers ORDER BY aid DESC LIMIT 1";
			$result = mysqli_query($con, $sql2);
			$row = mysqli_fetch_assoc($result);
			$idcorrect = $row['aid'];
			echo $idcorrect;
			$sql3 = "UPDATE questions SET ans_id = '$idcorrect' WHERE qid = '$id'";
			$result = mysqli_query($con, $sql3);
			//$row = mysqli_fetch_assoc($result);
		}
		
        

    }
    if(!empty($_POST['risposta2'])){
		$risposta2 = $_POST['risposta2'];
        $sql = "SELECT qid FROM questions ORDER BY qid DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
		$id = $row['qid'];
        echo $id;
		$sql1 = "INSERT INTO `answers`
		(`aid`, `answer`, `ans_id`, `qid`)
		VALUES ('', '$risposta2', '$id', '$id')";
		$result = mysqli_query($con, $sql1);
		if($_POST['correct'] == '2'){
			$correct = $_POST['correct'];
			$sql2 = "SELECT aid FROM answers ORDER BY aid DESC LIMIT 1";
			$result = mysqli_query($con, $sql2);
			$row = mysqli_fetch_assoc($result);
			$idcorrect = $row['aid'];
			echo $idcorrect;
			$sql3 = "UPDATE questions SET ans_id = '$idcorrect' WHERE qid = '$id'";
			$result = mysqli_query($con, $sql3);
			//$row = mysqli_fetch_assoc($result);
		}
        
    }
    if(!empty($_POST['risposta3'])){
        $risposta3 = $_POST['risposta3'];
        $sql = "SELECT qid FROM questions ORDER BY qid DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
		$id = $row['qid'];
        echo $id;
		$sql1 = "INSERT INTO `answers`
		(`aid`, `answer`, `ans_id`, `qid`)
		VALUES ('', '$risposta3', '$id', '$id')";
		$result = mysqli_query($con, $sql1);
		if($_POST['correct'] == '3'){
			$correct = $_POST['correct'];
			$sql2 = "SELECT aid FROM answers ORDER BY aid DESC LIMIT 1";
			$result = mysqli_query($con, $sql2);
			$row = mysqli_fetch_assoc($result);
			$idcorrect = $row['aid'];
			echo $idcorrect;
			$sql3 = "UPDATE questions SET ans_id = '$idcorrect' WHERE qid = '$id'";
			$result = mysqli_query($con, $sql3);
			//$row = mysqli_fetch_assoc($result);
		}
    }
    if(!empty($_POST['risposta4'])){
        $risposta4 = $_POST['risposta4'];
        $sql = "SELECT qid FROM questions ORDER BY qid DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
		$id = $row['qid'];
        echo $id;
		$sql1 = "INSERT INTO `answers`
		(`aid`, `answer`, `ans_id`, `qid`)
		VALUES ('', '$risposta4', '$id', '$id')";
		$result = mysqli_query($con, $sql1);
		if($_POST['correct'] == '4'){
			$correct = $_POST['correct'];
			$sql2 = "SELECT aid FROM answers ORDER BY aid DESC LIMIT 1";
			$result = mysqli_query($con, $sql2);
			$row = mysqli_fetch_assoc($result);
			$idcorrect = $row['aid'];
			echo $idcorrect;
			$sql3 = "UPDATE questions SET ans_id = '$idcorrect' WHERE qid = '$id'";
			$result = mysqli_query($con, $sql3);
			//$row = mysqli_fetch_assoc($result);
		}
    }
    if(!empty($_POST['risposta5'])){
        $risposta5 = $_POST['risposta5'];
        $sql = "SELECT qid FROM questions ORDER BY qid DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
		$id = $row['qid'];
        echo $id;
		$sql1 = "INSERT INTO `answers`
		(`aid`, `answer`, `ans_id`, `qid`)
		VALUES ('', '$risposta5', '$id', '$id')";
		$result = mysqli_query($con, $sql1);
		if($_POST['correct'] == '5'){
			$correct = $_POST['correct'];
			$sql2 = "SELECT aid FROM answers ORDER BY aid DESC LIMIT 1";
			$result = mysqli_query($con, $sql2);
			$row = mysqli_fetch_assoc($result);
			$idcorrect = $row['aid'];
			echo $idcorrect;
			$sql3 = "UPDATE questions SET ans_id = '$idcorrect' WHERE qid = '$id'";
			$result = mysqli_query($con, $sql3);
			//$row = mysqli_fetch_assoc($result);
		};
    }
    
    if(!empty($_POST['commento'])){
        $commento = $_POST['commento'];
		$sql3 = "UPDATE questions SET commento = '$commento' WHERE qid = '$id'";
			$result = mysqli_query($con, $sql3);
    }
}