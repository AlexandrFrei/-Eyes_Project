<header class="header py-4">
			<div class="container">
				<div class="row">
					<div class="col-auto">	
						<div class="menu">	
							<button type="button" class="menu-button"><?php echo $login_user; ?></button>
							<div class="menu-content">
                                <ul class="menu-content-list">
                                    <li>
                                        <a href="index.php">Главная</a>
                                    </li>
                                    <li>
                                        <a href="lesson-list.php">Список упражнений</a>
                                    </li>
                                    <li>
                                        <a href="age.php">Возрастная категория</a>
                                    </li>
                                </ul>
                            </div>
						</div>
					</div>
					<div class="col-auto ml-auto">
						<div class="auth">
							<a class="auth-link" href="session_destroy.php">Выход</a>
						</div>
					</div>
				</div>
			</div>
				<script src="menu-animation.js"></script>
</header>