<?php
session_start();

if (!$_SESSION["logado"]){
    echo "você não tem acesso a essa página.";
    header("Location: index.php");
    exit;    
}
if (empty($_GET["id"])) {
    header("Location: lista-produtos.php");
    exit;    
}
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $descricao= $_POST['descricao'];
    $marca = $_POST['marca'];
    $preco = number_format($_POST['preco'], 2, '.', '');

    // Atualiza os dados no banco
    $sql = "UPDATE produtos SET nome = :nome, categoria = :categoria, preco = :preco, cor = :cor, tamanho = :tamanho, descricao = :descricao, marca = :marca WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id',        $id,        PDO::PARAM_INT);
    $stmt->bindParam(':nome',      $nome,      PDO::PARAM_STR);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $stmt->bindParam(':preco',     $preco,     PDO::PARAM_STR);
    $stmt->bindParam(':cor',       $cor,       PDO::PARAM_STR);
    $stmt->bindParam(':tamanho',   $tamanho,   PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindParam(':marca',     $marca,     PDO::PARAM_STR);

    if ($stmt->execute()) {
        $msg = "Produto atualizado com sucesso!";
    } else {
        $msg = "Erro ao atualizar o produto.";
    }
}
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET["id"]);
    $stmt->execute();
    $produto = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editar produto</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Simple Tables">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="css/adminlte.css"><!--end::Required Plugin(AdminLTE)-->
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="lista-produtos.php" class="nav-link">Home</a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contato</a> </li>
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                    <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">15</span> </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span class="dropdown-item dropdown-header">15 Notificações</span>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-envelope me-2"></i> 4 novas mensagens
                                <span class="float-end text-secondary fs-7">3 mins</span> </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-people-fill me-2"></i> 8 novos amigos
                                <span class="float-end text-secondary fs-7">12 horas</span> </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-file-earmark-fill me-2"></i> 3 novos relatórios
                                <span class="float-end text-secondary fs-7">2 dias</span> </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
                                Veja todas as notificações
                            </a>
                        </div>
                    </li> <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->
                    <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
                    
