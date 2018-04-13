<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 12/04/18
 * Time: 18:27
 */

namespace Controller;


use Model\SocketManager;

class SocketController extends AbstractController
{
    public function index()
    {
        $socketManager = new SocketManager();
        $sockets = $socketManager->selectColor();

        return $this->twig->render('Socket/index.html.twig',['sockets'=> $sockets]);
    }

    public function socketAdd()
    {
        $socketManager = new SocketManager();
        if ( isset($_POST['color']) && isset($_POST['name'])){
            $socketManager->insertSocket($_POST['name'],$_POST['color']);
        }
        $sockets = $socketManager->selectColor();

        return $this->twig->render('Socket/socketAdd.html.twig',['sockets'=> $sockets]);
    }
}