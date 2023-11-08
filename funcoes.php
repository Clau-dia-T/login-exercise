<?php
    function calcular_menor($altura){
        return (18.5*(pow($altura,2)));
    }

    function calcular_maior($altura){
        return (24.9*(pow($altura,2)));
    }

    function calcular_imc($peso, $altura){
        return (($peso/(pow($altura,2))));
    }

    function classificar($imc){
        if($imc < 18.5){
            echo "Abaixo de peso";
        }
        elseif($imc < 24.9){
            echo "Peso Normal";
        }
        elseif($imc < 29.9){
            echo "Sobrepeso";
        }
        elseif($imc < 34.9){
            echo "Obesidade Grau I";
        }
        elseif($imc < 39.9){
            echo "Obesidade Grau II";
        }
        elseif($imc >= 40){
            echo "Obesidade Grau III ou Mórbida";
        }
        else{
            echo "Erro, tente novamente";
        }
    }
?>