<?php

namespace EMS\FormBundle\Components\Field;

interface FieldInterface
{
    public function getHtmlClass(): string;

    public function getFieldClass(): string;

    public function getOptions(): array;
}
