<?php

namespace App\Form;

use App\Entity\About;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AboutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rotate', TextType::class, ['label' => 'Faire pivoter lélément'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('name', TextType::class, ['label' => 'Prénom et nom'])
            ->add('birth', BirthdayType::class, ['format' => 'dd-MM-yyyy', 'label' => 'Date de naissance'])
            ->add('address', TextType::class, ['label' => 'Adresse'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('phone', TelType::class, ['label' => 'Numeros de téléphone'])
            ->add('projects', NumberType::class, ['label' => 'De nombreux projets'])
            ->add('fileNamePhoto', FileType::class, [
                'data_class' => null,
                'required' => is_null($builder->getData()->getId()),
                'multiple' => false,
                'label' => 'Photo principale'
            ])
            ->add('fileNameCv', FileType::class, [
                'data_class' => null,
                'required' => is_null($builder->getData()->getId()),
                'multiple' => false,
                'label' => 'CV'
            ])->add('submit', SubmitType::class, [
                'label' => 'Sauvegarder'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => About::class,
        ]);
    }
}
