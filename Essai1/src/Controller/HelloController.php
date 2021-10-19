<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HelloController {

    /**
     * @Route ("/hello")
     */
    public function hello(){
        return new Response ("Hello World !!!");
    }
}

