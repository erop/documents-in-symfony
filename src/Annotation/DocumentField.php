<?php

namespace App\Annotation;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
class DocumentField
{
    /**
     * @Annotation\Required()
     */
    public string $label;

    /**
     * @Annotation\Required()
     * @Annotation\Enum({"text", "textarea", "date", "select", "datetime-local", "email", "tel"})
     */
    public string $htmlInputType = "text";

    public string $defaultValue;

    public string $mask;

    public bool $required = true;

    public array $values;

    public bool $multiple = false;
}

