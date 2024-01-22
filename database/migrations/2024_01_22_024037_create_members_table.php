<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("first_name")->nullable();
            $table->string("middle_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("id_number")->nullable();
            $table->string("dob")->nullable();
            $table->enum("gender",['Male','Female'])->nullable();
            $table->enum("marital_status",['Single','Married','Divorced'])->default('Single');
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
