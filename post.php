<?php

    session_start();

    if (!isset($_SESSION["name"])) {
        header("location: /LoginRegister");
        exit; 
    }
    $ls = "";
    $url = "";
    $m = "";
    $user_name = $_SESSION["name"];
    require "header.php";

    include_once '../connections/Query.php';

    $queries = new Queries();

    if (isset($_POST['title']) && isset($_POST['body'])) {
        $queries->createPost($_POST['title'], $_POST['body'], $_SESSION["user_id"]);
    }


?>

    <div class="container">
        <div class="mt-5">
            <h1>Post an Announcement</h1>

            <form method="post">
                <div class="form-group mt-3">
                    <h5>Title</h5>
                    <input name="title" type="text" class="form-control" placeholder="Write something...">
                </div>
                <div class="form-group mt-3">
                    <h5>Body</h5>
                    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write something..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>



</body>
</html>