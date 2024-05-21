<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('jasa_id')->constrained();
            $table->foreignId('sparepart_id')->constrained();
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('transactions');
    }
};

