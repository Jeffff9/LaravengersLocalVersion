<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('placeName');
            $table->string('shortDetail')->nullable();
            $table->string('category')->default('観光施設');
            $table->string('area')->default('大阪');
            $table->timestamps();
        });

        // サンプルデータの追加
        $places = [
            ['placeName' => '大阪城', 'shortDetail' => '大阪のシンボル的存在である大阪城...'],
            ['placeName' => '通天閣', 'shortDetail' => '大阪の下町のランドマーク...'],
            // ... 他の場所を追加（合計48個のデータを作成）
        ];

        DB::table('places')->insert($places);
    }

    public function down()
    {
        Schema::dropIfExists('places');
    }
}
