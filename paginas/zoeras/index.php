<html>
    <head>
        <meta charset="utf8">
        <?php
            include_once '../../class/PaginaZoera.php';
            $coment[] = isset($_POST['nome'])? $_POST['nome'] : null;
            $coment[] = isset($_POST['comentario'])? $_POST['comentario'] : null; 
            $noturl = isset($_GET['var'])? $_GET['var'] : 0;
            $pagina= new PaginaZoera(false, "", $noturl, $coment);
            $pagina->FazerMetas();
        ?>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/estilo-medio.css">
        <link rel="stylesheet" type="text/css" href="../../css/fontes.css">
        <link rel="stylesheet" type="text/css" href="../../css/fontes-medio.css">
        <link rel="shortcut icon" href="../../imagens/logo-lol.jpg">
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
            $pagina->MontarMenu();
            $pagina->MontarDetalhes(false, 1, 2, 3, 0);
            $pagina->MontarConteudo(false, true);
        ?>
    </body>
</html>
