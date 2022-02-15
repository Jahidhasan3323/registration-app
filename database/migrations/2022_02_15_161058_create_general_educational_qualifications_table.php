<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralEducationalQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_educational_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('result');
            $table->foreignId('board_id')->index()->comment("board id")->nullable()->constrained('boards')->onDelete('cascade');
            $table->foreignId('institute_id')->index()->comment("institute id")->nullable()->constrained('institutes')->onDelete('cascade');
            $table->foreignId('exam_id')->index()->comment("exam id")->nullable()->constrained('exams')->onDelete('cascade');
            $table->foreignId('user_id')->index()->comment("user id")->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('general_educational_qualifications');
    }
}
