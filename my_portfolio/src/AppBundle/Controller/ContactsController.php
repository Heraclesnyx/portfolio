<?php

// src/AppBundle/Controller/UserController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactsController extends DefaultController
{
    /**
     * @Route("/login")
     */
    public function ContactAction()
    {
        if (!$this->getContact())
            return $this->redirectToRoute(' ');
    }
}