<html>
    <head>
        <meta charset="utf8">
        <meta name="author" content="Odair Cesar">
        <meta name="description" content="Ultimas noticias envolvendo o pro-players, streamers e times do League Of Legends. Contratações, brigas, resultados da rodada do CBLOL e informações de times competitivos">
        <title>Saiba o que acontece no cenario do League Of Legends Brasil</title>
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
            include_once '../class/Pagina.php';
            $noturl = isset($_GET['var'])? $_GET['var'] : 0;
        ?>
    </head>
    <body>
        <?php
            $pagina = new Pagina("Noticia", $noturl);
        ?>
    </body>
</html>


