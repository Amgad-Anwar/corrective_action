<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrective_actions', function (Blueprint $table) {
            $table->id();
            $table->string('document_name');
            $table->date('issue_date')->nullable();
            $table->date('revision_date')->nullable();
            $table->string('certificate_number')->nullable();
            $table->text('nonconformance_details')->nullable();
            $table->text('action_required')->nullable();
            $table->string('requested_by')->nullable();
            $table->date('request_date')->nullable();
            $table->string('factory_manager')->nullable();
            $table->string('operation_manager')->nullable();
            $table->string('production_manager')->nullable();
            $table->string('qar_signature')->nullable();
            $table->boolean('follow_up_corrective')->default(false);
            $table->boolean('follow_up_preventive')->default(false);
            $table->text('additional_notes')->nullable();
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
        Schema::dropIfExists('corrective_actions');
    }
};
