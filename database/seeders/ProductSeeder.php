<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $indoor = Category::where('slug', 'indoor-plants')->first();
        $outdoor = Category::where('slug', 'outdoor-plants')->first();

        $products = [
            [
                'name' => 'Palem Kuning',
                'slug' => 'palem-kuning',
                'description' => 'Palem Kuning sangat cocok untuk tampilan tropis di dalam ruangan.',
                'price' => 165000,
                'stock' => 50,
                'image' => 'uploads/palem-kuning.jpg',
                'status' => 'active',
                'care_instructions' => 'Siram secukupnya, letakkan di tempat terang.',
                'categories' => [$outdoor->id],
            ],
            [
                'name' => 'Monstera Deliciosa',
                'slug' => 'monstera-deliciosa',
                'description' => 'Monstera cocok untuk dekorasi indoor modern.',
                'price' => 250000,
                'stock' => 30,
                'image' => 'uploads/monstera.jpg',
                'status' => 'active',
                'care_instructions' => 'Siram 2x seminggu, hindari sinar matahari langsung.',
                'categories' => [$indoor->id],
            ],
            [
                'name' => 'Peace Lily',
                'slug' => 'peace-lily',
                'description' => 'Peace lily menjadi salah tanaman hias yang populer dan banyak diminati lantaran memiliki tampilan yang indah dengan buah putih dan daun berwarna hijau mengkilap.',
                'price' => 100000,
                'stock' => 30,
                'image' => 'uploads/peace-lily.jpg',
                'status' => 'active',
                'care_instructions' => 'Siram seminggu sekali.',
                'categories' => [$indoor->id],
            ],
            [
                'name' => 'Lidah Mertua (Sansevieria)',
                'slug' => 'lidah-mertua',
                'description' => 'Sansevieria tahan kekeringan, cocok untuk indoor/outdoor.',
                'price' => 90000,
                'stock' => 60,
                'image' => 'uploads/lidah-mertua.jpg',
                'status' => 'active',
                'care_instructions' => 'Siram seminggu sekali.',
                'categories' => [$indoor->id, $outdoor->id],
            ],
            [
                'name' => 'Aglaonema Lipstik',
                'slug' => 'aglaonema-lipstik',
                'description' => 'Aglaonema Lipstik cocok untuk taman luar ruangan yang cerah.',
                'price' => 100000,
                'stock' => 25,
                'image' => 'uploads/aglaonema-lipstik.jpg',
                'status' => 'active',
                'care_instructions' => 'Siram 2x sehari, banyak sinar matahari.',
                'categories' => [$outdoor->id],
            ],
            [
                'name' => 'Lidah Buaya',
                'slug' => 'lidah-buaya',
                'description' => 'Lidah buaya banyak ditemukan dalam produk seperti minuman, olesan untuk kulit, kosmetika, atau obat luar untuk luka bakar.',
                'price' => 50000,
                'stock' => 25,
                'image' => 'uploads/lidah-buaya.jpg',
                'status' => 'active',
                'care_instructions' => 'Jika ditanam dalam pot, lidah buaya membutuhkan tanah yang cukup kering dan berpasir serta cahaya matahari yang cukup',
                'categories' => [$outdoor->id],
            ],
            [
                'name' => 'Rosemary',
                'slug' => 'rosemary',
                'description' => 'Rosemary cocok untuk taman luar ruangan yang cerah.',
                'price' => 80000,
                'stock' => 25,
                'image' => 'uploads/rosemary.jpg',
                'status' => 'active',
                'care_instructions' => 'Siram 2x sehari, banyak sinar matahari.',
                'categories' => [$outdoor->id],
            ],
            [
                'name' => 'Song Of India',
                'slug' => 'song-of-india',
                'description' => 'Tanaman Song of India tidak membutuhkan banyak perawatan khusus. Tanaman cantik ini sangat cocok bagi pemula.',
                'price' => 60000,
                'stock' => 25,
                'image' => 'uploads/song-of-india.jpg',
                'status' => 'active',
                'care_instructions' => 'Segera siram ketika media tanam terasa kering. Pastikan drainase baik, semprot tanaman sesekali agar terjaga kelembapannya.',
                'categories' => [$outdoor->id],
            ]
        ];

        foreach ($products as $data) {
            $categories = $data['categories'];
            unset($data['categories']);
            $product = Product::create($data);
            $product->categories()->attach($categories);
        }
    }
}
