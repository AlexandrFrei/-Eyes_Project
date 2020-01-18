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
    $type_age= $row['Type']
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Возрастная категория</title>
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
        
        <main class="main pt-3 pb-5 d-flex align-items-center ">
            <div class="container">
                <section class="age">
                    <h2 class="title">Выбор возрастной категории</h2>
                    <form action="select_age.php" method="POST">
                        <div class="row">
                            <div class="col-6">
                                <label class="radio age-item">
                                    <input type="radio" name="age" value="child" checked/>
                                    <span>
                                        <img src="images/Child.svg" alt="Child" title="Ребенок">
                                    </span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="radio age-item">
                                    <!--<?php
                                        if($type_age==1){
                                            echo '<input type="radio" name="age" value="adult" checked/>';
                                        }
                                    ?>-->
                                    <input type="radio" name="age" value="adult" checked/>'
                                    <span>
                                        <img src="images/Adult.svg" alt="Adult" title="Взрослый">
                                    </span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="gradient-btn d-block mx-auto mt-4"> <!--button button--white-->
                            <span>Продолжить</span>
                        </button>
                    </form>
    
                </section>
            </div>  
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.5/gsap.min.js" integrity="sha256-CkQcTxuQyZLqzqWqntH3FDxeDKMV0m7cw0aM5eph4Do=" crossorigin="anonymous"></script>
    <script src="menu-animation.js"></script>
</body>
</html>
