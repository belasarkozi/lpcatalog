<?php

namespace App\Controller;

use App\Entity\Kiado;
use App\Form\KiadoType;
use App\Repository\KiadoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KiadoController extends AbstractController
{

    public function new(Request $request, KiadoRepository $kiadoRepository): Response
    {
        $kiado = new Kiado();
        $form = $this->createForm(KiadoType::class, $kiado);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $kiadoRepository->add($kiado, true);

            return $this->redirectToRoute('app_lemez_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('kiado/new.html.twig', [
            'kiado' => $kiado,
            'form' => $form,
        ]);
    }
 
}
