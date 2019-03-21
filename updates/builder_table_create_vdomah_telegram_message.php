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

class BuilderTableCreateVdomahTelegramMessage extends Migration
{

    public function down()
    {
        Schema::drop('vdomah_telegram_message');
    }

    public function up()
    {
        Schema::create('vdomah_telegram_message', function($table)
        {
            $table->bigInteger('chat_id');
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('forward_from')->nullable();
            $table->bigInteger('forward_from_chat')->nullable();
            $table->bigInteger('reply_to_chat')->nullable();
            $table->bigInteger('reply_to_message')->unsigned()->nullable();
            $table->bigInteger('new_chat_member')->nullable();
            $table->bigInteger('left_chat_member')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('forward_date')->nullable();
            $table->text('text')->nullable();
            $table->text('entities')->nullable();
            $table->text('audio')->nullable();
            $table->text('document')->nullable();
            $table->text('photo')->nullable();
            $table->text('sticker')->nullable();
            $table->text('video')->nullable();
            $table->text('voice')->nullable();
            $table->text('contact')->nullable();
            $table->text('location')->nullable();
            $table->text('venue')->nullable();
            $table->text('caption')->nullable();
            $table->string('new_chat_title', 255)->nullable();
            $table->text('new_chat_photo')->nullable();
            $table->boolean('delete_chat_photo')->default(0);
            $table->boolean('group_chat_created')->default(0);
            $table->boolean('supergroup_chat_created')->default(0);
            $table->boolean('channel_chat_created')->default(0);
            $table->bigInteger('migrate_to_chat_id')->nullable();
            $table->bigInteger('migrate_from_chat_id')->nullable();
            $table->text('pinned_message')->nullable();

            $table->primary(['chat_id', 'id']);
            $table->index(['user_id'], 'user_id');
            $table->index(['forward_from'], 'forward_from');
            $table->index(['forward_from_chat'], 'forward_from_chat');
            $table->index(['reply_to_chat'], 'reply_to_chat');
            $table->index(['reply_to_message'], 'reply_to_message');
            $table->index(['new_chat_member'], 'new_chat_member');
            $table->index(['left_chat_member'], 'left_chat_member');
            $table->index(['migrate_from_chat_id'], 'migrate_from_chat_id');
            $table->index(['migrate_to_chat_id'], 'migrate_to_chat_id');

//            $table->foreign('user_id')
//                ->references('id')
//                ->on('vdomah_telegram_user');
//
//            $table->foreign('chat_id')
//                ->references('id')
//                ->on('vdomah_telegram_chat');
//
//            $table->foreign('forward_from')
//                ->references('id')
//                ->on('vdomah_telegram_user');
//
//            $table->foreign('forward_from_chat')
//                ->references('id')
//                ->on('vdomah_telegram_chat');
//
//            $table->foreign(['reply_to_chat', 'reply_to_message'])
//                ->references(['chat_id', 'id'])
//                ->on('vdomah_telegram_message');
//
//            // $table->foreign('forward_from')
//            //     ->references('id')
//            //     ->on('vdomah_telegram_user');
//
//            $table->foreign('new_chat_member')
//                ->references('id')
//                ->on('vdomah_telegram_user');
//
//            $table->foreign('left_chat_member')
//                ->references('id')
//                ->on('vdomah_telegram_user');
        });
    }
}
