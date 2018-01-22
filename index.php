<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php 
            include_once 'class/Pagina.php';
            $noturl = isset($_GET['var'])? $_GET['var'] : 0;
        ?>
        <meta charset="UTF-8">
        <meta name="author" content="Odair Cesar">
        <meta name="description" content="Todo o tipo de conteúdo sobre o League Of Legends entreterimento, estudo, atualizações, listas dos melhores campeões do pacth e muito mais">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6479735546054520",
            enable_page_level_ads: true
            });
        </script>
        <title>Tudo Sobre LOL</title>
        <link href="estilo.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="fontes.css">
        <link rel="shortcut icon" href="imagens/logo-lol.jpg">
    </head>
    <body>
        <?php
            $pagina = new Pagina("Inicio", $noturl);
        ?>
    </body>
</html>