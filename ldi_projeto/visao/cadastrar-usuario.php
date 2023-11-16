<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <title> Cadastrar Usuário</title>
    <link rel="shortcut icon" href="../imagemldi/logocima.jpg">
</head>
<body>
    
                <div id="menu">
    	        <br>	
				<a href="index.php">Home</a>
				<a href="sobrenos.php">Sobre nós</a>
    			<a href="cadastrar-usuario.php">Cadastre-se</a>
				<a href="login.php">Login</a>
		        </div>
            
          
            <main>
              <section class="container-admin-banner">
         
		<div id="nome">
			<h3>Donuts</h3>
			<h1>LuPoRe</h1>	
		</div>

	<!--imagem lateral!-->
    <div id="imagem-lateral">
		<img src="../imagemldi/donutshome.png">
		</div>


        <main>
    <section class="container-admin-banner">
    <center>
    <h2>Cadastro de Usuários</h2>
    </center>
        

      
    </section>
    <section class="container-form">
        <form method="post" action="../controladora/processar-cadastro.php">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" 
            placeholder="Digite seu nome" required>
            
            <label for="email">e-mail</label>
            <input type="email" id="email" name="email" 
            placeholder="Digite seu email" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" 
            placeholder="Digite uma senha" required>
           
            <label for="confirmarsenha">Confirmar Senha</label>
            <input type="password" id="confirmarsenha" name="confirmarsenha" 
            placeholder="Digite uma senha" required>
        <?php 
            if(isset($_GET["erro"])){
                //echo "erro! senha e confirmar senha não são iguais";
            ?>
                <label for="erro">Senha e confirmar senha não são iguais</label>
            <?php } ?>

   
        <section class="container-form">                  
            <input type="submit" name="cadastrar" 
            class="botao-cadastrar" value="Cadastrar"/>      

    </section>
    </form>
</main>
</body>
</html>
