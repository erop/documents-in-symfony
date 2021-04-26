<?php
declare(strict_types=1);

namespace App\DocumentType;

use App\Annotation\DocumentField;

final class Passport implements IDocument
{
    /**
     * @DocumentField(label="First name")
     */
    public string $firstName;

    /**
     * @DocumentField(label="Last name")
     */
    public string $lastName;

    /**
     * @DocumentField(label="Citizenship")
     */
    public string $citizenship;

    /**
     * @DocumentField(label="Series")
     */
    public string $series;

    /**
     * @DocumentField(label="Number")
     */
    public string $number;

    public function getDiscriminator(): string
    {
        return 'passport';
    }

    public function getName(): string
    {
        return 'Passport';
    }
}