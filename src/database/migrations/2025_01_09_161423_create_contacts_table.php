<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignID('category_id')->constrained()->cascadeOnDelete();
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->tinyInteger('gender');
            $table->string('email',255);
            $table->string('tel', 5);
            $table->string('address',255);
            $table->string('building',255)->nullable();
            $table->text('detail',120);
            $table->timestamp('created_at')->useCurrent()->nullable();$table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
