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
        Schema::create('cagethory_work', function (Blueprint $table) {
            
            $table->timestamps();
            $table->foreignId('work_id')->constrained('works')->onDelete('cascade');
            $table->foreignId('cagethory_id')->constrained('cagethories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cagethory_work');
    }
};
