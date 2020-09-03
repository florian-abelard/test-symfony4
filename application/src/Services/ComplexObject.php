<?php

namespace App\Services;

class ComplexObject
{
    private $developerName;
 
    public function __construct($developerName) {
        $this->developerName = $developerName;
    }

    public function doSomething()
    {
        echo '<pre>',print_r('doSomething', true),'</pre>';
    }

    public function createdBy()
    {
        echo '<pre>', print_r('Application created by ' . $this->developerName, true), '</pre>';
    }
}
