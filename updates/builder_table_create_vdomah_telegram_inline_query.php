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

class BuilderTableCreateVdomahTelegramInlineQuery extends Migration
{
    public function up()
    {
        Schema::create('vdomah_telegram_inline_query', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('location', 255)->nullable()->default(null);
            $table->text('query')->nullable();
            $table->string('offset', 255)->nullable()->default(null);
            $table->timestamp('created_at')->nullable()->default(null);

            $table->index(['user_id'], 'user_id');

//            $table->foreign('user_id')
//                ->references('id')
//                ->on('vdomah_telegram_user');
        });
    }

    public function down()
    {
        Schema::drop('vdomah_telegram_inline_query');
    }

}
