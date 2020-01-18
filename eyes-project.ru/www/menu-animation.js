document.addEventListener('DOMContentLoaded', function(){ 

	const menu = document.querySelector('.menu');
	const menuItems = menu.querySelectorAll('.menu-content-list li');
	const menuButton = menu.querySelector('.menu-button');

	TweenMax.set(menuItems, {
		autoAlpha: 0,
		y: 20
	})

	const tl = new TimelineMax({ 
		paused: true, 
		reversed: true 
	})
	
	.staggerTo(menuItems, .25, {
		y: 0, 
		autoAlpha: 1
	}, .15);

	menuButton
		.addEventListener('click', function(event) {
			event.preventDefault();

			if (tl.reversed()) {
				tl.play();
				menu.classList.add('is-active');
			} else {
				tl.reverse();
				 menu.classList.remove('is-active');
			}
		})


});