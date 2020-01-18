<?php
    session_start();

    if(!isset($_SESSION[ 'logged_user']))
    {
      header("Location: index.php");
      exit;
    }

    require_once 'connection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $log = $_SESSION['logged_user'];


    $query = sprintf("SELECT Login as login ,ID, Type FROM user WHERE ID='$log'");
    $result = mysqli_query($link, $query);
    if (!$result) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}
    $row = mysqli_fetch_assoc($result);
    $login_user = $row['login'];
    $id_user = $row['ID'];
    $type_age= $row['Type'];

    $query1 = sprintf("SELECT * FROM selected_exercises WHERE ID_User='$log'");
    $result1 = mysqli_query($link, $query1);
    if (!$result1) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}


    $old_str = '
    <script>
		
document.addEventListener(\'DOMContentLoaded\', function(){ 

	const point = document.querySelector(\'.point-image\');//.point
	
	const killLesson = document.querySelector(\'.next-btn\');
	const infoForLesson = document.querySelector(\'.info-for-lesson\');
	const pointWidth = point.offsetWidth;
	const pointHeight = point.offsetHeight;
	const lessonOneDuration = 1;
	const animDuration = 2;//sec
	const w = window;

	function getScreenSize() {
		return {
			width: w.innerWidth,
			height: w.innerHeight
		}
	}

	function setInfoText(text) {
		infoForLesson.textContent = text;
	}

	killLesson.addEventListener("click", function() {
		let activeLesson = lessons.find(lesson => lesson.isActive());
		if (activeLesson != undefined) {
			activeLesson.seek(activeLesson.endTime(), false);
    		console.log(activeLesson.endTime());
		}
  	});

  	const lesson = new TimelineMax({ //up-down
		paused: false,
		repeat: 1,
		delay: 1,
		onStart (){
			setInfoText("");
			setTimeout(setInfoText, 1000, "");
	},
		
    ';
    $new_str = "";

    while ($row1 = mysqli_fetch_assoc($result1)) {
    	//if($row1['ID_Exercises']==1){echo'<script src="script1.js"></script>';}
    	//if($row1['ID_Exercises']==2){echo'<script src="script2.js"></script>';}
    	//if($row1['ID_Exercises']==3){echo'<script src="script3.js"></script>';}
    	if($row1['ID_Exercises']==1){

        $new_str = '
        	onComplete (){
			lessonOne.play()
			}
			});

			const lessonOne = new TimelineMax({ //up-down
			paused: true,
			repeat: 3,
			delay: 1,
			onStart (){
				setInfoText("Вверх-вниз");
				setTimeout(setInfoText, 1000, "");
			},
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row1['ID_Exercises']==2){

        $new_str = '
        	onComplete (){
			lessonTwo.play()
			}
			});

			const lessonTwo = new TimelineMax({ //left-right
			paused: true,
			repeat: 1,
			delay: 1,
			onStart (){
				setInfoText("Влево-вправо");
				setTimeout(setInfoText, 1000, "");
			},
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row1['ID_Exercises']==3){

        $new_str = '
        	onComplete (){
			lessonThree.play()
			}
			});

			const lessonThree = new TimelineMax({ //triangle
			paused: true,
			repeat: 3,
			delay: 1,
			onStart (){
				setInfoText("Треугольник");
				setTimeout(setInfoText, 1000, "");
			},
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row1['ID_Exercises']==4){

        $new_str = '
        	onComplete (){
			lessonFour.play()
			}
			});

			const lessonFour = new TimelineMax({ //square
			paused: true,
			repeat: 3,
			delay: 1,
			onStart (){
				setInfoText("Прямоугольник");
				setTimeout(setInfoText, 1000, "");
			},
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row1['ID_Exercises']==5){

        $new_str = '
        	onComplete (){
			lessonFive.play()
			}
			});

			const lessonFive = new TimelineMax({ //circle
			paused: true,
			repeat: 3,
			delay: 1,
			onStart (){
				setInfoText("Круг");
				setTimeout(setInfoText, 1000, "");
			},
        ';
        $old_str = $old_str . $new_str;
    	}


    	if($row1['ID_Exercises']==6){

        $new_str = '
        	onComplete (){
			lessonSix.play()
			}
			});

			const lessonSix = new TimelineMax({ //Eight
			paused: true,
			repeat: 2,
			delay: 1,
			onStart (){
				setInfoText("Восьмерка");
				setTimeout(setInfoText, 1000, "");
			},

        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row1['ID_Exercises']==7){

        $new_str = '
        	onComplete (){
			lessonSeven.play()
			}
			});

			const lessonSeven = new TimelineMax({ //Blinking
			paused: true,
			repeat: 16,
			delay: 1,
			onStart (){
				infoForLesson.textContent = "Поморгайте глазами"
			},
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row1['ID_Exercises']==8){

        $new_str = '
        	onComplete (){
			lessonEight.play()
			}
			});

			const lessonEight = new TimelineMax({ //Eyebrows
			paused: true,
			repeat: 16,
			delay: 1,
			onStart (){
				infoForLesson.textContent = "Поcмотрите между бровей"
			},
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row1['ID_Exercises']==9){

        $new_str = '
        	onComplete (){
			lessonNine.play()
			}
			});

			const lessonNine = new TimelineMax({ //Nose
			paused: true,
			repeat: 16,
			delay: 1,
			onStart (){
				infoForLesson.textContent = "Поcмотрите на кончик носа"
			},
        ';
        $old_str = $old_str . $new_str;
    	}
    }


    $query2 = sprintf("SELECT * FROM selected_exercises WHERE ID_User='$log'");
    $result2 = mysqli_query($link, $query1);
    if (!$result2) {  $message = 'Неверный запрос: ' . mysqli_error() . "\n";}

    $new_str = '

	onComplete (){infoForLesson.textContent = "Тренировка закончилась. Отдохните"}
	});

    lesson
	.set(point, {
		x: 0, 
		y: 0
	}).to(point, animDuration / 4, {
		alpha: 0
	}).to(point, animDuration / 4, {
		alpha: 1
	});
		
        ';

    $old_str = $old_str . $new_str;

    while ($row2 = mysqli_fetch_assoc($result2)) {
    	//if($row1['ID_Exercises']==1){echo'<script src="script1.js"></script>';}
    	//if($row1['ID_Exercises']==2){echo'<script src="script2.js"></script>';}
    	//if($row1['ID_Exercises']==3){echo'<script src="script3.js"></script>';}
    	if($row2['ID_Exercises']==1){

        $new_str = '
        lessonOne //up-down

		.to(point, animDuration / 2, {
			y: - (getScreenSize().height/2 - pointHeight/2), 
			ease:Linear.easeNone
		})
		.to(point, animDuration / 2, {
			y: 0, 
			ease:Linear.easeNone
		})
		.to(point, animDuration / 2, {
			y: getScreenSize().height/2 - pointHeight/2, 
			ease:Linear.easeNone
		})
		.to(point, animDuration / 2, {
			y: 0, 
			ease:Linear.easeNone
		});
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row2['ID_Exercises']==2){

        $new_str = '
        lessonTwo //left-right

		.to(point, animDuration, {
			x: - (getScreenSize().width/2 - pointWidth/2), 
			ease:Linear.easeNone
		})
		.to(point, animDuration, {
			x: 0, 
			ease:Linear.easeNone
		})
		.to(point, animDuration, {
			x: getScreenSize().width/2 - pointWidth/2, 
			ease:Linear.easeNone
		})
		.to(point, animDuration, {
			x: 0, 
			ease:Linear.easeNone
		});	
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row2['ID_Exercises']==3){

        $new_str = '
        lessonThree //Triangle
		.set(point, {
		 	x: 0, 
		 	y: - (getScreenSize().height/3 - pointHeight/2)
		 })
		.to(point, animDuration, {
			x: getScreenSize().width/3 - pointWidth/2,
		 	y: getScreenSize().height/3 - pointHeight/2, 
		 	ease:Linear.easeNone
		})
		.to(point, animDuration, {
			x: - (getScreenSize().width/3 - pointWidth/2), 
			ease:Linear.easeNone
		})
		.to(point, animDuration, {
			x: 0,
			y: - (getScreenSize().height/3 - pointHeight/2), 
			ease:Linear.easeNone
		});	
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row2['ID_Exercises']==4){

        $new_str = '
        lessonFour //Square
		.set(point, {
		 	x: - (getScreenSize().width/3 - pointWidth/2),
		 	y: - (getScreenSize().height/3 - pointHeight/2)
		 })
		.to(point, animDuration, {
			x: getScreenSize().width/3 - pointWidth/2,
			ease:Linear.easeNone
		})
		.to(point, animDuration / 2, {
			x: (getScreenSize().width/3 - pointWidth/2),
			y: (getScreenSize().height/3 - pointHeight/2),
			ease:Linear.easeNone
		})
		.to(point, animDuration, {
			x: - (getScreenSize().width/3 - pointWidth/2),
			y: (getScreenSize().height/3 - pointHeight/2),
			ease:Linear.easeNone
		})
		.to(point, animDuration / 2, {
			x: - (getScreenSize().width/3 - pointWidth/2),
			y: - (getScreenSize().height/3 - pointHeight/2),
			ease:Linear.easeNone
		});	
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row2['ID_Exercises']==5){

        $new_str = '
        lessonFive //Circle
		.set(point, {
			x: 0, 
			y: - (getScreenSize().height/2 - pointHeight)
		})
		.to(point, animDuration * 3, {
			rotation: 360, 
			transformOrigin: `0px ${getScreenSize().height/2 - pointHeight/2}px`,  
			ease:Linear.easeNone
		});	
        ';
        $old_str = $old_str . $new_str;
    	}


    	if($row2['ID_Exercises']==6){

        $new_str = '
        lessonSix //Eight
		.set(point, {
			x: 0, 
			y: 0,
			clearProps: "transformOrigin"
		})
		.to(point, animDuration + 1, {
			rotation: 360, 
			transformOrigin: `0px -${getScreenSize().height/4 - pointHeight}px`,  
			ease:Linear.easeNone
		})
		.to(point, animDuration + 1, {
			rotation: 0, 
			transformOrigin: `0px ${getScreenSize().height/4}px`,  
			ease:Linear.easeNone
		});	
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row2['ID_Exercises']==7){

        $new_str = '
        lessonSeven //Blinking
		.set(point, {
			x: 0, 
			y: 0
		}).to(point, animDuration / 4, {
			alpha: 0
		}).to(point, animDuration / 4, {
			alpha: 1
		});	
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row2['ID_Exercises']==8){

        $new_str = '
        lessonEight //Eyebrows
		.set(point, {
			x: 0, 
			y: 0
		}).to(point, animDuration / 4, {
			alpha: 0
		}).to(point, animDuration / 4, {
			alpha: 1
		})	
        ';
        $old_str = $old_str . $new_str;
    	}

    	if($row2['ID_Exercises']==9){

        $new_str = '
        lessonNine //Nose
		.set(point, {
			x: 0, 
			y: 0
		}).to(point, animDuration / 4, {
			alpha: 0
		}).to(point, animDuration / 4, {
			alpha: 1
		})	
        ';
        $old_str = $old_str . $new_str;
    	}
    }

    	$new_str = 
    	'let lessons = [lessonOne, lessonTwo, lessonThree, lessonFour, lessonFive, lessonSix, lessonSeven];
		let activeLesson = lessons.find(lesson => lesson.isActive());
	});
</script>';

        $old_str = $old_str . $new_str;
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
            if(isset($_SESSION['logged_user']))
            {
                include("block-header_auth.php");
            }
            else{include("block-header.php");}
        ?>

        <?php
        if($type_age==2){
        echo '
		<div class="point-image"><!--point-->
			<img src="images/point/jellyfish.svg" alt="point">
		</div>
		';} else if($type_age==1){
		echo '
		<div class="point-image">
			<img src="images/point/сircle.svg" alt="point">
		</div>
		';
		}
		?>

		<p class="info-for-lesson"></p>
		<main class="main main-next">
			<div class="container mt-auto mb-4">
				<button type="submit" class="next-btn ml-auto" value="next">
					
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

	<script src="menu-animation.js"></script>

	<?php echo $old_str;  ?>

</body>
</html>
