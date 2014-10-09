<?php
namespace Grout\Cyantree\ServiceModule;

use Cyantree\Grout\App\App;
use Cyantree\Grout\App\GroutFactory;
use Grout\AppModule\AppFactory;
use Grout\Cyantree\ServiceModule\Types\ServiceConfig;

class ServiceFactory extends AppFactory
{
    /** @var ServiceModule */
    public $module;

    /** @return ServiceFactory */
    public static function get(App $app = null, $moduleId = null)
    {
        /** @var ServiceFactory $factory */
        $factory = GroutFactory::getFactory($app, __CLASS__, $moduleId, 'Cyantree\ServiceModule');

        return $factory;
    }


    public function config()
    {
        if (!($tool = $this->getTool(__FUNCTION__, false))) {
            /** @var ServiceConfig $tool */
            $tool = $this->app->configs->getConfig($this->module->id);

            $this->setTool(__FUNCTION__, $tool);
        }

        return $tool;
    }
}
