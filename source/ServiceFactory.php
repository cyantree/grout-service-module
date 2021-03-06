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
        $factory = GroutFactory::_getInstance($app, __CLASS__, $moduleId, 'Cyantree\ServiceModule');

        return $factory;
    }


    public function appConfig()
    {
        if($tool = $this->_getAppTool(__FUNCTION__, __CLASS__)){
            return $tool;
        }

        /** @var ServiceConfig $tool */
        $tool = $this->app->configs->getConfig($this->module->id);

        $this->_setAppTool(__FUNCTION__, $tool);
        return $tool;
    }
}