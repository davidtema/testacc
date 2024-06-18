<?php

declare(strict_types=1);

namespace App\Client\Controller;

use App\Client\Entity\Client;
use App\Client\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    public function __construct(private readonly ClientRepository $clientRepository)
    {
    }

    #[Route('client', name: 'client.default')]
    public function default(): Response
    {
        /**@var Client[] $clients */
        $clients = $this->clientRepository->findAll();
        return $this->render('client/default.html.twig', [
            'clients' => $clients,
        ]);
    }
}
