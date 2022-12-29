<?php

namespace App\Controller\Admin;

use App\Entity\MenustatFood;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MenustatFoodCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenustatFood::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
