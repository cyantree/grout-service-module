<?php
namespace Grout\Cyantree\ServiceModule;

use Cyantree\Grout\App\Module;
use Grout\Cyantree\ServiceModule\Types\ServiceConfig;

class ServiceModule extends Module
{
    public function init()
    {
        $this->app->configs->setDefaultConfig($this->id, new ServiceConfig());

        $this->addNamedRoute('service', '', 'Pages\ServicePage');
    }
}