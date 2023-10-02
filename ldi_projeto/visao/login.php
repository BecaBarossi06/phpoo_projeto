<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Donuts LuPoRe</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="shortcut icon" href="imagemldi/logoof.png">
</head>
<body>
  <!--menu!-->
  <div id="menu">
    	<br>	
				<a href="index.php">Home</a>
        <a href="sobrenos.php">Sobre nós</a>
        <a href="cadastrar-usuario.php">Cadastre-se</a>
        <a href="login.php">Login</a>
		
          
          
            <main>
              <section class="container-admin-banner">
                <!-- nome da empresa de rh!-->
            <div id="nome">
              <h3>Donuts</h3>
              <h1>LuPoRe</h1>	
            </div>
              </section>
              <!--<section class="container-form">-->
              <div class="form-container">
              <center>
      <h2>Login</h2>
    </center>
                <form method="post" action="processar-login.php">

              
                  <label for="email">E-mail</label>
                  <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" required>
          
                  <label for="senha">Senha</label>
                  <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" required>
                  <section class="container-form">                  
                        <input type="submit" name="entrar" 
                        class="botao-cadastrar" value="Entrar"/>  
              
                  </section>
                 
                  <?php if (isset($_GET["erro"])){ ?>
                    <label for="senha">Usuário ou senha inválidos</label>
                  <?php }?>
                </form>
              </div>
             
            </main>   
                   
                  
</div>
</body>
</html>

