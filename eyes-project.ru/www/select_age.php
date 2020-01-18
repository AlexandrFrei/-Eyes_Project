<?php
	session_start();
	require_once 'connection.php'; // подключаем скрипт

	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка " . mysqli_error($link));

	$check1 = $_POST['age'];

	$id_us = $_SESSION['logged_user'];

	$query = sprintf("SELECT Login as login ,ID FROM user WHERE ID='$id_us'");
    $result = mysqli_query($link, $query);
    if (!$result) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}
    $row = mysqli_fetch_assoc($result);
    $login_user = $row['login'];
    $id_user = $row['ID'];

    if($check1=="child"){
        $query = sprintf("UPDATE user SET Type = 2 WHERE ID='$id_user'");
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    }
    if($check1=="adult"){
        $query = sprintf("UPDATE user SET Type = 1 WHERE ID='$id_user'");
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    }    


    header("Location: index.php");

	// закрываем подключение
	mysqli_close($link);

 ?>