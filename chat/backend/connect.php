<?php
    session_start();
    if(!empty($_POST['pseudo']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);

        if(!preg_match('/[^A-Za-z0-9\-]/', $pseudo))
        {
            $_SESSION['pseudo'] = $pseudo;
            header('Location: ../chat.php');
            die();
        }
        else
        {
            echo "Merci de saisir un pseudo valide";
        }

    }
    else
    {
        header('Location: ../index.php');
        die();
    }