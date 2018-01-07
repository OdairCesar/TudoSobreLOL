<html>
<head>
    <title>Teste</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <link rel="stylesheet" type="text/css" href="../fontes.css">
    <?php
        require_once 'PaginaPrincipal.php';
        $noturl = isset($_GET['var'])? $_GET['var']: "0";
    ?>
</head>
<body>
    <?php 
        $noticia = new PaginaPrincipal($noturl);
        print_r($noticia);
    ?>
</body>
</html>