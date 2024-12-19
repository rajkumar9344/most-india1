<?php
// database/migrations/xxxx_xx_xx_create_employees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // Personal Details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->text('address_residential');
            $table->string('pin_code');
            $table->string('city');
            $table->string('country');
            $table->string('state');
            $table->text('address_permanent');
            $table->string('photo')->nullable(); // Path to uploaded photo
            $table->text('emergency_contact_address');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->string('blood_group');
            $table->string('mobile_1');
            $table->string('mobile_2')->nullable();
            $table->string('email_personal');

            // Company Details
            $table->string('employee_id')->unique();
            $table->string('department');
            $table->string('designation');
            $table->date('date_of_joining');
            $table->date('date_of_exit')->nullable();
            $table->string('status');
            $table->string('email_official');

            // Bank Account Details
            $table->string('account_holder_name');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('branch');
            $table->string('ifsc_code');

            // Insurance Details
            $table->string('insurance_no');
            $table->date('insurance_from_date')->nullable();
            $table->date('insurance_to_date');
            $table->string('insurance_company_name');
            $table->text('insurance_coverage');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
