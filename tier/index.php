<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="../estilo.css">
        <link rel="stylesheet" type="text/css" href="../fontes.css">
        <link rel="shortcut icon" href="../imagens/mini-logo.ico">
        <?php
            include_once '../class/Pagina.php';
            $noturl = isset($_GET['var'])? $_GET['var'] : 1;
        ?>
    </head>
    <body>
        <?php
            $pagina = new Pagina("Tier", $noturl);
        ?>
    </body>
</html>

