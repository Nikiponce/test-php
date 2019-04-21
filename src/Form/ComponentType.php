<?php

namespace App\Form;

use App\Entity\Component;
use App\Entity\Type;
use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ComponentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Nombre'
            ])
            ->add('type', EntityType::class,[
                'class' => Type::class,
                'label' => 'Tipo'
            ])
            ->add('link', TextType::class)
            ->add('format', ChoiceType::class)
            ->add('size', NumberType::class)
            ->add('text', TextType::class,[
                'attr' => ['class' => 'cont-chars'],
            ])
            
            ->add('x_axis', NumberType::class)
            ->add('y_axis', NumberType::class)
            ->add('z_axis', NumberType::class)
            ->add('width', NumberType::class)
            ->add('height', NumberType::class)
            ->add('ad', EntityType::class,[
                'class' => Ad::class,
                'label' => 'Ad'
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $component = $event->getData();
            $form = $event->getForm();
            if ($component->getType() == 'Imagen'){
                $form->add('format', ChoiceType::class,[
                    'choices' => ['PNG' => 'PNG', 'JPG' => 'JPG']
                ]);
            } elseif ($component->getType() == 'Video') {
                $form->add('format', ChoiceType::class,[
                    'choices' => ['MP4' => 'MP4', 'WEBM' => 'WEBM']
                ]);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Component::class,
        ]);
    }
}
