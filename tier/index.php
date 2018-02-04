<html>
    <head>
        <meta charset="utf8">
        <meta name="author" content="Odair Cesar">
        <meta name="description" content="Os mais fortes e poderosos campeões de cada patch lançado nesse ano, com explicação detalhada dos campeões que entraram tanto em texto quanto em video,">
        <title>Lista de campeões nivel S nos Patchs do League of Legends</title>
        <link rel="stylesheet" type="text/css" href="../estilo.css">
        <link rel="stylesheet" type="text/css" href="../fontes.css">
        <link rel="shortcut icon" href="../imagens/logo-lol.jpg">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-6479735546054520",
                enable_page_level_ads: true
            });
        </script>
        <?php
            include_once '../class/PaginaTier.php';
            $noturl = isset($_GET['var'])? $_GET['var'] : 0;
        ?>
    </head>
    <body>
        <?php
            $pagina = new PaginaTier(false, "" ,$noturl);
            $pagina->MontarMenu();
            $pagina->MontarDetalhes(false, 1, 2, 3, 0);
            $pagina->MontarConteudo(false, true);
        ?>
    </body>
</html>
