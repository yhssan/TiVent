<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->integer('pricetotal');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status_pembayaran',['pending','completed','rejected']);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('event_id')->constrained();
            $table->foreignId('order_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
