<?php

declare(strict_types=1);

namespace App\Client\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UpdateClientController
{
    #[Route('client/update/{id}', name: 'client.update')]
    public function default(int $id): Response
    {
        return new Response(
            '<html><body>Update client ' . $id . '</body></html>'
        );
    }
}
