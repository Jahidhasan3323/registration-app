<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('address');
            $table->text('photo');
            $table->text('cv');
            $table->foreignId('division_id')->index()->comment("division id")->nullable()->constrained('divisions')->onDelete('cascade');
            $table->foreignId('district_id')->index()->comment("district id")->nullable()->constrained('districts')->onDelete('cascade');
            $table->foreignId('upazila_id')->index()->comment("upazila id")->nullable()->constrained('upazilas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_users');
    }
}
