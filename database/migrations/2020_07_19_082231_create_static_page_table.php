<?php

use App\Models\StaticPage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_page', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('name');
            $table->text('value')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

    
        });
        $about_us= ['Who are OSSGG?','our vision', 'our mission', 'our values', 'our policies'];
        foreach ($about_us as $key => $about) {
            StaticPage::Create([
                'key' => 'about_us','name'=>$about,'value'=>null,'status'=>1
            ]);            }
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_page');
    }
}
