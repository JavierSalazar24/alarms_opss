<?php

    require_once __DIR__ . '/vendor/autoload.php';
    
    $C_admin = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 


    $UserEmail    = isset($_POST["UserEmail"]) ? $_POST["UserEmail"] : null;
    $UserName     = isset($_POST["UserName"]) ?  $_POST["UserName"] : null;
    $UserLastName = isset($_POST["UserLastName"]) ? $_POST["UserLastName"] : null;
    $UserAction   =  isset($_POST["UserAction"]) ? $_POST["UserAction"] : null;;

    if($UserAction == "login")
    {
        //login
        // validate correo existe
        // $query = "SELECT * FROM users WHERE Useremail = '{$UserEmail}'";
        // $user = $connection->query($query);
        // $UserInfo = $user->fetch(PDO::FETCH_ASSOC);
        $cuenta_cliente = $C_admin->findOne(['correo' => $UserEmail]);

        // $client = new Google_Client();
        // $client->setClientId($clientID);
        // $client->setClientSecret($clientSecret);
        // $client->setRedirectUri($redirectUri);

        if(!empty($cuenta_cliente))
        {
            $response["logged"] = true;
            $response["info"]   = $cuenta_cliente;

            session_start();
            setcookie("username", $UserName.$UserLastName, false, "/", $_SERVER["HTTP_HOST"]);
        }
        else
        {
            $response["logged"] = false;
        }

        echo json_encode($response);

    }

    elseif($UserAction == "logout")
    {
        setcookie('username', null, 0, '/', $_SERVER["HTTP_HOST"]);
        session_destroy();

    }

    else
    {
        return false;
    }
