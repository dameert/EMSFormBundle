<?php

declare(strict_types=1);

namespace EMS\FormBundle\Tests\Components\Constraint;

use EMS\FormBundle\Components\Constraint\IsBelgiumPhoneNumber;
use EMS\FormBundle\Components\Constraint\IsBelgiumPhoneNumberValidator;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

class IsBelgiumPhoneNumberValidatorTest extends ConstraintValidatorTestCase
{
    protected function createValidator()
    {
        return new IsBelgiumPhoneNumberValidator();
    }

    public function testInvalidPhoneNumber()
    {
        $this->validator->validate('+123456789', new IsBelgiumPhoneNumber());
        $this->buildViolation('The phone number "+123456789" has an invalid format.');
    }

    public function testValidPhoneNumber()
    {
        $this->validator->validate('+32470123456', new IsBelgiumPhoneNumber());
        $this->assertNoViolation();
    }
}
