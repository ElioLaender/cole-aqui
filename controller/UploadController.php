<?php

include_once 'config/AutoLoadConfig.php';

class UploadController extends ControllerConfig 
{
    private $route;

    public function upLoadImag($diretorio)
    {
        $objRoute = new RouteConfig();
        $route = $objRoute->rotas();
        $upload = new UploadImagem();
        $aut = AutenticadorConfig::instanciar();
        $upload->width = 250;
        $upload->height = 250;

        #verifica se foi realizado o upload da foto, caso contrário, não salva a referencia da imagem na base de dados.
        if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name']))
        {
            $newName = $upload->renameUpLoad($aut->pegar_usuario().date("d/m/Y H:i:s "));
            #foi passado o array contento a imagem e o usuário logado como argumento,
            $_FILES['img']['name'] = $newName;
            @unlink($diretorio.$newName);
            $upload->salvar($diretorio, $_FILES['img']);
            return $_FILES['img']['name'] = $diretorio.$newName;
        } else 
        {
          return  0;
           
        }
    }-
}
