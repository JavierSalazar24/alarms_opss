<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon1.png">
    <title>Iniciar Sesión | OPSS</title>


    <style>
        .body-login{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #119dcf;
        }
        .row{
            width: 60%;
            margin-left: auto;
            margin-right: auto;            
        }
        label{
            color: #fff;
            /* margin-bottom: 0px; */
        }
        .form-control{
            border:none;
            border-bottom: 1px solid #fff;
            background: transparent;
            border-radius: 0px;
            padding: 0px;
            color: #fff;
        }
        .form-control:focus{
            color: #fff;
            border-bottom: 1px solid #fff;
            box-shadow: none;
            /* border-bottom: 1px solid #fff; */
            background: transparent;
            /* border: 2px solid #343a40;   */
            /* border-radius: 0px; */
        }
    </style>

</head>

<body class="body-login">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col">
                <h1 class="text-center">Iniciar sesión</h1>
                <p class="text-center">¿Eres nuevo en este sitio? <a href="registrarse.php">Regístrate</a></p>
                <hr>
                <form id="form_login" class="mt-5">
                    <div class="form-group row" >
                        <div class="col-12 mb-5">
                            <label for="nombre">Email</label>
                            <input type="email" class="form-control" name="correo" id="nombre">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="pass">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="pass">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">                            
                            <button type="submit" class="btn btn-dark btn-block">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <script src="js/peticiones_php.js"></script>
</body>

</html>