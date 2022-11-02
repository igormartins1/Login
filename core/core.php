<?php

class Core{
    // criando uma função 
    // criando uma instancia da classe

    public function __construct()
    {
          // chamando o método init
        $this->run();
    }

    public function run(){
        if(isset($_GET['pag'])){
            $url=$_GET['pag'];
        }
        // possui informação após dominio wwww.site.com/classe/funcao/parametro
        if(!empty($url)){
            $url=explode('/',$url);
            $controller=$url[0] .'Controller'; // noticiaControle
            array_shift($url);// Vai tirar o primeiro elemento do array
        // if o usuario mandou funcao
        if(isset($url[0]) && !empty($url[0]))
        {
            $metodo=$url[0];
            array_shift($url);
        }

        else
        {   // enviou  somente classe
                $metodo='index'; 
        }
            // verificar se sobrou algo no array

            if(count($url)>0)
            {
                $parametro=$url;
            }

        }else // www.sitex.com.br 
        {
            $controller='homeController';
            $metodo='index';
            
        }

        // verificar se o arquivo está presente 
        $caminho='LOGIN/Controllers' . $controller .'.php';

        if(!file_exists($caminho)&& !method_exists($controller,$metodo))
        {
            $controller='homeController';
            $metodo='index';
            
        }

        $c= new $controller;

        call_user_func_array(array($c,$metodo),$parametro);
    }
}



$c= new Core();



// 'www.nomesite/noticia/entretenimento/10'