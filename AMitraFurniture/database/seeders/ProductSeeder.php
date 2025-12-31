<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Sofa Minimalis Modern',
                'slug' => 'sofa-minimalis-modern',
                'description' => 'Sofa minimalis dengan desain modern yang nyaman untuk ruang tamu Anda.',
                'price' => 3500000,
                'category' => 'Sofa',
                'image' => 'assets/images/dan2.jpg',
            ],
            [
                'name' => 'Meja Makan Kayu Jati',
                'slug' => 'meja-makan-kayu-jati',
                'description' => 'Meja makan dari kayu jati berkualitas tinggi untuk 6 orang.',
                'price' => 5000000,
                'category' => 'Meja',
                'image' => 'assets/images/meja makan kayu jati.jpg',
            ],
            [
                'name' => 'Kursi Kerja Ergonomis',
                'slug' => 'kursi-kerja-ergonomis',
                'description' => 'Kursi kerja dengan desain ergonomis untuk kenyamanan maksimal.',
                'price' => 1500000,
                'category' => 'Kursi',
                'image' => 'assets/images/dan4.jpg',
            ],
            [
                'name' => 'Lemari Pakaian 3 Pintu',
                'slug' => 'lemari-pakaian-3-pintu',
                'description' => 'Lemari pakaian minimalis dengan 3 pintu dan cermin.',
                'price' => 4000000,
                'category' => 'Lemari',
                'image' => 'assets/images/Lemari.png',
            ],
            [
                'name' => 'Rak Buku Minimalis',
                'slug' => 'rak-buku-minimalis',
                'description' => 'Rak buku dengan 3 tingkat untuk menyimpan koleksi buku Anda.',
                'price' => 1200000,
                'category' => 'Rak',
                'image' => 'assets/images/dan5.jpg',
            ],
            [
                'name' => 'Kursi Elbow Chair',
                'slug' => 'kursi-elbow-chair',
                'description' => 'Kursi elbow dengan desain elegan dan nyaman untuk ruang tamu.',
                'price' => 1800000,
                'category' => 'Kursi',
                'image' => 'assets/images/Elbow Chair.jpeg',
            ],
            [
                'name' => 'Meja Dana Minimalis',
                'slug' => 'meja-dana-minimalis',
                'description' => 'Meja minimalis serbaguna untuk berbagai kebutuhan rumah atau kantor.',
                'price' => 2500000,
                'category' => 'Meja',
                'image' => 'assets/images/Dana.png',
            ],
            [
                'name' => 'Sofa BCA Series',
                'slug' => 'sofa-bca-series',
                'description' => 'Sofa modern dengan desain elegant dan material premium.',
                'price' => 4500000,
                'category' => 'Sofa',
                'image' => 'assets/images/bca.png',
            ],
            [
                'name' => 'Sofa BNI Collection',
                'slug' => 'sofa-bni-collection',
                'description' => 'Sofa nyaman dengan bahan berkualitas tinggi.',
                'price' => 4200000,
                'category' => 'Sofa',
                'image' => 'assets/images/bni.png',
            ],
            [
                'name' => 'Sofa BRI Premium',
                'slug' => 'sofa-bri-premium',
                'description' => 'Sofa premium dengan desain kontemporer untuk ruang keluarga.',
                'price' => 4800000,
                'category' => 'Sofa',
                'image' => 'assets/images/bri.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}