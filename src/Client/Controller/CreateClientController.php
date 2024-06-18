<?php

declare(strict_types=1);

namespace App\Client\Controller;

use App\Client\Command\Create\CreateClientCommand;
use App\Client\Entity\Client;
use App\Client\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class CreateClientController extends AbstractController
{
    /**
     * @throws ExceptionInterface
     */
    #[Route('client/create', name: 'client.create')]
    public function default(Request $request, MessageBusInterface $bus): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bus->dispatch(new CreateClientCommand($client));
            $this->addFlash('success', 'Сохранено');
            return $this->redirectToRoute('client.default');
        }

        return $this->render('client/form.html.twig', [
            'title' => 'Создание клиента',
            'form' => $form->createView(),
        ]);
    }
}
