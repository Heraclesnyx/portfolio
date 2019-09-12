<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 * Description of MailerService
 *
 * @author mgachaoui
 */
class MailerService 
{
    /** @var \Swift_Mailer $spoolMailer */
    private $spoolMailer;
    /** @var \Swift_Mailer $immediatMailer */
    private $immediatMailer;
    /** @var \Swift_Message $message */
    private $message;

    /** Constructor */
    public function __construct(\Swift_Mailer $spool, \Swift_Mailer $immediat, string $from)
    {
        $this->spoolMailer = $spool;
        $this->immediatMailer = $immediat;
        $this->message = \Swift_Message::newInstance()
            ->setContentType("text/plain")
            ->setFrom($from)
        ;
    }

    /** set from */
    public function setFrom($from)
    {
        $this->message->setFrom($from);
    }

    /** set to */
    public function setTo($to)
    {
        if (is_array($to)) {
            foreach ($to as $address) {
                $this->message->addTo($address);
            }
        } else {
            $this->message->setTo($to);
        }
    }
   
    /** set cc */
    public function setCc($cc)
    {
        if (is_array($cc)) {
            foreach ($cc as $address) {
                $this->message->addCc($address);
            }
        } else {
            $this->message->setCc($cc);
        }
    }
    
    /** set reply to */
    public function setReplyTo($to)
    {
        if (is_array($to)) {
            foreach ($to as $address) {
                $this->message->addReplyTo($address);
            }
        } else {
            $this->message->setReplyTo($to);
        }
    }

    /** set subject */
    public function setSubject($subject)
    {
        $this->message->setSubject($subject);
    }

    /** set body */
    public function setBody($body)
    {
        $this->message->setBody($body);
    }

    /** set content type */
    public function setContentType(string $type)
    {
        $this->message->setContentType($type);
    }

    /** add attachment */
    public function addAttachment(string $path, string $filename, array $acceptedFileExt = [])
    {
        if($this->isFileExtAccepted($filename, $acceptedFileExt)) {
            $this->message->attach(\Swift_Attachment::newInstance()->fromPath($path)->setFilename($filename));
            return true;
        }

        return false;

    }

    /** add attachment */
    public function addContentAttachment(string $content, string $filename, string $contentType, array $acceptedFileExt = [])
    {
        if($this->isFileExtAccepted($filename, $acceptedFileExt)) {
            $attachment = new \Swift_Attachment($content, $filename, $contentType);

            $this->message->attach($attachment);
            return true;
        }

        return false;

    }

    /** verify attachment extension */
    public function isFileExtAccepted(string $filename, array $acceptedFileExt)
    {
        if (empty($acceptedFileExt)) {
            return true;
        }

        $explode_file = explode('.', $filename);
        $explode_file = array_reverse($explode_file);
        $fileExt = strtolower($explode_file[0]);

        foreach ($acceptedFileExt as $ext) {
            if ($fileExt == $ext) {
                return true;
              }
        }

        return false;
    }

    /** add message to spool if activated or send it */
    public function spool()
    {   
        $this->spoolMailer->send($this->message);
    }
    
    /** send message */
    public function send()
    {   
        $this->immediatMailer->send($this->message);
    }
}
