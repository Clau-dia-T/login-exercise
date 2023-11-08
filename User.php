<?php

class User{

    //Atributos
    public $user;
    public $pass;
    public $idade;
    public $peso;
    public $altura;

    //Construtor
    function __construct($user, $pass, $idade, $peso, $altura){
        $this->user = $user;
        $this->pass = $pass;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
    }

}

?>

