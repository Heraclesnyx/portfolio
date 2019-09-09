<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\EmailType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


   
    // public function contactAction(Request $request)
    // {
    //     # body...
    //     $contact = new Contact();

    //     $form = $this->createFormBuilder($contact)
    //         ->add('lastName', TextType::class)
    //         ->add('firstName', TextType::class)
    //         ->add('mail', EmailType::class)
    //         ->add('content', TextType::class, ['label' => 'Votre commentaire'])
    //         ->add('submit', SubmitType::class)
    //         ->getForm();

    //     $form->handleRequest($request);

    //     if($form->isValid() && $form->isSubmitted()){
    //         $contact = $form->getData();

    //         return $this->redirectToRoute('message_succes');
    //     }

    //     // return $this->render('base.html.twig', [
    //     //     'form' => $form->createView(),
    //     // ]);

    // }

    public function mailAction($name, \Swift_Mailer $mailer){

        try{    
            $message = (new \Swift_Message('Hello Email'))
            ->setFrom('name@example.com')
            ->setTo('recipient@example.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    ['name' => $name]
                )
               
            )

        // you can remove the following code if you don't define a text version for your emails
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    ['name' => $name]
                ),
                'text/plain'
            );

            $mailer->send($message);

    // or, you can also fetch the mailer service this way
            $this->get('mailer')->send($message);

        // return $this->render('base.html.twig');
        }catch(Exception $e){
            dump('lol');
            die();
        }
    }
}
