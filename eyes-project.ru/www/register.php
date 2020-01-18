<?php
	require_once 'connection.php'; // подключаем скрипт

	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка " . mysqli_error($link));

	$login = $_POST['login'];
	$password = $_POST['password'];
	$repeat_password = $_POST['repeat-password'];



	if($password == $repeat_password){
	// выполняем операции с базой данных
		$query1 = sprintf("SELECT count(*) as countt FROM user WHERE Login='$login'");
		$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
		$row = mysqli_fetch_assoc($result1);
		$result2 = $row['countt'];
    	if($result2 == 0){
        $query ="insert into user (Login,Password, Type) values ('$login',  '$password', 1)";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)	{echo "<script> document.location.href=\"auth.html\"</script>";}
    	}else{
        echo "<script> alert(\"Логин существует\"); </script>";
		echo "<script> document.location.href=\"registration.html\"</script>";
    	}

		
	}

	if($password != $repeat_password){
		echo "<script> alert(\"Пароли не совпадают\"); </script>";
		echo "<script> document.location.href=\"registration.html\"</script>";
	}

	// закрываем подключение
	mysqli_close($link);

 ?>
