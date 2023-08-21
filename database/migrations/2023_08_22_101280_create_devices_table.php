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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->ForeignId('device_type_id')-> constrained('types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->ForeignId('device_brand_id')-> constrained('brands')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('serial_number');
            $table->ForeignId('device_site_id')-> constrained('sites')->cascadeOnUpdate()->cascadeOnDelete();
            $table->ForeignId('device_location_id')-> constrained('locations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->ForeignId('device_rack_id')-> constrained('racks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum("device_status", ["Digunakan", "Disewakan", "Idle"])->default("Idle");
            $table->string('device_image');
            $table->string('device_describtion');
            $table->string('qrcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
