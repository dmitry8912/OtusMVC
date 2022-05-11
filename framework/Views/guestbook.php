<!DOCTYPE html>
<html>
<head>
    <title></title>GuestBook</title>
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
<form method="POST" action="/GuestBook/addMessage" enctype="multipart/form-data">
    <label for="message">Сообщение:</label><br>
    <input type="text" name="message" /><br>
    <label for="message">Фото:</label><br>
    <input type="file" name="photo" /><br>
    <input type="submit" value="Отправить">
</form>
<?php
    foreach ($messages as $message) {
        $message = (array)$message;
        $message['message_text'] = htmlspecialchars($message['message_text']);
        echo "<h3>Message #{$message['id']} at {$message['message_date']}</h3><br>";
        echo "{$message['message_text']}<br>";
        if(!empty($message['file_path']))
        {
            echo "<img src='{$message['file_path']}'>";
        }
        echo "<br><hr><br>";
    }
?>

</body>
</html>
