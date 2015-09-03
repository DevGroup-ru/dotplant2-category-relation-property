<?php

namespace DotPlant\CategoryRelationProperty;

use app\components\ExtensionModule;

class Module extends ExtensionModule
{
    public static $moduleId = 'CategoryRelationProperty';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'configurableModule' => [
                'class' => 'app\modules\config\behaviors\ConfigurableModuleBehavior',
                'configurationView' => '@CategoryRelationProperty/views/configurable/_config',
                'configurableModel' => 'DotPlant\CategoryRelationProperty\components\ConfigurationModel',
            ]
        ];
    }
}
