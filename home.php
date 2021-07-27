<?php

    session_start();
    if (!isset($_SESSION["name"])) {
        header("location: /LoginRegister");
        exit; // prevent further execution, should there be more code that follows
    }

    $ls = "";
    $url = "";
    $m = "";
    $user_name = $_SESSION["name"];
    require "header.php";
    
    include_once '../connections/Query.php';

    $queries = new Queries();

    $posts = $queries->getPosts();

    if (isset($_POST['search'])) {
        $keyword = trim($_POST['search']);
        $posts = $queries->searchPosts($keyword);
    }
?>


<div class="container">
    <div class="mt-5 mb-5">
        <h1>Announcements</h1>

            <form method="post" class="form-inline">
                <input type="text" class="form-control input-lg w-25" id="search" placeholder="Search here" name="search"/>
                <button type="submit" class="btn btn-primary ml-1">Find</button>
            </form>


        <div class="mt-3">
            <?php
                foreach(array_reverse($posts) as $post):
            ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <h3><?= $post->title; ?></h3>
                        <h5><?= $post->body; ?></h5>
                        <span><?= $post->date_added; ?></span>
                    </div>
                </div>
    
            <?php endforeach; ?>

        </div>
                
    </div>
</div>




</body>
</html>
