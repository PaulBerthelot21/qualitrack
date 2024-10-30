<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class UserAdmin extends AbstractAdmin
{
    protected array $roles = [
        'Super administrateur' => 'ROLE_SUPER_ADMIN',
        'Réseau CE' => 'ROLE_USER',
        'Projet' => 'ROLE_PROJET',
    ];

    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('login', TextType::class);
        $form->add('firstName', TextType::class);
        $form->add('lastName', TextType::class);
        $form->add('email', TextType::class);
        $form->add('roles', ChoiceType::class, [
            'choices' => $this->roles,
            'multiple' => true
        ], [
            'role' => 'ROLE_SUPER_ADMIN'
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter->add('login', null, ['show_filter' => true]);
        $filter->add('firstName');
        $filter->add('lastName');
        $filter->add('email');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('login', null, ['route' => ['name' => 'edit']]);
        $list->add('firstName');
        $list->add('lastName');
        $list->add('email');
        $list->add('_action', 'actions', [
            'actions' => [
                'show' => [],
                'edit' => [],
                'delete' => [],
            ]
        ]);
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('id');
        $show->add('login');
        $show->add('firstName');
        $show->add('lastName');
        $show->add('email');
        $show->add('roles');
    }
}
