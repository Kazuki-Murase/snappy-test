<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no');
            $table->dateTime('publish_datetime');
            $table->string('to_company_address');
            $table->string('to_company_name');
            $table->string('to_vendor_code');
            $table->integer('amount');
            $table->string('from_address1');
            $table->string('from_address2');
            $table->string('from_company_name');
            $table->string('from_company_division');
            $table->string('from_company_tel');
            $table->string('from_bank_name');
            $table->string('from_branch_name');
            $table->string('from_bank_kind');
            $table->string('from_bank_no');
            $table->string('from_account_name');
            $table->date('payment_date');
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
        Schema::dropIfExists('headers');
    }
}
