<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\DocumentType\Passport;
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
     * @var Passport
     * @ORM\Column(type="json_document", options={"jsonb": true})
     */
    private object $payload;

    public function __construct(object $payload)
    {
        $this->payload = $payload;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPayload(): object
    {
        return $this->payload;
    }
}