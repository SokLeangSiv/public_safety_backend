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
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->string('report_by');
            $table->date('report_date');

            //want to create incident type using input type select around 20 manual display
            $table->string('incident_type');
            $table->date('date_incident');
            $table->string('province');

            $table->string('incident_location');
            $table->string('incident_description');
            //type for lat and long
            $table->string('lat');
            $table->string('long');
            $table->string('report_status')->nullable();
            $table->string('report_image')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

            Schema::dropIfExists('report');
    }
};
