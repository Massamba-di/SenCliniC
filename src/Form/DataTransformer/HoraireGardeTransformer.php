<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class HoraireGardeTransformer implements DataTransformerInterface
{
    public function transform($value): string
    {
        if ($value === null) {
            return '';
        }
        return json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function reverseTransform($value): ?array
    {
        if (empty($value)) {
            return null;
        }
        try {
            return json_decode($value, true);
        } catch (\Exception $e) {
            throw new TransformationFailedException('JSON invalide');
        }
    }
}
