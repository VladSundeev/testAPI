<?php

namespace Database\Seeders;

use App\Models\Good;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $good1 = Good::create([
            'category_id' => 1091,
            'sku' => '1000901',
            'name' => 'Лопатка для котлет 23 см',
            'price' => json_encode([
                'old' => 100,
                'price' => 90,
            ]),
            'description' => 'Эта элегантная и практичная лопатка для котлет станет незаменимым инструментом на вашей кухне...',
            'is_published' => 1,
        ]);

        $good1->stocks()->createMany([
            ['count' => 10, 'address' => 'Москва, ул. Ленина, д. 1'],
            ['count' => 5, 'address' => 'Москва, ул. Ленина, д. 2']
        ]);

        $good1->characteristics()->createMany([
            ['name' => 'Материал', 'value' => 'нержавеющая сталь'],
            ['name' => 'Длина, см', 'value' => 23],
            ['name' => 'Цвет', 'value' => 'серебристый'],
            ['name' => 'Производитель', 'value' => 'Китай']
        ]);

        $good2 = Good::create([
            'category_id' => 1092,
            'sku' => '1000902',
            'name' => 'Тарелка глубокая 20 см',
            'price' => json_encode([
                'old' => 150,
                'price' => 120,
            ]),
            'description' => 'Эта глубокая тарелка идеальна для подачи супов и салатов...',
            'is_published' => 1,
        ]);

        $good2->stocks()->createMany([
            ['count' => 15, 'address' => 'Санкт-Петербург, ул. Пушкина, д. 10'],
            ['count' => 7, 'address' => 'Санкт-Петербург, ул. Пушкина, д. 12']
        ]);

        $good2->characteristics()->createMany([
            ['name' => 'Материал', 'value' => 'фарфор'],
            ['name' => 'Диаметр, см', 'value' => 20],
            ['name' => 'Цвет', 'value' => 'белый'],
            ['name' => 'Производитель', 'value' => 'Россия']
        ]);

        $good3 = Good::create([
            'category_id' => 1093,
            'sku' => '1000903',
            'name' => 'Нож поварской 20 см',
            'price' => json_encode([
                'old' => 300,
                'price' => 250,
            ]),
            'description' => 'Этот поварской нож с лезвием из высококачественной стали идеально подходит для нарезки мяса и овощей...',
            'is_published' => 1,
        ]);

        $good3->stocks()->createMany([
            ['count' => 20, 'address' => 'Новосибирск, ул. Красного Флага, д. 3'],
            ['count' => 10, 'address' => 'Новосибирск, ул. Красного Флага, д. 5']
        ]);

        $good3->characteristics()->createMany([
            ['name' => 'Материал лезвия', 'value' => 'нержавеющая сталь'],
            ['name' => 'Длина лезвия, см', 'value' => 20],
            ['name' => 'Цвет ручки', 'value' => 'черный'],
            ['name' => 'Производитель', 'value' => 'Германия']
        ]);

        $good4 = Good::create([
            'category_id' => 1094,
            'sku' => '1000904',
            'name' => 'Чашка керамическая 300 мл',
            'price' => json_encode([
                'old' => 70,
                'price' => 50,
            ]),
            'description' => 'Эта керамическая чашка идеально подходит для утреннего кофе или чая...',
            'is_published' => 1,
        ]);

        $good4->stocks()->createMany([
            ['count' => 30, 'address' => 'Казань, ул. Баумана, д. 4'],
            ['count' => 15, 'address' => 'Казань, ул. Баумана, д. 6']
        ]);

        $good4->characteristics()->createMany([
            ['name' => 'Материал', 'value' => 'керамика'],
            ['name' => 'Объем, мл', 'value' => 300],
            ['name' => 'Цвет', 'value' => 'белый'],
            ['name' => 'Производитель', 'value' => 'Турция']
        ]);

        $good5 = Good::create([
            'category_id' => 1095,
            'sku' => '1000905',
            'name' => 'Разделочная доска 40 см',
            'price' => json_encode([
                'old' => 200,
                'price' => 150,
            ]),
            'description' => 'Эта разделочная доска из бамбука станет идеальным помощником на вашей кухне...',
            'is_published' => 1,
        ]);

        $good5->stocks()->createMany([
            ['count' => 25, 'address' => 'Екатеринбург, ул. Карла Маркса, д. 7'],
            ['count' => 12, 'address' => 'Екатеринбург, ул. Карла Маркса, д. 9']
        ]);

        $good5->characteristics()->createMany([
            ['name' => 'Материал', 'value' => 'бамбук'],
            ['name' => 'Длина, см', 'value' => 40],
            ['name' => 'Цвет', 'value' => 'естественный'],
            ['name' => 'Производитель', 'value' => 'Вьетнам']
        ]);
    }
}
