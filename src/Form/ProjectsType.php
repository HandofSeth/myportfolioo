<?php

namespace App\Form;

use App\Entity\Projects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('page_path', TextType::class, ['label' => 'Adresse du site Web'])
            ->add('git_path', TextType::class, ['label' => 'Adresse du projet sur github'])
            ->add('description', TextType::class, ['label' => 'Description'])
            ->add('photo_path', FileType::class, [
                'data_class' => null,
                'required' => is_null($builder->getData()->getId()),
                'label' => 'Image',
            ])->add('submit', SubmitType::class, [
                'label' => 'Sauvegarder'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
