<?php


namespace AppBundle\Form;

use AppBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class,)
            ->add('firstName', TextType::class,)
            ->add('mail', EmailType::class)
            ->add('content', TextType::class, ['label' => 'Votre commentaire']);
        }

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class' => Contact::class
       ]);
    }
}
            

            // $form->getData();

    //         return $this->render('/base.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }