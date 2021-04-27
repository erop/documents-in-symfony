<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\DocumentSchemaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class DocumentSchemaController extends AbstractController
{
    private DocumentSchemaService $service;

    public function __construct(DocumentSchemaService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/document-schemas", name="app_document_schemas", methods={"GET"})
     */
    public function getDocumentSchemas(): JsonResponse
    {
        $schemas = ($this->service)();
        return new JsonResponse($schemas);
    }
}