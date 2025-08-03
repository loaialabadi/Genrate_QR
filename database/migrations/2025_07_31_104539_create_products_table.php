<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();

        $table->string('license_number');   // كود الترخيص
        $table->string('owner');            // اسم العميل
        $table->string('category');         // فئة الإعلان
        $table->string('national_id');      // الرقم القومي
        $table->date('start_date');         // تاريخ بداية الترخيص
        $table->date('end_date');           // تاريخ نهاية الترخيص
        $table->string('size');             // المقاسات
        $table->text('location');           // عنوان الموقع
        $table->string('road_class');       // فئة الطريق
        $table->string('type');             // نوع الإعلان
        $table->string('coordinates')->nullable(); // إحداثيات الموقع (اختياري)

        $table->string('qr_code')->nullable(); // كود QR اختياري
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
