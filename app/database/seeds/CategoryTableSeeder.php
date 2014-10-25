<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Api\Models\Category as Category;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {

        Category::create(['text' => "Active Life"], ['text' => "Agriculture and Farming"], ['text' =>
            "Arts and Crafts"], ['text' => "Bank and Finance"], ['text' =>
            "Building and Construction"], ['text' => "Education and Institutes"], ['text' =>
            "Electrical and Electronic Equipments"], ['text' => "Electronics"], ['text' =>
            "Energy and Power"], ['text' => "Environment"], ['text' => "Food and Beverages"], ['text' =>
            "Health And Medical"], ['text' => "Heavy Equipment and Industries"], ['text' =>
            "Home and Office"], ['text' => "Import and Export Merchants"], ['text' =>
            "Industrial Products"], ['text' => "Information and Communication Technology"], ['text' =>
            "Lifestyle"], ['text' => "Manufacturers"], ['text' => "Media and Entertainment"], ['text' =>
            "Professional Services"], ['text' => "Public and Private Institutions"], ['text' =>
            "Transport and Logistics"], ['text' => "Travel and Tourism"], ['text' =>
            "Utilities"], ['text' => "Vehicles"]);
    }

}
