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

class ForeignKeys extends Migration
{

    public function down()
    {
        Schema::table('vdomah_telegram_callback_query', function($table)
        {
            $table->dropForeign('vdomah_telegram_callback_query_user_id_foreign');
            $table->dropForeign('vdomah_telegram_callback_query_chat_id_foreign');
        });
        Schema::table('vdomah_telegram_chosen_inline_result', function($table)
        {
            $table->dropForeign('vdomah_telegram_chosen_inline_result_user_id_foreign');
        });
        Schema::table('vdomah_telegram_conversation', function($table)
        {
            $table->dropForeign('vdomah_telegram_conversation_user_id_foreign');
            $table->dropForeign('vdomah_telegram_conversation_chat_id_foreign');
        });
//        Schema::table('vdomah_telegram_edited_message', function($table)
//        {
//            $table->dropForeign('vdomah_telegram_edited_message_user_id_foreign');
//            $table->dropForeign('vdomah_telegram_edited_message_chat_id_foreign');
//            $table->dropForeign('vdomah_telegram_edited_message_chat_id_foreign');
//        });

        Schema::table('vdomah_telegram_user_chat', function($table)
        {
            $table->dropForeign('vdomah_telegram_user_chat_chat_id_foreign');
            $table->dropForeign('vdomah_telegram_user_chat_user_id_foreign');
        });
    }

    public function up()
    {
        Schema::table('vdomah_telegram_callback_query', function($table)
        {
            $table->foreign('chat_id')
                ->references('id')
                ->on('vdomah_telegram_chat');

            $table->foreign('user_id')
                ->references('id')
                ->on('vdomah_telegram_user');
        });
        Schema::table('vdomah_telegram_chosen_inline_result', function($table)
        {
            $table->foreign('user_id')
                ->references('id')
                ->on('vdomah_telegram_user');
        });
        Schema::table('vdomah_telegram_conversation', function($table)
        {
            $table->foreign('user_id')
                ->references('id')
                ->on('vdomah_telegram_user');

            $table->foreign('chat_id')
                ->references('id')
                ->on('vdomah_telegram_chat');
        });
        Schema::table('vdomah_telegram_edited_message', function($table)
        {
//            $table->foreign('user_id')
//                ->references('id')
//                ->on('vdomah_telegram_user');
//
//            $table->foreign('chat_id')
//                ->references('id')
//                ->on('vdomah_telegram_chat');
//
//            $table->foreign(['chat_id', 'message_id'])
//                ->references(['chat_id', 'id'])
//                ->on('vdomah_telegram_message');
        });
        Schema::table('vdomah_telegram_user_chat', function($table)
        {
            $table->foreign('user_id')
                ->references('id')
                ->on('vdomah_telegram_user')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('chat_id')
                ->references('id')
                ->on('vdomah_telegram_chat')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

}
