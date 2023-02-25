<?php

namespace YesCorpo\Bundle\SampleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sample', name: 'sample_')]
class SampleController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SampleController.php',
        ]);
    }
}