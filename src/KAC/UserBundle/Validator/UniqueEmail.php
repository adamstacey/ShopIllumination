<?php
namespace KAC\UserBundle\Validator;

use Symfony\Component\Validator\Constraint;

/** @Annotation */
class UniqueEmail extends Constraint
{
    public $message = 'The email is already used.';

    public function validatedBy()
    {
        return 'unique_email';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}