<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()) {
            $this->addFlash('info', 'Vous êtes déjà connecté.');
            return $this->redirectToRoute('app_homepage');
        }

        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordHasher->hashPassword($user, $form->get('plainPassword')->getData())
            );
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Votre compte à bien été créé, connectez-vous !');
            return $this->redirectToRoute('login');
        }
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
