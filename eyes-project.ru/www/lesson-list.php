<?php
    session_start();
    if(!isset($_SESSION[ 'logged_user']))
    {
      header("Location: index.php");
      exit;
    }

    require_once 'connection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $log = $_SESSION[ 'logged_user'];


    $query = sprintf("SELECT Login as login ,ID FROM user WHERE ID='$log'");
    $result = mysqli_query($link, $query);
    if (!$result) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}
    $row = mysqli_fetch_assoc($result);
    $login_user = $row['login'];
    $id_user = $row['ID'];

    $query2 ="SELECT *  FROM exercises";
	$result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));

    $new_str = "";
    $old_str = "";
    $i = 1;

    while ($row = mysqli_fetch_assoc($result2)) {
        $new_str = '
        	<li class="lessons-list-item">
				<div class="lessons-list-checkbox">
					<input type="checkbox" class="checkbox" id="checkbox'.$row['ID'].'" name="checkbox'.$row['ID'].'" />
					<label for="checkbox'.$row['ID'].'">'.$row['Name'].'</label>
				</div>
			</li>
        ';
        $old_str = $old_str . $new_str;
        $i++;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список упражнений</title>
	<link rel="stylesheet" href="libs.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/5.1.0/simplebar.min.css" integrity="sha256-pdzBd0Y/jQT2j/dCgWAR0/KOwvzn+gwZ+hYxU6+4Uw8=" crossorigin="anonymous" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrap lessons">
		
		<?php
    		if(isset($_SESSION['logged_user']))
    		{
      			include("block-header_auth.php");
    		}
    		else{include("block-header.php");}
		?>

		<main class="main d-flex align-items-center justify-content-center">
			<div class="container">
				<form action="select_exercises.php" method="post">
					<h2 class="title">Выбор упражнений</h2>
					<div class="lessons-list-wrapper" data-simplebar style="max-height: 400px">
						<ul class="lessons-list">
							<?php echo $old_str;  ?>
						</ul>
					</div>
					<button type="submit" class="gradient-btn d-block mx-auto mt-4"> <!--button button--white-->
						<span>Продолжить</span>
					</button>
				</form>
			</div>
		</main>
	
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/5.1.0/simplebar.js" integrity="sha256-nWKxVoHIeK4Ru6Oq94X0ujcxyLAuUarpNR6vzBAbVK0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.5/gsap.min.js" integrity="sha256-CkQcTxuQyZLqzqWqntH3FDxeDKMV0m7cw0aM5eph4Do=" crossorigin="anonymous"></script>
	<script src="menu-animation.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
	   		setTimeout(function() {
	   			document.querySelector('.lessons-list-wrapper').style.overflow='hidden'
	   		}, 100)
		});
	</script>
</body>
</html>
