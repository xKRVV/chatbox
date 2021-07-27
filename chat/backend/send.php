<?php
    session_start();
    require_once 'chat.php';

    if(!empty($_POST['msg']) && isset($_SESSION['pseudo']))
    {
        $msg = htmlspecialchars($_POST['msg']);

        $chat = new Chat();
        $chat->setMessage($msg, $_SESSION['pseudo']);
        header('Location: ../chat.php');
        die();
    }
    else
    {
        header('Location: ../chat.php');
        die();
    }