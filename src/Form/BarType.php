<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Bar;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class BarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new Image()
                ]])
            ->add('description')
            ->add('email')
            ->add('phone')
            ->add('adress')
            ->add('artists', EntityType::class, [
                'class' => Artist::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bar::class,
        ]);
    }
}
