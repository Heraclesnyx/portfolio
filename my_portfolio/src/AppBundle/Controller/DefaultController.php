<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends BaseController
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


    /**
     * @Route("/contact", name="contact")
     */

    public function contactAction(Request $request)
    {
        $mailer = $this->sc->getMailer();
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            # try-catch pour l'envoi du mail.
            try{

            $mailer = $this->sc->getMailer(); //Va chercher la méthode dans le ServiceCOntainer
            $mailer->setTo('anthony12041989@gmailcom');
            $mailer->setSubject('Message venant de votre application');
            $mailer->setBody(
                $this->sc->getTemplating('twig')->render('Emails/registration.html.twig', [
                        'data' => $contact
                    ])
            );    
            
            $mailer->send();

            return $this->redirectToRoute('homepage');
            }catch(Exception $e){
                 dump($e->getMessage());
                 die();
            }
        }

        return $this->render('default/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
