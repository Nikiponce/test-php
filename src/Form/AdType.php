<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            // ->add('status', ChoiceType::class, [
            //     'label' => 'statusss',
            //     'required' =>false,
            //     'choices' => [
            //         // 'published' => false,
            //         'stopped' => true,
            //         // 'publishing' => false
            //     ],
            //     // 'attr' => [
            //     //     'class' => 'btn btn-primary'
            //     // ]
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
