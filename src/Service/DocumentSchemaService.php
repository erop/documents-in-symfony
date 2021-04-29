<?php
declare(strict_types=1);

namespace App\Service;

use App\Annotation\DocumentField;
use App\DocumentType\IDocument;
use Doctrine\Common\Annotations\AnnotationReader;

final class DocumentSchemaService
{
    private iterable $documentTypes;

    public function __construct(iterable $documentTypes)
    {
        $this->documentTypes = $documentTypes;
    }

    public function __invoke(): array
    {
        $schemas = [];
        /** @var IDocument $documentType */
        foreach ($this->documentTypes as $documentType) {
            $schema = [];
            $fields = [];
            $reader = new AnnotationReader();
            foreach ((new \ReflectionClass($documentType))->getProperties() as $property) {
                $annotation = $reader->getPropertyAnnotation(
                    $property,
                    DocumentField::class
                );
                $fields[$property->getName()] = $annotation;
            }
            $schema['name'] = $documentType->getName();
            $schema['type'] = $documentType->getType();
            $schema['fields'] = $fields;
            $schemas[] = $schema;
        }

        return $schemas;
    }
}