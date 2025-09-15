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
        if (!Schema::hasTable('asientos')) {
        Schema::create('asientos', function (Blueprint $t) {
            $t->id();
            $t->foreignId('movimiento_id')->nullable()
              ->constrained('movimientos')->nullOnDelete();
            $t->date('fecha');
            $t->string('descripcion',255)->nullable();
            $t->string('cuenta_debe',20);
            $t->string('cuenta_haber',20);
            $t->decimal('monto',15,2)->default(0);
            $t->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asientos');
    }
};
