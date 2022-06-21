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
        Schema::create('companies',function(Blueprint $table) {
            $table->id(); // 37658373
            $table->string('name')->nullable(); // null
            $table->unsignedBigInteger('responsible_user_id')->nullable(); // null
            $table->unsignedBigInteger('group_id')->nullable(); // null
            $table->string('created_by')->nullable(); // null
            $table->string('updated_by')->nullable(); // null
            $table->string('created_at')->nullable(); // null
            $table->string('updated_at')->nullable(); // null
            $table->string('closest_task_at')->nullable(); // null
            $table->string('account_id')->nullable(); // null
            $table->string('tags')->nullable(); // null
            $table->string('custom_fields_values')->nullable(); // null
            $table->string('contacts')->nullable(); // null
            $table->string('leads')->nullable(); // null
            $table->string('customers')->nullable(); // null
            $table->string('catalog_elements_links')->nullable(); // null
            $table->string('requestId')->nullable(); // null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
