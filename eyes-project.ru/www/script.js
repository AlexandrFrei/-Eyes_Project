document.addEventListener('DOMContentLoaded', function(){ 

	const point = document.querySelector('.point-image');//.point
	
	const killLesson = document.querySelector('.next-btn');
	const infoForLesson = document.querySelector('.info-for-lesson');
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

	const lessonOne = new TimelineMax({ //up-down
		paused: false,
		repeat: 3,
		delay: 1,
		onStart (){
			setInfoText("Вверх-вниз");
			setTimeout(setInfoText, 1000, "");
	},
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
		onComplete (){lessonFive.play()}
	});

	const lessonFive = new TimelineMax({ //circle
		paused: true,
		repeat: 3,
		delay: 1,
		onStart (){
			setInfoText("Круг");
			setTimeout(setInfoText, 1000, "");
	},
		onComplete (){lessonSix.play()}
	});

	const lessonSix = new TimelineMax({ //Eight
		paused: true,
		repeat: 2,
		delay: 1,
		onStart (){
			setInfoText("Восьмерка");
			setTimeout(setInfoText, 1000, "");
	},
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
		onComplete (){lessonEight.play()}
	});

	const lessonEight = new TimelineMax({ //Eyebrows
		paused: true,
		repeat: 16,
		delay: 1,
		onStart (){
			infoForLesson.textContent = "Поcмотрите между бровей"
		},
		onComplete (){lessonNine.play()}
	});

	const lessonNine = new TimelineMax({ //Nose
		paused: true,
		repeat: 16,
		delay: 1,
		onStart (){
			infoForLesson.textContent = "Поcмотрите на кончик носа"
	},
		onComplete (){infoForLesson.textContent = "Тренировка закончилась. Отдхоните"}
	});


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


	lessonSeven //Blinking
	.set(point, {
		x: 0, 
		y: 0
	}).to(point, animDuration / 4, {
		alpha: 0
	}).to(point, animDuration / 4, {
		alpha: 1
	});

	lessonEight //Eyebrows
	.set(point, {
		x: 0, 
		y: 0
	}).to(point, animDuration / 4, {
		alpha: 0
	}).to(point, animDuration / 4, {
		alpha: 1
	})

	lessonNine //Nose
	.set(point, {
		x: 0, 
		y: 0
	}).to(point, animDuration / 4, {
		alpha: 0
	}).to(point, animDuration / 4, {
		alpha: 1
	})



	let lessons = [lessonOne, lessonTwo, lessonThree, lessonFour, lessonFive, lessonSix, lessonSeven];
	let activeLesson = lessons.find(lesson => lesson.isActive());


});

