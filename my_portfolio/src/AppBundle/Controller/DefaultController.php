<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


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

    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            # try-catch pour l'envoi du mail.
            //  try{    
            // $message = (new \Swift_Message('Hello Email'))
            // ->setFrom('name@example.com')
            // ->setTo('recipient@example.com')
            // ->setBody(
            //     $this->renderView(
            //     // app/Resources/views/Emails/registration.html.twig
            //         'Emails/registration.html.twig',
            //         ['name' => $name]
            //     ),
            //     'text/html'
            // );

        // you can remove the following code if you don't define a text version for your emails
            // ->addPart(
            //     $this->renderView(
            //         'Emails/registration.txt.twig',
            //         ['name' => $name]
            //     ),
            //     'text/plain'
            // );

            // $mailer->send($message);

    // or, you can also fetch the mailer service this way
        //     $this->get('mailer')->send($message);

        // return $this->render('base.html.twig');
        // }catch(Exception $e){
        //     dump('lol');
        //     die();
        // }
        }

        return $this->render('default/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
/*    public function mailAction($name, \Swift_Mailer $mailer){

        try{    
            $message = (new \Swift_Message('Hello Email'))
            ->setFrom('name@example.com')
            ->setTo('recipient@example.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    ['name' => $name]
                ),
                'text/html'
            );

        // you can remove the following code if you don't define a text version for your emails
            // ->addPart(
            //     $this->renderView(
            //         'Emails/registration.txt.twig',
            //         ['name' => $name]
            //     ),
            //     'text/plain'
            // );

            // $mailer->send($message);

    // or, you can also fetch the mailer service this way
            // $this->get('mailer')->send($message);

        return $this->render('base.html.twig');
        }catch(Exception $e){
            dump('lol');
            die();
        }
    }*/
}
