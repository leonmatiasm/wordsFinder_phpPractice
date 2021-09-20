<?php include_once('box/strings.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica con strings</title>
    <script src="box/eraseText.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <?php
    if (!empty($_POST['texto'])) {
        $viejoTexto = $_POST['texto'];
    }
    ?>
</head>

<body>
    <div class="container">

        <div class="mb-3">
            <h1>Encuentra muletillas en un texto</h1>
            <p class="text-muted"><i>Pega un texto y escribe una palabra o parte de una palabra. Se mostrará número de veces y en donde están. </i></p>
        </div>
        <form action="/" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text">Palabra a buscar</span>
                <input class="form-control" type="text" name="palabra" placeholder="Ej: además" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="texto" class="form-label">Texto en donde buscar:</label>
                <textarea 
                    class="form-control form-control-sm" 
                    name="texto" id="output" rows="8" 
                    placeholder="...">
                        <?php if (!empty($viejoTexto)) {echo $viejoTexto;} ?>
                </textarea>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary btn-lg" type="submit" value="Buscar">
                <input class="btn btn-secondary btn-lg" type="button" value="Limpiar" onclick="eraseText();">
            </div>
        </form>
        <div>
            <?php
            if (!empty($_POST['palabra']) && !empty($_POST['texto'])) {

                $palabra = strtolower($_POST['palabra']);
                $texto = strtolower($_POST['texto']);

                $num_words = substr_count($texto, $palabra);
            }
            ?>
            <?php if (!empty($palabra)) {
                echo "<h3>Palabra <span class='text-warning bg-dark px-3'> $palabra</span>,usada $num_words veces</h3>";
            } else {
                echo "<h3></h3>";
            } ?>
            
        </div>
        <div class="my-3">
            <?php
            if (!empty($_POST['palabra']) && !empty($_POST['texto'])) {
                echo subrayarPalabras($palabra, $texto);
            }
            ?>
        </div>
    </div>
    <footer class="container text-center ">

        <a href="https://twitter.com/leonmatiasm" class="text-decoration-none" target="_blank">@leonmatiasm</a>
    </footer>
</body>

</html>