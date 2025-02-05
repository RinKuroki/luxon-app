<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('luxon_trx_user_detail', function (Blueprint $table) {
            $table->increments('tud_detail_id')->comment('利用詳細ID');
            $table->unsignedInteger('tud_user_id')->comment('ユーザーID');
            $table->unsignedInteger('tud_service_plan_id')->comment('プランID');
            $table->unsignedInteger('tud_event_attendance_remaining')->comment('イベント参加可能回数');
            $table->unsignedInteger('tud_interview_count_remaining')->comment('面談可能回数');
            $table->unsignedInteger('tud_case_study_count_remaining')->comment('ケーススタディー可能回数');
            $table->unsignedInteger('tud_es_count_remaining')->comment('ES提出可能回数');
            $table->char('tud_delete_flag', 1)->default('0')->comment('削除フラグ');
            $table->dateTime('tud_deletion_datetime')->nullable()->comment('削除日時');
            $table->dateTime('tud_registration_datetime')->comment('登録日時');
            $table->dateTime('tud_update_datetime')->comment('更新日時');
            $table->timestamp('tud_update_timestamp')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('システム更新日時');

            $table->foreign('tud_user_id')->references('mus_user_id')->on('luxon_mst_user');
            $table->foreign('tud_service_plan_id')->references('tsp_service_plan_id')->on('luxon_trx_service_plan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luxon_trx_user_detail');
    }
};
