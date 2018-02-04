<html>
    <head>
        <meta charset="utf8">
        <meta name="author" content="Odair Cesar">
        <meta name="description" content="Saiba o que muito do League Of Legends nesse ultimo patch em video ou em artigo. Campeões ficaram roubados, itens que perderam valor o modo rotativo e muito mais.">
        <title>Informações sobre as mudança do ultimo Patch</title>
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
            include_once '../class/PaginaAtualizacao.php';
            $noturl = isset($_GET['var'])? $_GET['var'] : 0;
            $pagina = new PaginaAtualizacao(false, "" ,$noturl);
        ?>
    </head>
    <body>
        <?php
            $pagina->MontarMenu();
            $pagina->MontarDetalhes(false, 1, 2, 3, 0);
            $pagina->MontarConteudo(false, true);
        ?>
    </body>
</html>


