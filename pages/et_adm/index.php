<?php


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Learning Space</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
</head>
<body>
    <div class="container w-50 mt-3">
        <div class="jumbotron">
                <h1>Log in</h1>
                <hr>
                <form action="/login/index.php" method="post" id="login">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" id="loginbtn" class="btn btn-primary">Log in</button>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>