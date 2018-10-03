<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('project_owner_id');
            $table->float('hourly_rate');
            $table->string('url');
            $table->string('admin_url');
            $table->text('login_details');
            $table->string('git_url');
            $table->string('logo_url');
            $table->string('system_type');
            $table->integer('details_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('project_owner_id');
            $table->dropColumn('hourly_rate');
            $table->dropColumn('url');
            $table->dropColumn('admin_url');
            $table->dropColumn('login_details');
            $table->dropColumn('git_url');
            $table->dropColumn('logo_url');
            $table->dropColumn('system_type');
            $table->dropColumn('details_id');
        });
    }
}
