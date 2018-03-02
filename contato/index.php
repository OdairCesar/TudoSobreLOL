<html>
    <head>
        <meta charset="utf8">
        <title>Deixe sua opnição ou critica para melhor</title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo-medio.css">
        <link rel="stylesheet" type="text/css" href="../css/fontes.css">
        <link rel="stylesheet" type="text/css" href="../css/fontes-medio.css">
        <link rel="shortcut icon" href="../imagens/logo-lol.jpg">
    </head>
    <body>
        <?php
        require '../class/Pagina.php';
        $menu = new Pagina(" ", 1);
        ?>
    <div id="formulario">
        <form action="" method="POST">
            <fieldset id='Pessoa'><legend>Dados Pessoais</legend>
                <p><label for='Inome'>Nome:</label>
                <input id='Inome' type='text' name='nome' maxlength="12" placeholder='Primeiro Nome'>

                <label for='Isobrenome'>Sobrenome:</label>
                <input id='Isobrenome' type='text' name='sobrenome' maxlength="20" placeholder='Ultimo Nome'></p>

                <p><label for='Iemail'>E-mail:</label>
                <input id='Iemail' type='email' name='email' maxlength="50" placeholder='Seu e-mail para contato'></p>

                <p><label for='Iidade'>Idade:</label>
                <input id='Iidade' type="number" name="idade" maxlength="2" placeholder="Idade Atual"></p>

                <fieldset id='Sex'><legend>Sexo</legend>
                    <input id='Imasc' type='radio' name='sexo' value='Masculino'>
                    <label for='Imasc'>Masculino</label>

                    <input id='Ifem' type='radio' name='sexo' value='Feminimo'>
                    <label for='Ifem'>Feminimo</label>
                </fieldset>
                <fieldset id='Avaliacao'><legend>Opinião e Sugestão</legend>
                    <p><label for='Inota'>Nota:</label>
                    0 <input id='Inota' type="range" name="nota" min="0" max='10' placeholder="Sua nota para o site"> 10</p>

                    <p><label for='Iopiniao'>Opinião:</label></p>
                    <textarea id='Iopiniao' name='opiniao' cols='75' rows='10'></textarea>
                </fieldset>
            </fieldset>

            <label for="Ienviar">Enviar</label>
            <input id="Ienviar" type="submit" name="enviar">
        </form>
    </div>
    </body>
</html>
