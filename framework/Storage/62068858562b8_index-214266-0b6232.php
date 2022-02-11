<form action="/" method="post" enctype="multipart/form-data">
    <input type="text" name="username"><br>
    <input type="text" name="message"><br>
    <input type="file" name="photo"><br>
    <input type="submit" value="Отправить">
</form>
<?php
if(!empty($_POST['username']) && !empty($_POST['message']))
{
    /*$username = $_POST['username'];
    if(!preg_match('/^[a-zA-Zа-яА-Я]{3,20}+$/', $username))
        return;*/
    $messages = [];
    if(file_exists('data.json'))
    {
        $content = json_decode(file_get_contents('data.json'),true);
        $messages = $content;
    }
    $data = [
        'username' => $_POST['username'],
        'message' => htmlspecialchars($_POST['message']),
        'date' => date("d.m.Y")
    ];
    if(!empty($_FILES['photo']))
    {
        $name = basename($_FILES["photo"]['name']);
        $ext = pathinfo($name,PATHINFO_EXTENSION);
        if(!in_array($ext,['txt','jpg','pdf']))
            return;
        move_uploaded_file($_FILES["photo"]['tmp_name'], "files/$name");
        $data['photo'] = "/files/$name";
    }

    $messages[] = $data;
    file_put_contents('data.json', json_encode($messages));
}

if(file_exists('data.json'))
{
    $content = json_decode(file_get_contents('data.json'),true);
    foreach ($content as $message)
    {
        echo "<h3>".$message['username']."</h3>&nbsp;&nbsp;".$message['message']."&nbsp;&nbsp;".$message['date']."<br>";
        if(!empty($message['photo']))
        {
            echo "<a href='".$message['photo']."'>Ссылка</a>";
        }
    }
}
