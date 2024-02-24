<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'user1',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt(1)
        ]);
        User::create([
            'name' => 'superadmin',
            'role' => 'admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt(1)
        ]);
        User::create([
            'name' => 'kasir',
            'role' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt(1)
        ]);
        User::create([
            'name' => 'owner',
            'role' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt(1)
        ]);

        Category::create([
            'nama' => 'Music'
        ]);
        Category::create([
            'nama' => 'Jejepangan'
        ]);

        Event::create([
            'nama' => 'Ed Sheeran: +-=÷x TOUR in Jakarta',
            'harga' => 1000000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/ed.jpg',
            'status' => 'active',
            'stok' => 2000,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 1,
        ]);

        Event::create([
            'nama' => 'IMPACTNATION JAPAN FESTIVAL 2024',
            'harga' => 55000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/impactnation.jpg',
            'status' => 'active',
            'stok' => 700,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 2,
        ]);

        Event::create([
            'nama' => 'Mukashi Fest Vol.3: BACK TO SPARK!',
            'harga' => 35000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/mukashi3.jpg',
            'status' => 'active',
            'stok' => 300,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 2,
        ]);

        Event::create([
            'nama' => 'Comic Frontier 16',
            'harga' => 65000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/comifuro16.jpg',
            'status' => 'active',
            'stok' => 1000,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 2,
        ]);
        Event::create([
            'nama' => 'KARAWANG ANICOSMIC 2.0',
            'harga' => 35000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/anicosmic.jpg',
            'status' => 'active',
            'stok' => 500,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 2,
        ]);
       
        Event::create([
            'nama' => 'InfoSmi Festival 2023',
            'harga' => 80000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/smi1.jpg',
            'status' => 'active',
            'stok' => 400,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 1,
        ]);
        Event::create([
            'nama' => 'InfoSmi X NAMA',
            'harga' => 50000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/smi2.jpg',
            'status' => 'active',
            'stok' => 250,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 1,
        ]);
        
        Event::create([
            'nama' => 'Mukashi Vol. 2 - Summer Festival',
            'harga' => 35000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/mukashi2.jpg',
            'status' => 'active',
            'stok' => 300,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 2,
        ]);
        Event::create([
            'nama' => ' IIMS Infinite Live 2024',
            'harga' => 65000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/infinite.jpg',
            'status' => 'active',
            'stok' => 250,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 1,
        ]);
        Event::create([
            'nama' => 'OUR DREAM FEST',
            'harga' => 25000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/ourdream.jpg',
            'status' => 'active',
            'stok' => 300,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 2,
        ]);
        
        Event::create([
            'nama' => 'Ruang Indonesia Festival',
            'harga' => 65000,
            'lokasi' => 'ICE(Indonesia Convention Exhibition) BSD Hall 8-9-10',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7204187579623!2d106.63194558885499!3d-6.3004201999999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition%20(ICE)%20BSD%20City!5e0!3m2!1sen!2sid!4v1707218696296!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'foto' => 'img/ri.jpg',
            'status' => 'active',
            'stok' => 350,
            'tanggal' => date('Y-m-d', strtotime('11-03-2023')),
            'waktu' => date('H:i:s', strtotime('08:00:00')),
            'category_id' => 1,
        ]);

       
    }
}
