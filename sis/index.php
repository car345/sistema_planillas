<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SisPlanillas</title>
    <link rel="stylesheet" href="./Resources/css/index.css "> 
    <link rel="stylesheet" href="./Resources/assets/vendor/bootstrap/css/bootstrap.css "> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
	<link rel="shortcut icon" href="Resources/img/file1.png">
</head>
<body>
    <div class="container-all">
        <div class="ctn-form">
            <img src="./Resources/img/fiis.png  " alt="" class="logo">
            <h1 class="title fw-bold" >INICIAR SESIÓN</h1>
            <form action="code-login.php" method="post">
                <label for="" class="fw-bold"><i class="bi bi-person-square"></i> Usuario </label>
                <input type="text" name="user" class="form-control" required>
                <span class="msg-error"></span>
                <label for=""class="fw-bold"><i class="bi bi-shield-lock"></i> Contraseña </label>
                <input type="password" name="pass" class="form-control " required>
                <span class="msg-error"></span>

                <input type="submit" value="Iniciar >>" >

            </form>

        </div>

        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description">Sistema de Planillas.</h1>
            <p class="text-description">Sistema para gestionar datos de los trabajadores entre otros. </p>
        </div>

    </div>

</body>

</html>
