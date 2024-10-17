<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->string('nombre_proveedor');
            $table->string('direccion_proveedor');
            $table->string('telefono_proveedor');
            $table->string('email_proveedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
