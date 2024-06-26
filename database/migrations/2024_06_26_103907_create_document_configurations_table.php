<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('document_configurations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
        $table->integer('field_seq');
        $table->boolean('is_mandatory');
        $table->integer('field_type');
        $table->string('field_name');
        $table->json('select_values')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_configurations');
    }
}
