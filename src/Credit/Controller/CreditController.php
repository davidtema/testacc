<?php

declare(strict_types=1);

namespace App\Credit\Controller;

use App\Application\Application;
use App\Application\Form\ApplicationType;
use App\Application\Status;
use App\Client\Fetcher\ClientFetcher;
use App\Credit\Command\Create\CreateCreditCommand;
use App\Credit\Entity\Credit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class CreditController extends AbstractController
{
    public function __construct(
        private readonly ClientFetcher $clientFetcher,
        private readonly Application $application
    ) {
    }

    /**
     * @throws ExceptionInterface
     */
    #[Route('credit/form/{clientId}/', name: 'credit.form')]
    public function test(int $clientId, Request $request, MessageBusInterface $bus): Response
    {
        $client = $this->clientFetcher->findOneById($clientId) ??
            throw new NotFoundHttpException("Клиент #$clientId не найден.");

        $credit = new Credit();
        $form = $this->createForm(ApplicationType::class, $credit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $decision = $this->application->canClientGetCredit($client);
            if ($form->get('apply')->isClicked()) {
                if (Status::DECLINED !== $decision->getStatus()) {
                    $bus->dispatch(new CreateCreditCommand($credit, $client, $decision));
                    $this->addFlash('success', 'Сохранено');

                    return $this->redirectToRoute('client.default');
                }
            }
        }

        return $this->render('credit/form.html.twig', [
            'form' => $form,
            'client' => $client,
            'result' => $decision ?? null,
        ]);
    }
}
