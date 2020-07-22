<?php

namespace App\Controller\Admin;

use App\Entity\Community;
use App\Field\VichField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class CommunityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Community::class;
    }

    /**
     * @param Crud $crud
     *
     * @return Crud
     */
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Community')
            ->setEntityLabelInPlural('Communities')
            ->setSearchFields(['category', 'description']);
    }

    /**
     * @param string $pageName
     *
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        $id = IntegerField::new('id', 'ID')->hideOnForm();
        $description = TextEditorField::new('description');
        $subscribers = IntegerField::new('subscribers');
        $cost = NumberField::new('cost')->setNumDecimals(2);
        $active = BooleanField::new('active');
        $name = TextField::new('name');
        $url = UrlField::new('url');
        $image = VichField::new('imageFile');
        $category = AssociationField::new('category');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $category, $description, $subscribers, $cost, $active];
        }

        return [
            FormField::addPanel('Basic information'),
            $category,
            $description,
            $subscribers,
            $cost,
            $active,
            FormField::addPanel('Group'),
            $name,
            $url,
            $image,
        ];
    }
}
