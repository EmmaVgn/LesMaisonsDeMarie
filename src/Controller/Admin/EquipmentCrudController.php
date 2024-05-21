<?php

namespace App\Controller\Admin;

use App\Entity\Equipment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipment::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Equipements')
            ->setPageTitle('new', 'Ajouter un Equipement')
            ->setDefaultSort(['id' => 'ASC'])
            ->setPaginatorPageSize(10)
            ->setEntityLabelInSingular('un Equipement');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('name', 'Nom de l\'équipement')
            ->setFormTypeOptions(['attr' => ['placeholder' => 'Ex: climatisation']]),
            TextField::new('slug', 'Slug')->onlyOnIndex(),
            TextField::new('imageFile', 'Fichier image :')
            ->setFormType(VichImageType::class)
            -> setTranslationParameters([ 'form.label.delete' => 'Supprimer l\'image' ])
            ->hideOnIndex(),
            ImageField::new('imageName', 'Logo')
            ->setBasePath('/images/colors')
            ->onlyOnIndex(),
        ];
    }
}
