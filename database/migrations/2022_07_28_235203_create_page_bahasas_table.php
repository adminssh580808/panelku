<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageBahasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_bahasas', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('halaman',
            [
                'Pesanan Baru','Riwayat Pesanan','Deposit','Daftar Layanan','Support','API','Top 10','Riwayat Aktifitas','Penggunaan Saldo','Kode Voucher','Terms',
            ]);
            $table->string('indonesia');
            $table->string('english');
            $table->timestamps();

            // $table->foreign('page_category_id')->references('id')->on('page_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_bahasas');
    }
}
