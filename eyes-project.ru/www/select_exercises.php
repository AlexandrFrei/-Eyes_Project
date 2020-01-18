<?php
	session_start();
	require_once 'connection.php'; // подключаем скрипт

	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка " . mysqli_error($link));

	$check1 = $_POST['checkbox1'];
	$check2 = $_POST['checkbox2'];
	$check3 = $_POST['checkbox3'];
	$check4 = $_POST['checkbox4'];
	$check5 = $_POST['checkbox5'];
	$check6 = $_POST['checkbox6'];
	$check7 = $_POST['checkbox7'];
	$check8 = $_POST['checkbox8'];
	$check9 = $_POST['checkbox9'];

	$id_us = $_SESSION['logged_user'];

	$query = sprintf("SELECT Login as login ,ID FROM user WHERE ID='$id_us'");
    $result = mysqli_query($link, $query);
    if (!$result) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}
    $row = mysqli_fetch_assoc($result);
    $login_user = $row['login'];
    $id_user = $row['ID'];

	$query1 = sprintf("DELETE FROM selected_exercises WHERE ID_User='$id_user'");
    $result1 = mysqli_query($link, $query1);
    if (!$result1) {
        $message = 'Неверный запрос: ' . mysqli_error() . "\n";
    }else{

    	if($check1){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 1)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check2){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 2)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check3){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 3)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check4){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 4)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check5){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 5)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check6){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 6)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check7){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 7)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check8){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 8)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
    	if($check9){
    		$query ="insert into selected_exercises (ID_User,ID_Exercises) values ('$id_user', 9)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	}
        header("Location: index.php");
    }

	// закрываем подключение
	mysqli_close($link);

 ?>