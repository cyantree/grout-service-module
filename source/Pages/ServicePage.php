<?php
namespace Grout\Cyantree\ServiceModule\Pages;

use Cyantree\Grout\App\Page;
use Cyantree\Grout\App\Service\Drivers\JsonDriver;
use Cyantree\Grout\App\Service\ServiceDriver;
use Grout\Cyantree\ServiceModule\ServiceFactory;

class ServicePage extends Page
{
    /** @var ServiceDriver */
    private $driver;

    public function parseTask()
    {
        $this->driver = new JsonDriver();
        $this->driver->commandNamespaces = ServiceFactory::get($this->app, $this->task->module->id)->config()->commandNamespaces;

        $this->driver->processTask($this->task);
    }

    public function parseError($code, $data = null)
    {
        if ($this->driver) {
            $this->driver->processError($this->task);
        } else {
            parent::parseError($code, $data);
        }
    }
}
