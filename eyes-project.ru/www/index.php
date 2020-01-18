<?php
    session_start();
    require_once 'connection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $log = $_SESSION['logged_user'];

    $query = sprintf("SELECT Login as login ,ID FROM user WHERE ID='$log'");
    $result = mysqli_query($link, $query);
    if (!$result) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}
    $row = mysqli_fetch_assoc($result);
    $login_user = $row['login'];
    $id_user = $row['ID'];
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Зарядка для глаз</title>
	<link rel="stylesheet" href="libs.css">
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<div class="wrap">
		<?php
    		//session_start();
    		if(isset($_SESSION['logged_user']))
    		{
      			include("block-header_auth.php");
    		}
    		else{include("block-header.php");}
		?>

		<main class="main d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="d-flex flex-column">
					<div class="info-text">
						<p>Регулярное выполнение тренировки для глаз способствует расслаблению глазных мышц, снятию зрительного напряжения и профилактике возникновения близорукости.</p>
						<p>На нашем сайте вы можете выполнить гимнастику для глаз, самостоятельно настроив список упражнений и выбрав свою возрастную категорию. 
						<p>Перед началом выполнения тренировки необходимо принять удобное положение перед экраном монитора и расслабить глазные мышцы. Время выполнения тренировки зависит от выбранных упражнений и составляет 2-3 минуты. </p>
						<p>Рекомендуется выполнять разминку для глаз каждые пол часа работы за компьютером.</p>
					</div>
					<div class="mx-auto mt-4">
								<?php
    								//session_start();
    								if(isset($_SESSION['logged_user']))
    								{
      									echo '<a class="gradient-btn d-block text-center" href="lesson.php"><span>Начать</span></a>';
    								}
    								else{echo '<a class="gradient-btn d-block text-center" href="lesson_no_auth.php"><span>Начать</span></a>';}
								?>
						
					</div>
				</div>
			</div>
		</main>
	
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.5/gsap.min.js" integrity="sha256-CkQcTxuQyZLqzqWqntH3FDxeDKMV0m7cw0aM5eph4Do=" crossorigin="anonymous"></script>
	<script src="menu-animation.js"></script>
</body>
</html>
