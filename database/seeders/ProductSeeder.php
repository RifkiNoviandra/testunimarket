<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Oppo Reno 10 5G',
                'category_id'=> 2,
                'price'=>496,
                'description'=>'The Oppo Reno 10x Zoom feels stylish in a way few phones do, from its smooth rear design to the asymmetrical and unapologetic pop-up camera. It may feel a little slow to use at times, thanks to the slow-to-respond user interface, but in general it’s a processing powerhouse that’ll do all you ask of it and more.',
                'gallery'=>'https://nolodejesescapar.com/wp-content/uploads/2020/10/oppo_reno_10xzoom.jpg',
                'user_id' => 1
            ],
            [
                'name'=>'Hitachi Refrigerator',
                'category_id'=> 1,
                'price'=>5000,
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eros diam, porttitor sit amet ex nec, mattis consequat est. Donec rhoncus dapibus ipsum, quis aliquam odio. Donec congue dignissim urna sit amet sodales. Curabitur efficitur diam orci, quis rutrum ligula consectetur vitae. Mauris id dignissim nisl. Duis at enim a risus tempor facilisis id sit amet diam. Vestibulum tempus neque placerat, volutpat ligula eu, fermentum magna. Ut nec pellentesque est, ac dictum diam. Fusce elementum eget nulla nec faucibus. ',
                'gallery'=>'https://www.luluhypermarket.com/cdn-cgi/image/f=auto/medias/1737106-02.jpg-1200Wx1200H?context=bWFzdGVyfGltYWdlc3wyODU2MTR8aW1hZ2UvanBlZ3xoODQvaDMwLzk2ODE4MDg1NTYwNjIvMTczNzEwNi0wMi5qcGdfMTIwMFd4MTIwMEh8MWFiMTQ4MWU3NWY1MjA5NzZlZmIyYzkzNTUxODFkYjE3ZjI1ZmRiMTE5Y2JhYTI1NTE2ZjlkM2EyMTI1ZGQ3MQ',
                'user_id' => 1
            ],
            [
                'name'=>'Samsung LED TV 32 inch',
                'category_id'=> 3,
                'price'=>1000,
                'description'=>'Quisque aliquam velit magna, eget vehicula risus posuere vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed congue, lectus a pretium eleifend, libero dui elementum augue, nec vulputate velit erat et nisi. Nunc eu justo et dui hendrerit facilisis. Curabitur vitae ligula dignissim, pretium neque eu, eleifend purus. Fusce scelerisque convallis eros. Phasellus facilisis sem tellus, eu pretium nulla condimentum eget. Nam maximus vehicula ligula, a pellentesque urna. Pellentesque iaculis nisi odio, sed pharetra justo efficitur a. Mauris at augue quam. Cras ullamcorper sagittis consequat. Nulla nibh nulla, mattis at elit ac, sagittis malesuada elit. Mauris finibus libero in cursus tristique. Sed a ligula nec ligula lobortis ultricies. Aenean ex metus, tincidunt at mauris non, molestie viverra nisi. Ut leo nibh, lobortis in nunc quis, rhoncus ultricies nulla. ',
                'gallery'=>'https://www.bhphotovideo.com/images/images2500x2500/samsung_un55h6400afxza_un55h6400_55_smart_led_1026263.jpg',
                'user_id' => 1
            ],
            [
                'name'=>'Iphone 14 Pro Max',
                'category_id'=> 2,
                'price'=>1059,
                'description'=>'Phasellus blandit ipsum ex, vel interdum ex lacinia sit amet. Praesent vel odio velit. Nunc pellentesque dapibus ipsum, congue interdum orci auctor ac. Nulla sed sem et lorem rutrum ornare in sit amet sem. Aenean viverra sed mi quis dapibus. Curabitur vitae ante mi. Maecenas mauris sapien, faucibus id elit in, ullamcorper ultrices erat. Suspendisse bibendum eros nec nisl convallis lacinia. Praesent elementum ac velit at tincidunt. Cras sit amet dapibus ante. ',
                'gallery'=>'https://www.mobiledokan.co/wp-content/uploads/2021/09/Apple-iPhone-14-Pro-Max-Deep-Purple.jpg',
                'user_id' => 1
            ]
        ]);
    }
}
