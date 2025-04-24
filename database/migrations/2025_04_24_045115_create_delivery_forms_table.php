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
        Schema::create('delivery_forms', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_address');
            $table->string('pickup_name');
            $table->string('pickup_contact');
            $table->string('pickup_email');
            $table->string('delivery_address');
            $table->string('delivery_name');
            $table->string('delivery_contact');
            $table->string('delivery_email');
            $table->enum('type_of_good', ['Document', 'Parcel']);
            $table->enum('delivery_provider', ['DEHL', 'STARTRACK','ZOOM2U','TGE']);
            $table->enum('priority', ['Standard', 'Express', 'Immediate']);
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('package_description');
            $table->float('length');
            $table->float('height');
            $table->float('width');
            $table->float('weight');
            $table->enum('status', ['Pending', 'Shipped', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_forms');
    }
};
