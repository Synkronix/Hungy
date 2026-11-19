<?php

/*
|--------------------------------------------------------------------------
| Katalog nutrisi Hungy
|--------------------------------------------------------------------------
|
| Data nutrisi di bawah adalah perkiraan per porsi standar. Nilai ini dipakai
| untuk mengisi otomatis form catat kalori, sehingga pengguna tidak perlu
| menghafal angka kalori dan makronutrisi setiap makanan.
|
*/

return [

    'recipes' => [

        'nasi-goreng-kampung' => [
            'name' => 'Nasi Goreng Kampung',
            'emoji' => '🍚',
            'meal_type' => 'Makan Siang',
            'description' => 'Nasi goreng rumahan dengan telur, ayam suwir, dan kecap manis.',
            'serving' => '1 porsi (±350 g)',
            'calories' => 520,
            'protein' => 18.0,
            'carbs' => 62.0,
            'fat' => 22.0,
            'ingredients' => ['Nasi putih 1 piring', 'Telur 1 butir', 'Ayam suwir 50 g', 'Kecap manis 1 sdm'],
        ],

        'soto-ayam-lamongan' => [
            'name' => 'Soto Ayam Lamongan',
            'emoji' => '🍜',
            'meal_type' => 'Makan Siang',
            'description' => 'Kuah kuning gurih dengan suwiran ayam, telur, dan koya.',
            'serving' => '1 mangkuk (±400 ml)',
            'calories' => 380,
            'protein' => 28.0,
            'carbs' => 30.0,
            'fat' => 15.0,
            'ingredients' => ['Ayam 80 g', 'Telur rebus 1 butir', 'Soun 50 g', 'Kuah kuning & koya'],
        ],

        'gado-gado' => [
            'name' => 'Gado-Gado',
            'emoji' => '🥗',
            'meal_type' => 'Makan Siang',
            'description' => 'Sayuran rebus dengan tahu, tempe, telur, dan saus kacang.',
            'serving' => '1 porsi (±300 g)',
            'calories' => 420,
            'protein' => 16.0,
            'carbs' => 45.0,
            'fat' => 20.0,
            'ingredients' => ['Sayuran campur 150 g', 'Tahu & tempe 60 g', 'Telur 1 butir', 'Saus kacang 2 sdm'],
        ],

        'oatmeal-pisang-madu' => [
            'name' => 'Oatmeal Pisang Madu',
            'emoji' => '🥣',
            'meal_type' => 'Sarapan',
            'description' => 'Oat creamy dengan pisang, madu, dan taburan kacang.',
            'serving' => '1 mangkuk (±250 g)',
            'calories' => 310,
            'protein' => 9.0,
            'carbs' => 52.0,
            'fat' => 8.0,
            'ingredients' => ['Oat 40 g', 'Susu 150 ml', 'Pisang 1 buah', 'Madu 1 sdt'],
        ],

        'telur-dadar-sayur' => [
            'name' => 'Telur Dadar Sayur',
            'emoji' => '🍳',
            'meal_type' => 'Sarapan',
            'description' => 'Telur dadar tebal dengan irisan wortel, daun bawang, dan kol.',
            'serving' => '1 porsi (±150 g)',
            'calories' => 240,
            'protein' => 14.0,
            'carbs' => 8.0,
            'fat' => 17.0,
            'ingredients' => ['Telur 2 butir', 'Wortel 30 g', 'Kol 30 g', 'Daun bawang'],
        ],

        'bubur-ayam' => [
            'name' => 'Bubur Ayam',
            'emoji' => '🍲',
            'meal_type' => 'Sarapan',
            'description' => 'Bubur lembut dengan suwiran ayam, cakwe, dan kerupuk.',
            'serving' => '1 mangkuk (±350 g)',
            'calories' => 360,
            'protein' => 18.0,
            'carbs' => 48.0,
            'fat' => 11.0,
            'ingredients' => ['Beras 60 g', 'Ayam suwir 60 g', 'Cakwe 1 potong', 'Kecap & sambal'],
        ],

        'ayam-bakar-nasi' => [
            'name' => 'Ayam Bakar & Nasi',
            'emoji' => '🍗',
            'meal_type' => 'Makan Malam',
            'description' => 'Ayam bakar bumbu kecap dengan nasi hangat dan lalapan.',
            'serving' => '1 piring (±400 g)',
            'calories' => 560,
            'protein' => 38.0,
            'carbs' => 55.0,
            'fat' => 20.0,
            'ingredients' => ['Ayam 100 g', 'Nasi putih 1 piring', 'Bumbu kecap', 'Lalapan'],
        ],

        'pepes-ikan-nila' => [
            'name' => 'Pepes Ikan Nila',
            'emoji' => '🐟',
            'meal_type' => 'Makan Malam',
            'description' => 'Ikan nila dikukus dengan bumbu rempah dan daun kemangi.',
            'serving' => '1 bungkus (±200 g)',
            'calories' => 300,
            'protein' => 32.0,
            'carbs' => 10.0,
            'fat' => 14.0,
            'ingredients' => ['Ikan nila 150 g', 'Kemangi', 'Tomat & cabai', 'Daun pisang'],
        ],

        'tumis-tahu-tempe' => [
            'name' => 'Tumis Tahu Tempe',
            'emoji' => '🍛',
            'meal_type' => 'Makan Malam',
            'description' => 'Tahu dan tempe tumis kecap dengan cabai dan bawang.',
            'serving' => '1 porsi (±200 g)',
            'calories' => 280,
            'protein' => 18.0,
            'carbs' => 16.0,
            'fat' => 16.0,
            'ingredients' => ['Tahu 100 g', 'Tempe 100 g', 'Kecap manis', 'Cabai & bawang'],
        ],

        'salad-buah-yogurt' => [
            'name' => 'Salad Buah Yogurt',
            'emoji' => '🍓',
            'meal_type' => 'Camilan',
            'description' => 'Potongan buah segar dengan saus yogurt dan madu.',
            'serving' => '1 mangkuk (±250 g)',
            'calories' => 180,
            'protein' => 5.0,
            'carbs' => 30.0,
            'fat' => 4.0,
            'ingredients' => ['Apel ½ buah', 'Pepaya 100 g', 'Yogurt 100 g', 'Madu 1 sdt'],
        ],

        'pisang-goreng' => [
            'name' => 'Pisang Goreng',
            'emoji' => '🍌',
            'meal_type' => 'Camilan',
            'description' => 'Pisang goreng renyah, cocok untuk teman minum teh.',
            'serving' => '3 potong (±120 g)',
            'calories' => 230,
            'protein' => 3.0,
            'carbs' => 32.0,
            'fat' => 10.0,
            'ingredients' => ['Pisang 1 buah', 'Tepung serbaguna 40 g', 'Minyak goreng'],
        ],

        'smoothie-bayam-pisang' => [
            'name' => 'Smoothie Bayam Pisang',
            'emoji' => '🥤',
            'meal_type' => 'Camilan',
            'description' => 'Minuman segar bayam, pisang, dan susu tanpa gula tambahan.',
            'serving' => '1 gelas (±300 ml)',
            'calories' => 210,
            'protein' => 7.0,
            'carbs' => 36.0,
            'fat' => 5.0,
            'ingredients' => ['Bayam 50 g', 'Pisang 1 buah', 'Susu 200 ml', 'Es batu'],
        ],

    ],

    'foods' => [

        'nasi-putih' => [
            'name' => 'Nasi Putih',
            'emoji' => '🍚',
            'serving' => '1 centong (±100 g)',
            'calories' => 130,
            'protein' => 2.7,
            'carbs' => 28.0,
            'fat' => 0.3,
        ],

        'telur-rebus' => [
            'name' => 'Telur Rebus',
            'emoji' => '🥚',
            'serving' => '1 butir',
            'calories' => 78,
            'protein' => 6.3,
            'carbs' => 0.6,
            'fat' => 5.3,
        ],

        'ayam-goreng' => [
            'name' => 'Ayam Goreng',
            'emoji' => '🍗',
            'serving' => '1 potong (±80 g)',
            'calories' => 246,
            'protein' => 22.0,
            'carbs' => 4.0,
            'fat' => 16.0,
        ],

        'tempe-goreng' => [
            'name' => 'Tempe Goreng',
            'emoji' => '🍘',
            'serving' => '2 potong',
            'calories' => 180,
            'protein' => 12.0,
            'carbs' => 8.0,
            'fat' => 12.0,
        ],

        'tahu-goreng' => [
            'name' => 'Tahu Goreng',
            'emoji' => '🧈',
            'serving' => '2 potong',
            'calories' => 140,
            'protein' => 10.0,
            'carbs' => 5.0,
            'fat' => 9.0,
        ],

        'mie-instan' => [
            'name' => 'Mie Instan',
            'emoji' => '🍜',
            'serving' => '1 bungkus',
            'calories' => 380,
            'protein' => 8.0,
            'carbs' => 54.0,
            'fat' => 14.0,
        ],

        'roti-tawar' => [
            'name' => 'Roti Tawar',
            'emoji' => '🍞',
            'serving' => '2 lembar',
            'calories' => 150,
            'protein' => 5.0,
            'carbs' => 28.0,
            'fat' => 2.0,
        ],

        'pisang' => [
            'name' => 'Pisang',
            'emoji' => '🍌',
            'serving' => '1 buah sedang',
            'calories' => 105,
            'protein' => 1.3,
            'carbs' => 27.0,
            'fat' => 0.4,
        ],

        'susu-uht' => [
            'name' => 'Susu UHT',
            'emoji' => '🥛',
            'serving' => '250 ml',
            'calories' => 150,
            'protein' => 8.0,
            'carbs' => 12.0,
            'fat' => 8.0,
        ],

        'kopi-susu-aren' => [
            'name' => 'Kopi Susu Gula Aren',
            'emoji' => '☕',
            'serving' => '1 gelas (±250 ml)',
            'calories' => 180,
            'protein' => 3.0,
            'carbs' => 28.0,
            'fat' => 6.0,
        ],

        'apel' => [
            'name' => 'Apel',
            'emoji' => '🍎',
            'serving' => '1 buah sedang',
            'calories' => 95,
            'protein' => 0.5,
            'carbs' => 25.0,
            'fat' => 0.3,
        ],

        'bakso-sapi' => [
            'name' => 'Bakso Sapi',
            'emoji' => '🍲',
            'serving' => '1 porsi (5 butir + kuah)',
            'calories' => 320,
            'protein' => 20.0,
            'carbs' => 20.0,
            'fat' => 18.0,
        ],

    ],

];
