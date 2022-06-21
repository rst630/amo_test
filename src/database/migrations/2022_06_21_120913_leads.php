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
        Schema::create('leads', function(Blueprint $table) {
            $table->id();
            $table->string('name'); // "Разработка интернет-магазина"
            $table->string('responsible_user_id'); // 6824230
            $table->string('group_id'); // 0
            $table->string('created_by'); // 6824230
            $table->string('updated_by'); // 6824230
            $table->string('created_at'); // 1655808242
            $table->string('updated_at'); // 1655808242
            $table->string('account_id'); // 30237385
            $table->string('pipeline_id'); // 5518297
            $table->string('status_id'); // 48798049
            $table->string('closed_at')->nullable(); // null
            $table->string('closest_task_at')->nullable(); // null
            $table->string('price'); // 111
            $table->string('loss_reason_id')->nullable(); // null
            $table->string('loss_reason')->nullable(); // null
            $table->boolean('is_deleted'); // false
            $table->string('tags')->nullable(); // null
            $table->string('source_id')->nullable(); // null
            $table->string('source_external_id')->nullable(); // null
            $table->string('custom_fields_values')->nullable(); // null
            $table->string('score')->nullable(); // null
            $table->string('is_price_modified_by_robot')->nullable(); // null
            $table->string('contacts')->nullable(); // null
            $table->string('company')->nullable(); // null
            $table->string('catalog_elements_links')->nullable(); // null
            $table->string('visitor_uid')->nullable(); // null
            $table->string('metadata')->nullable(); // null
            $table->string('complex_requestIds')->nullable(); // null
            $table->string('is_merged')->nullable(); // null
            $table->string('request_id')->nullable(); // null

            $table->unsignedBigInteger('company_id')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
