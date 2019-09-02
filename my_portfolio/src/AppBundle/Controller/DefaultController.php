<?php

namespace AppBundle\Controller;

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


    /**
    * @Route(
    * "/send-contact", 
    * name="send-contact",
    * methods = {"POST"}
*)
     */
    public function contactAction(Request $request)
    {
        # body...
        $contact = new Contact();

        $form = $this->createFormBuilder($contact)
            ->add('lastName', TextType::class)
            ->add('firstName', TextType::class)
            ->add('mail', EmailType::class)
            ->add('content', TextType::class, ['label' => 'Votre commentaire'])
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted()){
            $contact = $form->getData();

            return $this->redirectToRoute('message_succes');
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
        ]);




    }

    // public function ContactAction(){
        
    //     $contact = new Contact();

    //     if($form -> isValid()){

    //     }

    // }
}
