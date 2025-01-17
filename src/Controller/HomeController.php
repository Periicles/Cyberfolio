<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController{
    #[Route('/', name: 'app_homepage', methods: ['GET'])]
    public function homepage(UserRepository $userRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
}
