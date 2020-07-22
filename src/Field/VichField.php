<?php

namespace App\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * Class VichField
 */
class VichField implements FieldInterface
{
    use FieldTrait;

    /**
     * @param string      $propertyName
     * @param string|null $label
     *
     * @return VichField
     */
    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            // this template is used in 'index' and 'detail' pages
            ->setTemplatePath('admin/field/image.html.twig')
            // this is used in 'edit' and 'new' pages to edit the field contents
            // you can use your own form types too
            ->setFormType(VichImageType::class)
            ;
    }
}
