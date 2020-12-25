<?php
namespace ZT\BlogThemeTypeagle\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddTypeagleThemeSetting implements DataPatchInterface
{
    const THEME_NAME = 'Typeagle Theme';

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $data = [
            'name' => self::THEME_NAME,
            'identifier' => 'typeagle'
        ]
        ;

        $this->moduleDataSetup->getConnection()->insertForce(
            $this->moduleDataSetup->getTable(
                'ztpwa_blog_theme_settings'
            ),
            $data
        );
    }

    public function getAliases()
    {
        return [];
    }

    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '1.0.0';
    }
}
