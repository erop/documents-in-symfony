<?php
declare(strict_types=1);

namespace App\DocumentType;

use App\Annotation\DocumentField;

final class DrivingLicense implements IDocument
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
     * @DocumentField(label="Birth place")
     */
    public string $birthPlace;

    /**
     * @DocumentField(label="Categories", htmlInputType="select", values={"A", "B", "C", "D", "E"})
     */
    public array $categories;

    public function getDiscriminator(): string
    {
        return 'driving_license';
    }

    public function getName(): string
    {
        return 'Driving license';
    }
}