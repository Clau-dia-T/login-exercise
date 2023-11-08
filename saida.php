<?php

require_once("User.php");
require_once("globais.php");
require_once("funcoes.php");

$form = isset($_GET["idade"]) && isset($_GET["peso"]) && isset($_GET["altura"]);
$formuser = isset($_GET["user"]) && isset($_GET["pass"]);


if($formuser){
    $verificacao = $_GET["user"];
    foreach($users as $i => $u){
        if(str_contains($u->user, $verificacao)){
            if($users[$i]->pass == $_GET["pass"]){
                $user_atual = $users[$i];
                break;
            }
            else{
                header("Location: paginaerro.php");
            }
        } 
        elseif(($i+1) >= count($users)){
            header("Location: paginaerro.php");
        }  
    }

    $menor = calcular_menor($users[$i]->altura);
    $maior = calcular_maior($users[$i]->altura);
    $imc = calcular_imc($users[$i]->peso, $users[$i]->altura);
}

elseif($form){
    $visitante = [
        "idade" => intval($_GET["idade"]), 
        "peso" => floatval($_GET["peso"]), 
        "altura" => floatval($_GET["altura"]), 
    ];
    $menor = calcular_menor($_GET["altura"]);
    $maior = calcular_maior($_GET["altura"]);
    $imc = calcular_imc($_GET["peso"], $_GET["altura"]);
}

else{
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Nutrição - Saida</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <div class="caixa" id="caixasaida">
        <?php if($formuser):?>
            <h2 id="ola">Olá <?= $user_atual->user ?>!</h2>
            <p>Como você possui <span class="red">(<?=$users[$i]->altura?> m)</span> de altura, o seu peso ideal está entre <span class="green">(<?=number_format($menor, 1);?> kg)</span> e <span class="green">(<?= number_format($maior, 1) ;?> kg)</span>.</p>
            <br><br>
            <p>Neste momento, com o seu peso de <span class="red">(<?=$users[$i]->peso?> kg)</span>, o seu IMC é de <span class="green">(<?=number_format($imc, 1);?>)</span>, sendo assim classificado como...</p>
            <p><span class="red">(<?=classificar($imc)?>)</span>.</p>
            <br><br>
            <?php if($user_atual->idade < 18):?>  
            <p>Entretanto, como você possui apenas <span class="red">(<?= $user_atual->idade ?> anos)</span>, estes resultados, como também a tabela abaixo, não estão correctos para si.</p>
            <p>Deste modo, deve buscar a ajuda de um profissional.</p>
            <?php endif;?>

        <?php elseif($form):?>
            <h2 id="ola">Olá Visitante!</h2>
            <p>Como você possui <span class="red">(<?=$visitante["altura"]?> m)</span> de altura, o seu peso ideal está entre <span class="green">(<?=number_format($menor, 1);?> kg)</span> e <span class="green">(<?=number_format($maior, 1);?> kg)</span>.</p>
            <br><br>
            <p>Neste momento, com o seu peso de <span class="red">(<?=number_format($visitante["peso"], 1)?> kg)</span>, o seu IMC é de <span class="green">(<?=number_format($imc, 1);?>)</span>, sendo assim classificado como...</p>
            <p><span class="red">(<?=classificar($imc)?>)</span>.</p>
            <br><br>
            <?php if($visitante["idade"] < 18):?>  
            <p>Entretanto, como você possui apenas <span class="red">(<?= $visitante["idade"] ?> anos)</span>, estes resultados, como também a tabela abaixo, não estão correctos para si.</p>
            <p>Deste modo, deve buscar a ajuda de um profissional.</p>
            <?php endif;?>
        <?php endif;?>
        

        <br><br>
            
        <img src="tabela.png" alt=tabela" id="imagem">
            
        <br>
        <a href="index.php"><button>Sair</button></a>
    </div>
    
</body>
</html>