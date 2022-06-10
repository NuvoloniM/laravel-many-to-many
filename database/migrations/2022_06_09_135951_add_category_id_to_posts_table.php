<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // aggiungo alla tabella post la colonna inerente all'id delle categorie
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            // relizzo la relazione
            // identifico e creo la foreign key
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //all'eliminazione cancello la chiave ed elimino la colonna 
            $table->dropForeign('posts_category_id_foreign');

            $table->dropColumn('category_id');
        });
    }
}
