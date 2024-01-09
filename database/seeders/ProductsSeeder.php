<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Product::create([
            'name' => 'Samsung Galaxy S9',
            'description' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung. This is an upgrade. Clean ESN and activation ready.',
            'image' => 'samsung.jpg',
            'price' => 698.88,
            'slug' => 'Samsung-Galaxy-S9.jpg',
            'meta_title' => 'Samsung Galaxy S9',
            'meta_description' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung. This is an upgrade. Clean ESN and activation ready.',
            'quantity' => 50,
            'category_id' => 1
         ]);
 
         Product::create([
             'name' => 'Apple iPhone X',
             'description' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED. iPhone x 64gb. iPhone 8 64gb. iPhone 8 64gb. iPhone X with iOS 11.',
             'image' => 'apple_iphone_x.jpg',
             'price' => 983.00,
             'slug' => 'Apple-iPhone-X',
             'meta_title' => 'Apple iPhone X',
             'meta_description' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED. iPhone x 64gb. iPhone 8 64gb. iPhone 8 64gb. iPhone X with iOS 11.',
             'quantity' => 50,
             'category_id' => 1
         ]);
 
         Product::create([
             'name' => 'Google Pixel 2 XL',
             'description' => 'New condition
 • No returns, but backed by eBay Money back guarantee',
             'image' => 'google-pixel-2.jpg',
             'price' => 675.00,
             'slug' => 'Google-Pixel-2-XL',
             'meta_title' => 'Google Pixel 2 XL',
             'meta_description' => 'New condition
             • No returns, but backed by eBay Money back guarantee',
             'quantity' => 50,
             'category_id' => 1
         ]);
 
         Product::create([
             'name' => 'LG V10 H900',
             'description' => 'NETWORK Technology GSM. Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue. SAR EU 0.59 W/kg (head).',
             'image' => 'lgv10_elate.jpg',
             'price' => 159.99,
             'slug' => 'LG-V10-H900',
             'meta_title' => 'LG V10 H900',
             'meta_description' => 'NETWORK Technology GSM. Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue. SAR EU 0.59 W/kg (head).',
             'quantity' => 50,
             'category_id' => 1
         ]);
 
         Product::create([
             'name' => 'Huawei Elate',
             'description' => 'Cricket Wireless - Huawei Elate. New Sealed Huawei Elate Smartphone.',
             'image' => 'huawei_elate_68.jpg',
             'price' => 68.00,
             'slug' => 'Huawei-Elate',
             'meta_title' => 'Huawei Elate',
             'meta_description' => 'Cricket Wireless - Huawei Elate. New Sealed Huawei Elate Smartphone.',
             'quantity' => 50,
             'category_id' => 1
         ]);
 
         Product::create([
             'name' => 'HTC One M10',
             'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
             'image' => 'htc.jpg',
             'price' => 129.99,
             'slug' => 'HTC-One-M10',
             'meta_title' => 'HTC One M10',
             'meta_description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
             'quantity' => 50,
             'category_id' => 1
         ]);
         
    }
}
