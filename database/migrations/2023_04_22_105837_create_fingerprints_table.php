<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fingerprints', function (Blueprint $table) {
            $table->integer('fingerprint_no')->primary();
            $table->unsignedBigInteger('nhif_member_id');
            $table->string('fingerprint_status')->nullable();
            $table->timestamps();

            $table->foreign('nhif_member_id')->references('id')->on('nhif_members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fingerprints');
    }
};
