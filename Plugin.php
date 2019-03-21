<?php namespace Vdomah\Telegram;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */

use System\Classes\PluginBase;
use Vdomah\Telegram\Classes\RegisterWidgets;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'vdomah.telegram::lang.settings.page_name',
                'description' => 'vdomah.telegram::lang.settings.page_desc',
                'category'    => 'vdomah.telegram::lang.plugin.name',
                'icon'        => 'icon-paper-plane',
                'class'       => 'Vdomah\Telegram\Models\TelegramInfoSettings',
                'order'       => 500,
                'keywords'    => 'telegram bot',
                'permissions' => ['vdomah.telegram.settings']
            ]
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Vdomah\Telegram\FormWidgets\TelegramChat' => [
                'label' => 'Telegram Chat',
                'code'  => 'telechat',
                'alias'  => 'telechat',
            ],
            'Vdomah\Telegram\FormWidgets\CheckWebhook' => [
                'label' => 'Telegram check webhook button',
                'code'  => 'checkwebhook',
                'alias'  => 'checkwebhook',
            ],
        ];
    }

    public function boot() {
        \Event::listen('pages.builder.registerControls', function($controlLibrary) {
            new RegisterWidgets($controlLibrary);
        });
    }
}
