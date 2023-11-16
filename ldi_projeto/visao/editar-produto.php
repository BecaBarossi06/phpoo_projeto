<!doctype html>
<?php

session_start();

// Verifica se os dados foram recebidos via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém os dados enviados
  $usuario = $_POST['usuario'];
  $nomeusuario = $_POST['nome'];

  // Faz alguma coisa com os dados recebidos, se necessário
  // ...

  // Configura as variáveis de sessão, se necessário
  $_SESSION['usuario'] = $usuario;
  $_SESSION['nomeusuario'] = $nomeusuario;
} else {
  header("Location: login.php");
  exit;
}
include 'menu.php';
include '..\controladora\conexao.php';
include '..\modelo\Produto.php';
include '..\Repositorio\ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($conn);
$produto = $produtosRepositorio->listarDonutsId($_POST['id']);

?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="../img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>IFSP - Editar Produto</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <!-- <img src="../img/logo-ifsp-removebg.png" class="logo-admin" alt="logo-serenatto"> -->
      <h1>Editar Produto</h1>
      <img class="ornaments" src="../img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
      <form method="POST" onsubmit="editarProduto();" id="editarForm">

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= $produto->getNome(); ?>" required>

        <div class="container-radio">
          <div>
            <label for="donuts">Donuts</label>
            <input type="radio" id="1" name="nome" value= "Donuts caramelo" <?php if ($produto->getNome() == "Donuts caramelo") { ?>checked><?php } else { ?> > <?php } ?>
            <input type="radio" id="2" name="nome" value= "Donuts chocolate" <?php if ($produto->getNome() == "Donuts chocolate") { ?>checked><?php } else { ?> > <?php } ?>
            <input type="radio" id="3" name="nome" value= "Donuts morango" <?php if ($produto->getNome() == "Donuts morango") { ?>checked><?php } else { ?> > <?php } ?>
          </div>
        </div>


        <label for="preco">Preço</label>
        <input type="text" id="preco" name="preco" value="<?= $produto->getPreco(); ?>" required>

        <?php $imagemfake = $produto->getImagem();


        // Remove a parte "C:\fakepath\" do valor (apenas no caso de navegadores baseados em Windows)
        $imagem = basename($imagemfake);

        // Agora, $imagem conterá apenas o nome do arquivo, sem a parte "C:\fakepath\"
        ?>
        <label for="imagem">Envie uma nova imagem do produto ou mantenha a imagem atual:
          <div class="container-foto">
            <img src="<?= $produto->getImagem(); ?>" alt="<?php echo $imagem; ?>" width="200">
          </div><?php echo $imagem; ?>
        </label>
        <input type="file" name="imagem" accept="image/*" id="imagem" value="<?php echo $imagem; ?>">

        <input type="hidden" name="id" id="id" value="<?= $produto->getId(); ?>">
        <input type="submit" name="editar" class="botao-cadastrar" value="Editar produto" />
      </form>

    </section>
  </main>
  <script>
    

    function editarProduto() {
      event.preventDefault(); // Impede o envio padrão do formulário
      // Pega o valor do campo de arquivo
      const fileInput = document.getElementById("imagem");
      const filePath = fileInput.value;

      // Remove a parte "C:\fakepath\" do valor
      const fileName = filePath.replace("C:\\fakepath\\", "");

      const nome = document.getElementById("nome").value;
      const preco = document.getElementById("preco").value;
      const imagem = document.getElementById("imagem").value;
      const id = document.getElementById("id").value;

      Swal.fire({
        title: "Confirme a edição do produto",
        html: `<strong>Nome:</strong> ${nome}<br>
           <strong>Preço:</strong> ${preco}<br>
           <strong>Imagem:</strong> ${fileName}<br>`,
        showDenyButton: true,
        
        confirmButtonText: "Editar",
        denyButtonText: "Cancelar",

      }).then((result) => {
        if (result.isConfirmed) {
          // Se o usuário confirmar a edição, redirecione para outra página
          const url = `../controladora/processar-editar-produto.php?nome=${nome}&preco=${preco}&id=${id}&imagem=${fileName}`;
          window.location.href = url;
        } else if (result.isDenied) {
          Swal.fire("Edição cancelada", "", "info");
        }
      });

      // Impede o envio do formulário
      return false;
    }
  </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/index.js"></script>
</body>

</html>