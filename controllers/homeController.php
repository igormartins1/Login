<?php

class homeController extends Controller{

    public function index($valor_1)
    {
        //Chama um model
        //---------

        //Chamar a View 
        $this->carregaTemplate('index');
    }
}