<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact-us', name: 'app_contact_us')]
    public function contactUs(): Response
    {
        return $this->render('home/contact.html.twig', [
            'name_to_contact' => 'Jorge Martins',
            'email_to_contact' => 'jorge.sj4web@gmail.com'
        ]);
    }

}
