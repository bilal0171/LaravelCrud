<?php

namespace Database\Seeders;

use App\Models\UserDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userdetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
        {
         UserDetails::create([
            "name"=> "Bilal",
            "phone"=> "8281979938",
            "dob"=> "2003-07-12",
            "address"=> "Kalamassery",
            "Gender"=> "M"]);

            UserDetails::create([
                "name"=> "umar",
                "phone"=> "8156787229",
                "dob"=> "2000-05-15",
                "address"=> "Kalamassery",
                "Gender"=> "M"]);

                UserDetails::create([
                    "name"=> "ivin",
                    "phone"=> "8281979898",
                    "dob"=> "2002-01-25",
                    "address"=> "Perumabavoor",
                    "Gender"=> "M"]); 
        
       
        UserDetails::factory(10)->create();
        }

    
}

