<?php
declare(strict_types=1);

namespace App\DocumentType;

use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

/**
 * @DiscriminatorMap(typeProperty="type", mapping={
 *     "passport"="\App\DocumentType\Passport",
 *     "driving_license"="\App\DocumentType\DrivingLicense"
 * })
 */
interface IDocument
{
    public function getType(): string;

    public function getName(): string;
}