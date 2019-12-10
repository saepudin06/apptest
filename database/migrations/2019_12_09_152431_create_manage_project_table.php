<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_project', 32)->unique();
            $table->text('deskripsi');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
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
        Schema::dropIfExists('manage_project');
    }
}
