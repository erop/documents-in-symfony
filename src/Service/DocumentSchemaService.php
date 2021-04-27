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
        $result = [];
        /** @var IDocument $documentType */
        foreach ($this->documentTypes as $documentType) {
            $docDefs = [];
            $fieldDefs = [];
            $reader = new AnnotationReader();
            $class = new \ReflectionClass($documentType);
            $properties = $class->getProperties();
            foreach ($properties as $property) {
                $annotation = $reader->getPropertyAnnotation(
                    $property,
                    DocumentField::class
                );
                $fieldDefs[$property->getName()] = $annotation;
            }
            $docDefs['name'] = $documentType->getName();
            $docDefs['type'] = $documentType->getType();
            $docDefs['fields'] = $fieldDefs;
            $result[] = $docDefs;
        }

        return $result;
    }

}