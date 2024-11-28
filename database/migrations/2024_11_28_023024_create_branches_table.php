<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('base_id')->nullable()->constrained('bases')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('branches')->cascadeOnDelete();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('own_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('branches');
    }
}

