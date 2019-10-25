<?php

namespace Hunter\http_foundation\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class HttpFoundationServiceProvider extends AbstractServiceProvider {

    /**
     * @var array
     */
    protected $provides = ['Symfony\Component\HttpFoundation\Request', 'Symfony\Component\HttpFoundation\Response'];
    /**
     * @{inheritDoc}
     */
    public function register()
    {
        $this->getContainer()->add('Symfony\Component\HttpFoundation\Response', 'Symfony\Component\HttpFoundation\Response');

        $this->getContainer()->share('Symfony\Component\HttpFoundation\Request', function () {
            if (isset($GLOBALS['root_dir']) && $GLOBALS['root_dir'] != '/' && !is_cli()) {
                $_SERVER['REQUEST_URI'] = str_replace($GLOBALS['root_dir'], '', $_SERVER['REQUEST_URI']);
            }
            return Request::createFromGlobals();
        });
    }

}
