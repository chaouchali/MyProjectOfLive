<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Ali Chaouch*']] , ['required'=>true])
            ->add('email',EmailType::class, ['attr' => ['placeholder' => 'exemple@exemple.com*']] , ['required'=>true])
            ->add('phone',TextType::class, ['attr' => ['placeholder' => '99 999 999*']] , ['required'=>true])
            ->add('subject',TextType::class, ['attr' => ['placeholder' => 'Sujet*']] , ['required'=>true])
            ->add('message',TextareaType::class, ['attr' => ['placeholder' => 'Votre Message de contact...']] , ['required'=>true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}