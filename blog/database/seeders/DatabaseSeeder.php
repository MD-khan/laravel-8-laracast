<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); # this will fix the unique conflict
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create([
            'name' => "Md khan"
        ]);

        # create seed wiht factory
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        //     // \App\Models\User::factory(10)->create();
        //     $user = User::factory()->create(); # will create one user

        //     $personal = Category::create([
        //         'name' => "Personal",
        //         'slug' => 'personal'
        //     ]);

        //     $politics = Category::create([
        //         'name' => "Politics",
        //         'slug' => 'politics'
        //     ]);

        //     $bussiness = Category::create([
        //         'name' => "Bussines",
        //         'slug' => 'bussines'
        //     ]);

        //     Post::create([
        //         'user_id' => $user->id,
        //         'category_id' => $personal->id,
        //         'title' => "Amazon's new role-playing game can help you build your AWS skills",
        //         'slug' => 'amazon-new-role',
        //         'body' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday 
        //                     and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.
        //                     Meanwhile, the leader of Russia’s delegation 
        //                     in diplomatic talks with Ukraine said the sides have narrowed their differences. The Ukrainian side said its position remained unchanged.
        //                     The invasion has touched off a burst of antiwar protests inside Russia, and the Moscow rally was surrounded by suspicions it was a Kremlin-manufactured display of patriotism. Several Telegram channels critical of the Kremlin reported that students and employees of state institutions in a number of regions were ordered by their superiors to attend rallies and concerts marking the eighth anniversary of Moscow’s annexation of Crimea, which was seized from Ukraine. 
        //                     Those reports could not be independently verified.</p>",
        //         'excerpt' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.</p>",
        //     ]);

        //     Post::create([
        //         'user_id' => $user->id,
        //         'category_id' => $bussiness->id,
        //         'title' => "Putin appears at big rally as troops press attack in Ukraine",
        //         'slug' => 'putin-new-role',
        //         'body' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday 
        //                     and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.
        //                     Meanwhile, the leader of Russia’s delegation 
        //                     in diplomatic talks with Ukraine said the sides have narrowed their differences. The Ukrainian side said its position remained unchanged.
        //                     The invasion has touched off a burst of antiwar protests inside Russia, and the Moscow rally was surrounded by suspicions it was a Kremlin-manufactured display of patriotism. Several Telegram channels critical of the Kremlin reported that students and employees of state institutions in a number of regions were ordered by their superiors to attend rallies and concerts marking the eighth anniversary of Moscow’s annexation of Crimea, which was seized from Ukraine. 
        //                     Those reports could not be independently verified.</p>",
        //         'excerpt' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.</p>",
        //     ]);

        //     Post::create([
        //         'user_id' => $user->id,
        //         'category_id' => $politics->id,
        //         'title' => "Should both the rich and poor in California receive $400 gas tax rebates?",
        //         'slug' => 'shpuld-new-role',
        //         'body' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday 
        //                     and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.
        //                     Meanwhile, the leader of Russia’s delegation 
        //                     in diplomatic talks with Ukraine said the sides have narrowed their differences. The Ukrainian side said its position remained unchanged.
        //                     The invasion has touched off a burst of antiwar protests inside Russia, and the Moscow rally was surrounded by suspicions it was a Kremlin-manufactured display of patriotism. Several Telegram channels critical of the Kremlin reported that students and employees of state institutions in a number of regions were ordered by their superiors to attend rallies and concerts marking the eighth anniversary of Moscow’s annexation of Crimea, which was seized from Ukraine. 
        //                     Those reports could not be independently verified.</p>",
        //         'excerpt' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.</p>",
        //     ]);

        //     Post::create([
        //         'user_id' => $user->id,
        //         'category_id' => $politics->id,
        //         'title' => "Newfold Digital Acquires YITH to Expand WooCommerce Expertise",
        //         'slug' => 'newfold-digital-role',
        //         'body' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday 
        //                     and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.
        //                     Meanwhile, the leader of Russia’s delegation 
        //                     in diplomatic talks with Ukraine said the sides have narrowed their differences. The Ukrainian side said its position remained unchanged.
        //                     The invasion has touched off a burst of antiwar protests inside Russia, and the Moscow rally was surrounded by suspicions it was a Kremlin-manufactured display of patriotism. Several Telegram channels critical of the Kremlin reported that students and employees of state institutions in a number of regions were ordered by their superiors to attend rallies and concerts marking the eighth anniversary of Moscow’s annexation of Crimea, which was seized from Ukraine. 
        //                     Those reports could not be independently verified.</p>",
        //         'excerpt' => "<p>Russian President Vladimir Putin appeared at a huge flag-waving rally at a packed Moscow stadium Friday and lavished praise on his troops fighting in Ukraine, three weeks into the invasion that has led to heavier-than-expected Russian losses on the battlefield and increasingly authoritarian rule at home.</p>",
        //     ]);
        // }
    }
}
