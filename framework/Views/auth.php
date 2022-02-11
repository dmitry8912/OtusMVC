<!DOCTYPE html>
<html>
<head>
    <title></title>Auth</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            margin-top: 20%;
        }
    </style>
</head>
<body>
<form method="POST" action="/Secure/auth" enctype="multipart/form-data">
    <label for="username">Логин:</label><br>
    <input type="text" name="username" /><br>
    <label for="message">Пароль:</label><br>
    <input type="password" name="password" /><br>
    <input type="submit" value="Войти">
</form>
<?php
    if(isset($result))
        echo $result;
?>

</body>
</html>
