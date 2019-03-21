<?php namespace Vdomah\Telegram\Controllers;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */
 
use Backend\Classes\Controller;
use BackendMenu;

class Messages extends Controller
{
    public $implement = ['Backend\Behaviors\ListController'];
	public $requiredPermissions = ['vdomah.telegram.show.messages'];
    
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Vdomah.Telegram', 'main-menu-item', 'side-menu-item2');
    }
}