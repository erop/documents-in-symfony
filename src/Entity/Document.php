<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\DocumentType\IDocument;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 * @ApiResource()
 */
final class Document
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true})
     */
    private IDocument $payload;

    public function __construct(IDocument $payload)
    {
        $this->payload = $payload;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPayload(): IDocument
    {
        return $this->payload;
    }
}