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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_category')->nullable(); //nullable until master data available
            $table->string('title');
            $table->text('project_description',150);
            $table->text('project_objective',250);
            $table->text('project_outcome',250);
            $table->integer('jobs');
            $table->integer('sme');
            $table->integer('product_utilized');
            $table->integer('social_impact');
            $table->integer('beneficiaries');
            $table->string('beneficiaries_description');
            $table->string('target_group')->nullable(); //nullable until master data available
            $table->integer('capacity');
            $table->string('governate')->nullable(); //nullable until master data available
            $table->string('town')->nullable(); //nullable until master data available
            $table->string('project_image');
            $table->foreignId('company_id')->constrained('companies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
