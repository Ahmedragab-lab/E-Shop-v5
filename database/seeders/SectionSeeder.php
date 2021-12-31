<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{

    public function run()
    {
        DB::table('Sections')->delete();

        $section = new Section();
        $section->Section_name = 'mobile';
        $section->slug = 'mobile';
        $section->image = 'default2.jpg';
        $section->desc = 'يوجد لدينا منتجات متعدده';
        $section->status = 1;
        $section->popular = 0;
        $section->save();
        $section = new Section();
        $section->Section_name = 'computer';
        $section->slug = 'computer';
        $section->image = 'default3.jpg';
        $section->desc = 'يوجد لدينا منتجات متعدده';
        $section->status = 1;
        $section->popular = 1;
        $section->save();
        $section = new Section();
        $section->Section_name ='smart tv';
        $section->slug = 'smart tv';
        $section->image = 'default.jpg';
        $section->desc = 'يوجد لدينا منتجات متعدده';
        $section->status = 1;
        $section->popular = 1;
        $section->save();
        $section = new Section();
        $section->Section_name = 'games';
        $section->slug = 'games';
        $section->image = 'default4.jpg';
        $section->desc = '	يوجد العديد من الاجهزة الحديثة';
        $section->status = 1;
        $section->popular = 1;
        $section->save();
        $section = new Section();
        $section->Section_name = 'furniture';
        $section->slug = 'furniture';
        $section->image = 'default5.jpg';
        $section->desc = '  يوجد العديد من ملحقات الاجهزة المميزة    ';
        $section->status = 1;
        $section->popular = 1;
        $section->save();
        $section = new Section();
        $section->Section_name = 'fashion';
        $section->slug = 'fashion';
        $section->image = 'default6.jpg';
        $section->desc = '  يوجد العديد من ملحقات الاجهزة المميزة    ';
        $section->status = 1;
        $section->popular = 1;
        $section->save();
        $section = new Section();
        $section->Section_name ='tools_equipment';
        $section->slug = 'tools_equipment';
        $section->image = 'default7.jpg';
        $section->desc = '  يوجد العديد من ملحقات الاجهزة المميزة    ';
        $section->status = 1;
        $section->popular = 1;
        $section->save();
       
    }
}
