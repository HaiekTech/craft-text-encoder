<?php
/**
 * Craft Text Encoder plugin for Craft CMS 3.x
 *
 * Encodes email addresses separately or inside text fields
 *
 * @link      https://github.com/HaiekTech
 * @copyright Copyright (c) 2018 HAIEK
 */

namespace haiek\crafttextencoder;

use haiek\crafttextencoder\twigextensions\CraftTextEncoderTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class CraftTextEncoder
 *
 * @author    HAIEK
 * @package   CraftTextEncoder
 * @since     0.0.1
 *
 */
class CraftTextEncoder extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var CraftTextEncoder
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '0.0.1';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new CraftTextEncoderTwigExtension());

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'craft-text-encoder',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
