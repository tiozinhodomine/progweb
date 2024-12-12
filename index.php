<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AV4 - Leonardo</title>
    <link rel="stylesheet" href="css/AV4.CSS">
    <link rel="icon" href="img/favicon.png" type="image/png">
    </head>

  <body>
    <div class="container">
        <h1>"Encontre o emprego dos seus sonhos com apenas alguns cliques com o JobPedia!" 🌟</h1>
        <p> Faça login para acessar milhares de oportunidades personalizadas para você! Conecte-se com empresas que buscam talentos como o seu e dê o próximo passo na sua carreira. </p> 
        <p> Não tem conta? Cadastre-se agora e comece a transformar seus objetivos profissionais em realidade! 🚀</p>

        <div class="content">
            <img src="img/foto.png" alt="Tecnologia" class="foto">

            <form id="Form" action="login.php" novalidate onsubmit="return validarFormulario()" method="POST">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" minlength="6" maxlength="25" autocomplete="off" placeholder="Digite seu email:" value="bocadeveludo@gmail.com">
                
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" minlength="3" maxlength="8" autocomplete="off" placeholder="Digite sua senha:" value="">
                
                <button type="submit">Enviar</button>
            </form>
        </div>
</div>
    
    <script src="js/AV4.js"></script>
</body>

<footer>
    <p><u><i>&copy Leonardo Vilella - 2024 ProgWeb</u></i></p>
</footer>

</html>