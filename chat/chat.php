<?php
    session_start();
    require_once 'backend/chat.php';

    if(!isset($_SESSION['pseudo']))
    {
        header('Location: index.php');
        die();
    }

    $chat = new Chat();
    $msg = $chat->getMessage();
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Chat</title>
</head>
<body>
    <?php
        for($i = 0; $i < count($msg['chat']); $i++)
        {
    ?>
        <div class="container">
            <p><?php echo $msg['chat'][$i]['message']; ?></p>
            <span class="time-right"><?php echo $msg['chat'][$i]['pseudo']." &mdash; ".$msg['chat'][$i]['date'];?></span>
        </div>
    <?php
        }
    ?>
    <form action="backend/send.php" method="POST">
        <input type="text" name="msg" placeholder="Message" autocomplete="off" class="form-input"/>
        <button class="submite">Envoyer</button>
    </form>
</body>
</html>