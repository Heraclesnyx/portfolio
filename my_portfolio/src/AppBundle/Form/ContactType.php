<?php


namespace AppBundle\Form;

use AppBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Création du formulaire
        $builder
            ->add('lastName', Type\TextType::class)
            ->add('firstName', Type\TextType::class)
            ->add('mail', Type\EmailType::class)
            ->add('content', Type\TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class' => Contact::class
       ]);
    }
}