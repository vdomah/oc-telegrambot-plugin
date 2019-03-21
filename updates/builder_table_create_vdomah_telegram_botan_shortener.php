<?php namespace Vdomah\Telegram\Updates;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */
 
use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVdomahTelegramBotanShortener extends Migration
{
    public function down()
    {
        Schema::drop('vdomah_telegram_botan_shortener');
    }

    public function up()
    {
        Schema::create('vdomah_telegram_botan_shortener', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->nullable()->default(null);
            $table->text('url')->nullable();
            $table->string('short_url', 255)->default('');
            $table->timestamp('created_at')->nullable()->default(null);
        });
    }

}
