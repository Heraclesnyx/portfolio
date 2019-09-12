<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Container;
use AppBundle\Context\SecurityContext;
use AppBundle\Container\ServiceContainer;


class BaseController extends Controller
{
    /** @var ManagerContainer $mc */
    // protected $mc;
    /** @var ServiceContainer $sc */
    protected $sc;
    
    /**
     * 
     * @param \AppBundle\Container\ManagerContainer $mc
     * @param \AppBundle\Container\ServiceContainer $sc
     */
    public function __construct(Container\ServiceContainer $sc)
    {
        // $this->mc = $mc;
        $this->sc = $sc;
    }
}