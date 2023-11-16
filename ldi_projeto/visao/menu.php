<!DOCTYPE html>
<html>

<head>
    <title>Menu do Usuário</title>

    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="menu">
        <div class="user-info dropdown">
            <div class="user-photo">
                <img src="..\imagemldi\logocima.jpg" alt="Foto do Usuário">
            </div>
            <div class="user-name"><?= $_SESSION["nomeusuario"]; ?></div>
            <div class="dropdown-content">
                <!-- Conteúdo do dropdown -->
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Configurações</a>
                <!-- Use um formulário para redirecionar para admin.php -->
                <form id="adminForm" action="admin.php" method="post" style="display: none;">
                    <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                    <input type="hidden" name="nome" value="<?= $_SESSION['nomeusuario']; ?>">
                </form>
                <!-- Passa os dados diretamente para o JavaScript -->
                <a class="dropdown-item" href="#" onclick="document.getElementById('adminForm').submit();">Admin</a>

                <a class="dropdown-item" href="#" onclick="logout()">Sair</a>
            </div>
        </div>
        <button class="logout-button" onclick="logout()">Sair</button>
    </div>
    <script>
        function redirectToAdmin(usuario, nomeusuario) {
            // Cria a URL com os parâmetros
            var url = 'admin.php?usuario=' + encodeURIComponent(usuario) + '&nome=' + encodeURIComponent(nomeusuario);

            // Redireciona para a página admin.php
            window.location.href = url;
        }
