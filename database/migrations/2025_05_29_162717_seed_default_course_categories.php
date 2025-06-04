<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CourseCategory;

class SeedDefaultCourseCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            'Для начинающих',
            'CIPA 1 уровень',
            'CIPA 2 уровень',
            'Профквалификация аудиторов',
            'ББУ 1',
            'ББУ 2',
            'Повышение квалификации',
            'MS EXCEL',
            'Для руководителей',
            'Для кадровиков',
            'Семинары/тренинги',
            'Записи курсов и семинаров',
            'Онлайн',
            'Консультации',
        ];

        foreach ($categories as $name) {
            CourseCategory::firstOrCreate(['name' => $name]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Удалить только эти категории (не обязательно, но можно):
        $categories = [
            'Для начинающих',
            'CIPA 1 уровень',
            'CIPA 2 уровень',
            'Профквалификация аудиторов',
            'ББУ 1',
            'ББУ 2',
            'Повышение квалификации',
            'MS EXCEL',
            'Для руководителей',
            'Для кадровиков',
            'Семинары/тренинги',
            'Записи курсов и семинаров',
            'Онлайн',
            'Консультации',
        ];

        foreach ($categories as $name) {
            CourseCategory::where('name', $name)->delete();
        }
    }
}
