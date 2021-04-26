<?php
declare(strict_types=1);

namespace App\DocumentType;

final class Passport implements IDocument
{
    public string $firstName;
    public string $lastName;
    public string $citizenship;
    public string $series;
    public string $number;
}