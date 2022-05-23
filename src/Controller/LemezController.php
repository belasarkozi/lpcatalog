<?php

namespace App\Controller;

use App\Entity\Lemez;
use App\Entity\Kiado;
use App\Entity\Szerzo;

use App\Form\LemezType;
use App\Repository\LemezRepository;
use App\Repository\KiadoRepository;
use App\Repository\SzerzoRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LemezController extends AbstractController
{
    
    public function index(LemezRepository $lemezRepository): Response
    {
        return $this->render('lemez/index.html.twig', [
            'lemezs' => $lemezRepository->findAll(),
        ]);
    }

    public function new(Request $request, 
                        LemezRepository $lemezRepository, 
                        KiadoRepository $kiadoRepository,
                        SzerzoRepository $szerzoRepository
                    ): Response
    {
        $lemez   = new Lemez();
        $kiadok  = $kiadoRepository->all();
        $szerzok = $szerzoRepository->all();

        $form = $this->createForm(LemezType::class, $lemez);
        $form->handleRequest($request);

        
        if ($request->isMethod('POST')) {
                
                $lemezRepository->add($lemez, true);

                return $this->redirectToRoute('app_lemez_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lemez/new.html.twig', [
            'lemez'   => $lemez,
            'kiadok'  => $kiadok,
            'szerzok' => $szerzok,
            'form'    => $form,
        ]);
    }
}
