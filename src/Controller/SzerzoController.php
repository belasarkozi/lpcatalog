<?php

namespace App\Controller;

use App\Entity\Szerzo;
use App\Form\SzerzoType;
use App\Repository\SzerzoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SzerzoController extends AbstractController
{

    public function new(Request $request, SzerzoRepository $szerzoRepository): Response
    {
        $szerzo = new Szerzo();
        $form = $this->createForm(SzerzoType::class, $szerzo);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $szerzoRepository->add($szerzo, true);

            return $this->redirectToRoute('app_lemez_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('szerzo/new.html.twig', [
            'szerzo' => $szerzo,
            'form' => $form,
        ]);
    }

}
