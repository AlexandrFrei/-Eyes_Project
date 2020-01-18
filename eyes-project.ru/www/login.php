<?php

	require_once 'connection.php'; // подключаем скрипт

	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка " . mysqli_error($link));


	$login = $_POST['login'];
	$password = $_POST['password'];

	$query = sprintf("SELECT count(*) as countt FROM user WHERE Login='$login' and password='$password'");
	//echo "1";
    $result = mysqli_query($link, $query);
    //echo "2";

    // $number = mysqli_num_rows($result);
    //echo "3";
    if (!$result) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}

    //echo "4";
    $row = mysqli_fetch_assoc($result);


    $result2 = $row['countt'];
    //$id_user = $row['ID'];

    //echo $result2."<br>";
    if($result2 == 1){
        //echo "Успешная авторизация";
        //echo "5";
        $query2 = sprintf("SELECT ID FROM user WHERE Login='$login' and password='$password'");
        $result2 = mysqli_query($link, $query2);
        if (!$result2) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}
        $row2 = mysqli_fetch_assoc($result2);
        $id_user = $row2['ID'];

        session_start();
        $logged_user = $id_user;
        //echo "6";
        $_SESSION[ 'logged_user'] = $logged_user;
        //echo "7";
	    //header("Location: index.php");
        echo "<script> document.location.href=\"index.php\"</script>";
        //echo "8";
        exit;
    }else{
        echo "<script> alert(\"Не верный логин или пароль\"); </script>";
        echo "<script> document.location.href=\"auth.html\"</script>";
    }
    echo "10";
	// закрываем подключение
	mysqli_close($link);
 ?>
