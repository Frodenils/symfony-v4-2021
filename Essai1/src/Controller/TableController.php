<?php

namespace App\Controller;

use App\Form\TableChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/table", name="table")
 */
class TableController extends AbstractController
{
    /**
     * @Route("/select", name="table_select")
     */
    public function select(Request $request)
    {
        $form = $this->createForm(TableChoiceType::class);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $n = $data['table_number'];
            $m = $data['lines_count'];
            $color = $data['color'];
            $response = $this->render('table/index.html.twig', [
                'controller_name' => 'TableController',
                'n' => $n,
                'm' => $m,
                'color' => $color,
            ]);
        } else {
            return $this->render('table/vue.html.twig', [
                'formulaire' => $form->createView(),
            ]);
        }
    }
    /**
     * @Route("/print/{n}/{m}", name="table_print")
     */
    public function index(int $n, int $m, Request $request): Response
    {
        $color = $request->get('c');
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
            'n' => $n,
            'm' => $m,
            'color' => $color,
        ]);
    }
}
