<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Nutrição</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="caixa" id="user">
    <form action="saida.php">
        <h2 id="titulo01">Bem-vindo</h2>
        <input type="text" placeholder="Usuário" required="required" name="user">
        <br>
        <input type="password" placeholder="Senha" required="required" name="pass">
        <br>
        <input type="submit" value="Entrar" id="entrar">
    </form>
</div>

<div class="caixa" id="visitante">
    <h2 id="titulo02">Visitante</h2>
    <form action="saida.php">
        <input type="number" required="required" min="0" step="1" placeholder="Idade" name="idade">
        <br>
        <input type="number" required="required" min="0" step="0.1" placeholder="Peso" name="peso">
        <br>
        <input type="number" required="required" min="0" step="0.01" placeholder="Altura" name="altura">
        <br>
        <input type="submit" required="required" value="Entrar como visitante" id="entrarvisitante">
    </form>
</div>
    
</body>
</html>