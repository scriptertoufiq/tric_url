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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('categories_id')->constrained();
            $table->text('target_url');
            $table->string('sort_url',255)->unique();
            $table->text('redirect_type');
            $table->integer('order')->nullable();
            $table->text('param_structure')->nullable();
            $table->text('param_forwarding')->nullable();
            $table->boolean('favorite')->default(0)->comment('0=no,1=yes');
            $table->boolean('tracking')->default(0)->comment('0=no,1=yes');
            $table->boolean('sponsored')->default(0)->comment('0=no,1=yes');
            $table->boolean('uncloaked')->default(0)->comment('0=no,1=yes');
            $table->boolean('no_follow')->default(0)->comment('0=no,1=yes');
            $table->boolean('link_status')->default(1)->comment('1=active,0=inactive');
            $table->text('note')->nullable();
            $table->timestamp('publish_time')->nullable();
            $table->integer('wildcards')->nullable();
            $table->text('dynamic_redirects')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
