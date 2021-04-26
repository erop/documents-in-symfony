<?php
declare(strict_types=1);

namespace App\DocumentType;

final class DrivingLicense implements IDocument
{
    public string $firstName;
    public string $lastName;
    public string $birthPlace;
    public array $categories;
}