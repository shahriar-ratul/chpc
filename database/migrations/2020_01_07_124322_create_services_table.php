<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doc_id');
            $table->string('from');
            $table->string('date');
            $table->string('customer_id');
            $table->string('service')->nullable();
            $table->string('item_id');
            $table->string('qty');
            $table->string('discount')->nullable();
            $table->string('subtotal');
            $table->string('service_charge')->nullable();
            $table->string('tax')->nullable();
            $table->string('s_tax')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('reference')->nullable();
            $table->string('remark')->nullable();
            $table->string('total');
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
        Schema::dropIfExists('services');
    }
}
