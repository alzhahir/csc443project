<?php session_start() ?>
<style>
    html {
        height: 100%;
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    body {
        margin: 0;
        font-family: "Helvetica Neue", Arial, sans-serif;
        height: 100%;
        display: grid;
        grid-template-rows: 1fr auto;
    }
    .footer {
        padding: 1rem;
        background-color: #efefef;
        text-align: center;
    }
</style>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <!--svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg-->
            <img src="https://korporat.uitm.edu.my/images/download/2019/LogoUiTM.png" class="" height="50px" alt="alzhahir Logo">
            <p class="h6 ps-3">Club Activities Approval System</p>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
            <?php
                if(isset($_SESSION["uid"])){
                    echo '<li><a href="/doSignOut.php" class="nav-link px-2 link-dark">Logout</a></li>';
                } else {
                    echo '<li><a href="/login.php" class="nav-link px-2 link-dark">Login</a></li>';
                }
            ?>
            <li><a href="/contact.php" class="nav-link px-2 link-dark">Contact</a></li>
            <li><a href="/faq.php" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="/about.php" class="nav-link px-2 link-dark">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php
                if(isset($_SESSION["uid"])){
                    $url = $_SESSION["utype"];
                    $shortName = strtok($_SESSION["name"], " ");
                    echo "<label class=\"px-2\">Welcome, <a class=\"text-decoration-none\" href=/".$url."/>".$shortName."</a>!</label>";
                    echo '<button type="button" class="btn btn-primary" onclick="location.href=\'/doSignOut.php\';">Logout</button>';
                } else {
                    echo '<button type="button" class="btn btn-primary" onclick="location.href=\'/login.php\';">Login</button>';
                }
            ?>
        </div>
    </header>
</div>