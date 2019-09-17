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
            ->add('lastName', Type\TextType::class,[
                'attr'=>array('placeholder' => 'Nom','class'=>'form-control'),
                
            ])
            ->add('firstName', Type\TextType::class,[
                'attr'=>array('placeholder' => 'Prénom','class'=>'form-control'),
            ])
            ->add('mail', Type\EmailType::class,[
                'attr'=>array('placeholder' => 'Email','class'=>'form-control'),
            ])
            ->add('content', Type\TextType::class,[
                'attr'=>array('placeholder' => 'Ajouter votre commentaire','class'=>'form-control'),
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class' => Contact::class
       ]);
    }
}