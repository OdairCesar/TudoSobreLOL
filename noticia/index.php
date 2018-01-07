<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="../estilo.css">
        <link rel="stylesheet" type="text/css" href="../fontes.css">
        <link rel="shortcut icon" href="../imagens/mini-logo.ico">
        <?php
            include_once '../class/Pagina.php';
            $pagina = new Pagina();
            $noturl = isset($_GET['var'])? $_GET['var'] : "0";
            $pagina->MetaNot($noturl);
        ?>
    </head>
    <body>
        <?php
            $pagina->PaginaNoticia($noturl);
        ?>
    </body>
</html>


