<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fuentes de letra -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="/proyecto-yeison/css/normalize.css">
    <link rel="stylesheet" href="/proyecto-yeison/css/estilo.css">
    <title>Hospital E.S.E San José del Guaviare</title>
</head>

<body>

    <header class="barra">

        <div class="contenedor__barra">
            
            <img src="/proyecto-yeison/img/logo.png" alt="Logo Hospital">

            <nav>
                <?php if(!isset($_SESSION['login'])) { echo "<a href='/proyecto-yeison/vistas/iniciar-sesión.php'>Iniciar Sesión</a>"; } ?>

                <?php if(isset($_SESSION['login'])) { echo "<a href='#'>Historial</a>"; } ?>

                <?php if(isset($_SESSION['login'])) { echo "<a href='#'>Cerrar Sesión</a>"; } ?>
            </nav>
        </div>

    </header>

    <main class="contenedor">