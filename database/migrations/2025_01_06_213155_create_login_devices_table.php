<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('login_devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Khóa ngoại đến bảng users
            $table->string('device_name')->nullable(); // Tên thiết bị
            $table->string('ip_address'); // Địa chỉ IP
            $table->string('user_agent'); // Thông tin trình duyệt
            $table->timestamps(); // Thời gian đăng nhập

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('login_devices');
    }
}