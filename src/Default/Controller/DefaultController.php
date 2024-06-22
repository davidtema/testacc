<?php

declare(strict_types=1);

namespace App\Default\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function default(): Response
    {
        return $this->render('default.html.twig');
    }
}
