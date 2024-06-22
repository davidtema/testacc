<?php

declare(strict_types=1);

namespace App\Client\Controller;

use App\Client\Command\Update\UpdateClientCommand;
use App\Client\Fetcher\ClientFetcher;
use App\Client\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class UpdateClientController extends AbstractController
{
    public function __construct(private ClientFetcher $clientFetcher)
    {
    }

    #[Route('client/update/{id}', name: 'client.update')]
    public function default(int $id, Request $request, MessageBusInterface $bus): Response
    {
        $client = $this->clientFetcher->findOneById($id)
            ?? throw $this->createNotFoundException();

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bus->dispatch(new UpdateClientCommand($client));
            $this->addFlash('success', 'Сохранено');

            return $this->redirectToRoute('client.default');
        }

        return $this->render('client/form.html.twig', [
            'title' => 'Изменение клиента',
            'form' => $form->createView(),
        ]);
    }
}
