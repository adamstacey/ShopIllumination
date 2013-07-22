<?php
namespace KAC\UserBundle\Validator;

use Symfony\Component\Validator\Constraint;

/** @Annotation */
class UniqueProductCode extends Constraint
{
    public $message = 'The product code is already used.';

    public function validatedBy()
    {
        return 'unique_product_code';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}