<!-- LOCAL PARA AJUSTARMOS O NOME -->
                    <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline"><?php echo $_SESSION["nome"] ?></span> </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                            <li class="user-header text-bg-primary"> <img src="assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image">
                                <p>
                                    <?php echo $_SESSION["nome"] ?>
                                    <small>desde Nov. 2023</small>
                                </p>
                            </li> <!--end::User Image--> <!--begin::Menu Body-->
                            <li class="user-body"> <!--begin::Row-->
                                <div class="row">
                                    <div class="col-4 text-center"> <a href="#">Seguidores</a> </div>
                                    <div class="col-4 text-center"> <a href="#">Vendas</a> </div>
                                    <div class="col-4 text-center"> <a href="#">Clientes</a> </div>
                                </div> <!--end::Row-->
                            </li> <!--end::Menu Body--> <!--begin::Menu Footer-->
                            <li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a> <a href="logout.php" class="btn btn-default btn-flat float-end">Sign out</a> </li> <!--end::Menu Footer-->
                        </ul>
                    </li> <!--end::User Menu Dropdown-->
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <?php
        include("aside.php");
        ?>
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edição de produtos</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="lista-produtos.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edição de produtos
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Edita Produto :: <?php echo $produto["id"]." | ".$produto["nome"]; ?></h3>
                            </div> <!-- /.card-header -->
                            <div class="card-body">
                            <form action="edita-produto.php?id=<?php echo $produto['id']?>" method="POST" class="needs-validation" novalidate>
                                    <!-- Campo oculto para o ID -->
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($produto['id']); ?>">

                                    <!-- Campo Nome -->
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome do Produto</label>
                                        <input type="text" id="nome" name="nome" 
                                            class="form-control" 
                                            value="<?php echo htmlspecialchars($produto['nome']); ?>" 
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, insira o nome do produto.
                                        </div>
                                    </div>
                                    <!-- Campo Descrição -->
                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição</label>
                                        <textarea id="descricao" name="descricao" 
                                            class="form-control" 
                                            required><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
                                        <div class="invalid-feedback">
                                            Por favor, insira uma descrição para o produto.
                                        </div>
                                    </div>
                                    <!-- Campo Tamanho -->
                                    <?php
                                     // Inicializa todas as opções vazias
                                    $tamanhos = ['PP' => '', 'P' => '', 'M' => '', 'G' => '', 'GG' => '', 'XG' => ''];

                                    // Marca a opção correspondente ao tamanho do produto
                                    if (isset($produto['tamanho']) && array_key_exists($produto['tamanho'], $tamanhos)) {
                                        $tamanhos[$produto['tamanho']] = 'selected';
                                    }
                                    ?>
                                    <div class="mb-3">
                                        <label for="tamanho" class="form-label">Tamanho</label>
                                        <select id="tamanho" name="tamanho" 
                                            class="form-control" 
                                            required>
                                            <option value="PP" <?php echo $tamanhos['PP']; ?>>PP</option>
                                            <option value="P"  <?php echo $tamanhos['P']; ?>>P</option>
                                            <option value="M"  <?php echo $tamanhos['M']; ?>>M</option>
                                            <option value="G"  <?php echo $tamanhos['G']; ?>>G</option>
                                            <option value="GG" <?php echo $tamanhos['GG']; ?>>GG</option>
                                            <option value="XG" <?php echo $tamanhos['XG']; ?>>XG</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, selecione um tamanho para o produto.
                                        </div>
                                    </div>

                                    <!-- Campo Categoria -->
                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categoria</label>
                                        <input type="text" id="categoria" name="categoria" 
                                            class="form-control" 
                                            value="<?php echo htmlspecialchars($produto['categoria']); ?>" 
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, insira a categoria do produto.
                                        </div>
                                    </div>
                                    <!-- Campo Marca -->
                                    <div class="mb-3">
                                        <label for="marca" class="form-label">Marca</label>
                                        <input type="text" id="marca" name="marca" 
                                            class="form-control" 
                                            value="<?php echo htmlspecialchars($produto['marca']); ?>" 
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, insira a marca do produto.
                                        </div>
                                    </div>
                                    <!-- Campo Cor -->
                                    <div class="mb-3">
                                        <label for="cor" class="form-label">Cor</label>
                                        <input type="text" id="cor" name="cor" 
                                            class="form-control" 
                                            value="<?php echo htmlspecialchars($produto['cor']); ?>" 
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, insira a cor do produto.
                                        </div>
                                    </div>

                                    <!-- Campo Preço -->
                                    <div class="mb-3">
                                        <label for="preco" class="form-label">Preço</label>
                                        <input type="number" id="preco" name="preco" 
                                            class="form-control" 
                                            value="<?php echo number_format(htmlspecialchars($produto['preco']),2,'.',','); ?>" 
                                            step="0.01" 
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, insira o preço do produto.
                                        </div>
                                    </div>

                                    <!-- Botão Salvar -->
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                         <!-- Botão Excluir -->
                                        <a href="exclui-produto.php?id=<?php echo htmlspecialchars($produto['id']); ?>" 
                                        class="btn btn-danger"
                                        onclick="return confirm('Tem certeza de que deseja excluir este produto?');">
                                            Excluir
                                        </a>
                                    </div>
                                </form>
                            </div>
<script>
    (function () {
        'use strict';

        // Obtém todos os formulários que precisam de validação
        const forms = document.querySelectorAll('.needs-validation');

        // Itera pelos formulários e previne o envio se inválido
        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>                               
                            </div> <!-- /.card-body -->

                            <div class="card-footer clearfix">
                                <?php
                               if (!empty($msg)){
                                   echo "<div class=\"alert alert-success\" role=\"alert\">";
                                   echo $msg; 
                                   echo "</div>";
                               }
                               ?>

                            </div>
                        </div> 
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        <footer class="app-footer"> <!--begin::To the end-->
            <strong>
                Copyright &copy; 2024&nbsp;
            </strong>
            Todos os direitos reservados.
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!--end::Script-->
</body><!--end::Body-->

</html>