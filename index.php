<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php
            include_once 'class/PaginaInicial.php';
            $noturl = isset($_GET['var'])? $_GET['var'] : 0;
        ?>
        <meta charset="UTF-8">
        <meta name="author" content="Odair Cesar">
        <meta name="description" content="Todo o tipo de conteúdo sobre o League Of Legends entreterimento, estudo, atualizações, listas dos melhores campeões do pacth e muito mais">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/estilo-medio.css">
        <link rel="stylesheet" type="text/css" href="css/fontes.css">
        <link rel="stylesheet" type="text/css" href="css/fontes-medio.css">
        <link rel="shortcut icon" href="imagens/logo-lol.jpg">
        <title>Tudo Sobre LOL</title>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-6479735546054520",
                enable_page_level_ads: true
            });
        </script>
    </head>
    <body>
        <?php
            $pagina = new PaginaInicial($noturl);
            $pagina->MontarMenu();
            $pagina->MontarDetalhes(false, 1,3,0,2);
            $pagina->MontarConteudo(true, true);
        ?>
    </body>
</html>
