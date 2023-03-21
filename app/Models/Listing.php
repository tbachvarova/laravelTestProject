<?php
namespace App\Models;

class Listing {

    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'some descr text for 1'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'some descr text for 2'
            ]
        ];
    }

    public static function find($_id)
    {
        $listings = self::all();

        foreach ($listings as $listing){
            if($listing['id'] == $_id){
                return $listing;
            }
        }

    }

}
