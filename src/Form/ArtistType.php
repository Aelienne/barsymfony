<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\ArtisteCategory;
use App\Entity\Bar;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nickname')
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new Image()
            ]])
            ->add('description')
            ->add('firstName')
            ->add('lastName')
            ->add('phone')
            ->add('email')
            ->add('artistCategory', EntityType::class, [
                'class' => ArtisteCategory::class,
                'choice_label' => 'id',
            ])
            ->add('bar', EntityType::class, [
                'class' => Bar::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
