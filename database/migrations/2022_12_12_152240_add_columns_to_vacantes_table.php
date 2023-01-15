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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('titulo');
            $table->string('empresa');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->date('fecha_postulacion');
            $table->string('img');
            $table->text('descripcion');
            $table->integer('postulacion')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropForeign('vacantes_categoria_id_foreign');
            $table->dropForeign('vacantes_salario_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');

            $table->dropColumn([
                'titulo',
                'empresa',
                'salario_id',
                'categoria_id',
                'fecha_postulacion',
                'img',
                'descripcion',
                'postulacion',
                'user_id'
            ]);
            // Schema::dropIfExists('vacantes');
        });
    }
};
