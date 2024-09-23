<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;
use function Hyperf\Config\config;

class UpdateAdminMenuTable extends Migration
{
    public function getConnection()
    {
        return $this->config('database.connection') ?: config('databases.default');
    }

    public function config($key)
    {
        return config('admin.'.$key);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->config('database.menu_table'), function (Blueprint $table) {
            $table->tinyInteger('show')->default(1)->after('uri');
            $table->string('extension', 50)->default('')->after('uri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->config('database.menu_table'), function (Blueprint $table) {
            $table->dropColumn('show');
            $table->dropColumn('extension');
        });
    }
}
