<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre')->setColumns(8),
            AssociationField::new('category', 'Catégorie')->setColumns(8)->autocomplete(),
            TextEditorField::new('description', 'Description')->setColumns(8)->hideOnIndex(),
            DateField::new('publishAt', 'Année de publication'),
            TextField::new('author', 'Auteur')->setColumns(8),
            NumberField::new('nbPage', 'Nombre de page')->setColumns(8),
            TextField::new('image', 'Image')->setColumns(8),
            NumberField::new('nbExemplaire', 'Nombre d\'exemplaire')->setColumns(8),
            BooleanField::new('isActive', 'Activé ?')->setColumns(8)->onlyOnForms(),
            AssociationField::new('user', 'Créer par : ')->setColumns(8)->hideOnIndex()
        ];
    }

}
