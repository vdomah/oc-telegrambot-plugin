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

class BuilderTableCreateVdomahTelegramConversation extends Migration
{
    public function up()
    {
        Schema::create('vdomah_telegram_conversation', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->nullable()->default(null);
            $table->bigInteger('chat_id')->nullable()->default(null);
            $table->enum('status', ['active', 'cancelled', 'stopped'])->default('active');
            $table->string('command', 160)->default('');
            $table->string('notes', 1000)->default('NULL');
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);

            $table->index(['user_id'], 'user_id');
            $table->index(['chat_id'], 'chat_id');
            $table->index(['status'], 'status');
        });
    }

    public function down()
    {
        Schema::drop('vdomah_telegram_conversation');
    }

}
