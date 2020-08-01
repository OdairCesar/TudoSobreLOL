<html>
<body>
	<h1>Tudo sobre LOL</h1>
	<h2>Site desenvolvido em PHP para tornar as postagens do site <a href="http://tslol.000webhostapp.com" target="_blank">tudo sobre LOL</a> mais praticas</h2>

	<p>O site em funcionamento esta <a href="http://loltudo.000webhostapp.com" target="_blank">aqui</a></p>
	<h3>Os arquivos php estam separados em Classes:</h3>
	<ul>
		<li>Classes que descentem da Conteudo.php (Atualizacao, Tier, Noticias): São usadas para fazem a frente do site transfirmar o conteudo passado via metodos em HTML</li>
		<li>Classes que descentem da Pagina.php (PaginaInicial, PaginaNoticias, PaginaZoera, PaginaAtualizacao, PaginaTier): São usadas para pedir as informações para classes de controle de Banco de Dados e passar as mesmas para as classes que iram criar a frente em HTML. Elas controlam basicamente o fluxo de informação no site</li>
		<li>Classes que descentem da Conexao.php (QueryInicio, QueryNoticia, QueryAtualizacao, QueryTier): São usadas para pegar as informações no Banco de Dados, a maioria das classes filhas só tem acesso a uma tabela do Banco de Dados, a unica que tem acesso a todas é a QueryInicio, que acessa uma linha de todas as tabelas</li>
		<li>A classe detalhe, foi criada para fazer uma exposição facil das ultimas postagens no começo do site</li>
	</ul>
	<br>
	
	<h3>Os dados do Banco de Dados</h3>
	<ul>
		<li><b>atualização:</b> armazena os dados dos artigos referente as ultimas atualizações que aconteceram no jogo. </br>
		<b>Colunas:</b> id (chave primaria), titulo (varchar), descricao (varchar), lancamento (date), criadores(varchar), argencia(varchar), imagem(varchar contendo o caminho da foto), video(varchar contendo o link do youtube), versao(int), campeao(varchar), habilidade(varchar), mudanca(varchar)	</li>

		<li><b>noticias e zoeras</b> (as duas tabelas usam mesma estrutura): armazena os artigos referente as ultimas noticias do e-sports (CBLOL) e a zoeras as brigadeiras dos espectadores ao zuado dos erros de pro-players. </br>
		<b>Colunas:</b> id (chave primaria), titulo (varchar), subtitulo (text), lancamento(date), escritor (varchar), argencia (varchar default E-SporTV), imagem (varchar link da imagem), video (varchar link do youtube), artigo (text)</li>
		
		<li><b>tier_s:</b> armazenam as listas de campeções mais fortes do jogo. </br>
		<b>Colunas:</b> id (chave primaria), versao (varchar 30), descricao (varchar), lancamento (date), criador (varchar), site_origem (varchar), imagem (varchar), video (varchar), bufs (varchar), nerfs (varchar), tabela (varchar), explicacao (text)</li>
	<ul>
</body>
</html
