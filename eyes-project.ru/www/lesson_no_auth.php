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
            if(isset($_SESSION['logged_user']))
            {
                include("block-header_auth.php");
            }
            else{include("block-header.php");}
        ?>
        
		<div class="point-image"><!--point-->
			<img src="images/point/сircle.svg" alt="point">
		</div>
		<p class="info-for-lesson"></p>
		<main class="main main-next">
			<div class="container mt-auto mb-4">
				<button type="submit" class="next-btn ml-auto" value="next">
					<span>Следующее упражнение</span>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve" width="512px" height="512px" class="">
						<path d="M484.14,226.886L306.46,49.202c-5.072-5.072-11.832-7.856-19.04-7.856c-7.216,0-13.972,2.788-19.044,7.856l-16.132,16.136    c-5.068,5.064-7.86,11.828-7.86,19.04c0,7.208,2.792,14.2,7.86,19.264L355.9,207.526H26.58C11.732,207.526,0,219.15,0,234.002    v22.812c0,14.852,11.732,27.648,26.58,27.648h330.496L252.248,388.926c-5.068,5.072-7.86,11.652-7.86,18.864    c0,7.204,2.792,13.88,7.86,18.948l16.132,16.084c5.072,5.072,11.828,7.836,19.044,7.836c7.208,0,13.968-2.8,19.04-7.872    l177.68-177.68c5.084-5.088,7.88-11.88,7.86-19.1C492.02,238.762,489.228,231.966,484.14,226.886z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>	
					</svg>
				</button>
			</div>
		</main>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.5/gsap.min.js" integrity="sha256-CkQcTxuQyZLqzqWqntH3FDxeDKMV0m7cw0aM5eph4Do=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/ru.js" integrity="sha256-qR4pdhxtx7dwKGJuYGoYjfnCQBPXv47hzLLU8jPLVUY=" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	<script src="menu-animation.js"></script>
</body>
</html>
