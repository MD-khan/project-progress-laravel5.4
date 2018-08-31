<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBudgetToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function($table) {
            $table->double('deal_price')->after('name')->default(0);
            $table->double('develop_cost')->after('name')->default(0);
            $table->double('design_cost')->after('name')->default(0);
            $table->double('other_cost')->after('name')->default(0);

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function($table) {
            $table->dropColumn('deal_price');
            $table->dropColumn('develop_cost');
            $table->dropColumn('design_cost');
            $table->dropColumn('design_cost');

    });
    }
}
