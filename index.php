<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php 
            include_once 'class/Pagina.php';
            $noturl = isset($_GET['var'])? $_GET['var'] : 0;
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-witdh, initial-scale=1">
        <meta name="author" content="Odair Cesar">
        <meta name="description" content="Todo o tipo de conteúdo sobre o League Of Legends entreterimento, estudo, atualizações, listas dos melhores campeões do pacth e muito mais">
        <title>Tudo Sobre LOL</title>
        <link href="estilo.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="fontes.css">
        <link rel="shortcut icon" href="imagens/mini-logo.ico">
    </head>
    <body>
        <?php
            $pagina = new Pagina("Inicio", 0);
        ?>
    </body>
</html>