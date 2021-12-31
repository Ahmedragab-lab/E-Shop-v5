<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $product = new Product();
        $product->section_id = 1;
        $product->product_name = 'samsung';
        $product->slug = 'samsung';
        $product->small_desc = 'smart phone ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '5000';
        $product->selling_price = '4500';
        $product->qty = '0';
        $product->tax = '50';
        $product->image = 'default.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();
        $product = new Product();
        $product->section_id = 1;
        $product->product_name = 'camera sony';
        $product->slug = 'camera sony';
        $product->small_desc = 'camera sony ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '5000';
        $product->selling_price = '4500';
        $product->qty = '5';
        $product->tax = '50';
        $product->image = 'digital_06.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();

        $product = new Product();
        $product->section_id = 3;
        $product->product_name ='tv samsung';
        $product->slug = 'smart tv';
        $product->small_desc = 'smart tv ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '11000';
        $product->selling_price = '9000';
        $product->qty = '100';
        $product->tax = '50';
        $product->image = 'default6.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();

        $product = new Product();
        $product->section_id = 3;
        $product->product_name ='tv samsung';
        $product->slug = 'smart tv';
        $product->small_desc = 'smart tv ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '15000';
        $product->selling_price = '14000';
        $product->qty = '100';
        $product->tax = '50';
        $product->image = 'default4.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();

        $product = new Product();
        $product->section_id = 2;
        $product->product_name ='laptop msi';
        $product->slug = 'laptop';
        $product->small_desc = 'smart pc ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '19500';
        $product->selling_price = '18500';
        $product->qty = '100';
        $product->tax = '50';
        $product->image = 'default3.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();



        $product = new Product();
        $product->section_id = 4;
        $product->product_name = 'Joy stick ps4';
        $product->slug = 'ps4';
        $product->small_desc = 'ps4 ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '2500';
        $product->selling_price = '2000';
        $product->qty = '100';
        $product->tax = '50';
        $product->image = 'default5.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();
        $product = new Product();
        $product->section_id = 4;
        $product->product_name = ' kid bike';
        $product->slug = 'kidtoy';
        $product->small_desc = 'kidtoy ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '2500';
        $product->selling_price = '2000';
        $product->qty = '100';
        $product->tax = '50';
        $product->image = 'kidtoy_07.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();


        $product = new Product();
        $product->section_id = 7;
        $product->product_name =' tools equipment sony';
        $product->slug = 'tools_equipment';
        $product->small_desc = 'tools_equipment ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '4500';
        $product->selling_price = '3700';
        $product->qty = '20';
        $product->tax = '50';
        $product->image = 'tools_equipment_5.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();

        $product = new Product();
        $product->section_id = 5;
        $product->product_name = ' office desk';
        $product->slug = 'office desk';
        $product->small_desc = 'office desk ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '20000';
        $product->selling_price = '15000';
        $product->qty = '10';
        $product->tax = '50';
        $product->image = 'default8.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();
        $product = new Product();
        $product->section_id = 5;
        $product->product_name = ' bed room';
        $product->slug = 'bed room';
        $product->small_desc = 'bed room ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '20000';
        $product->selling_price = '15000';
        $product->qty = '100';
        $product->tax = '50';
        $product->image = 'default7.jpg';
        $product->status = 0;
        $product->trending = 0;
        $product->save();
        $product = new Product();
        $product->section_id = 5;
        $product->product_name =' modern table';
        $product->slug = 'modern table';
        $product->small_desc = 'modern table ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '6000';
        $product->selling_price = '5000';
        $product->qty = '20';
        $product->tax = '50';
        $product->image = 'furniture_01.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();


        $product = new Product();
        $product->section_id = 6;
        $product->product_name =' t-shirt';
        $product->slug = 't-shirt';
        $product->small_desc = 't-shirt ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '600';
        $product->selling_price = '500';
        $product->qty = '20';
        $product->tax = '50';
        $product->image = 'fashion_09.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();


        $product = new Product();
        $product->section_id = 7;
        $product->product_name = ' tools equipment';
        $product->slug = 'tools_equipment';
        $product->small_desc = 'tools_equipment ';
        $product->desc = 'يوجد لدينا منتجات متعدده';
        $product->original_price = '2500';
        $product->selling_price = '2200';
        $product->qty = '20';
        $product->tax = '50';
        $product->image = 'tools_equipment_8.jpg';
        $product->status = 1;
        $product->trending = 1;
        $product->save();

    }
}
