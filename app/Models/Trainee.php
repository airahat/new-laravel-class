<?php 
namespace App\Models;
class Trainee {

public static $trainees= [[
        "id" => 1,
        "name" => "Rahim",
        "email" => "rahim@example.com",
        "department" => "Computer Science",
        "is_active" => true,

    ],
    [
        "id" => 2,
        "name" => "Karim",
        "email" => "karim@example.com",
        "department" => "Electrical Engineering",
          "is_active" => true,
       
    ],
    [
        "id" => 3,
        "name" => "Nusrat",
        "email" => "nusrat@example.com",
        "department" => "Business Administration",
        "is_active" => false,
        
    ],
    [
        "id" => 4,
        "name" => "Samiul Islam",
        "email" => "samiul@example.com",
        "department" => "Mechanical Engineering",   
        "is_active" => true,
        
    ],
    [
        "id" => 5,
        "name" => "Tania Akter",
        "email" => "tania@example.com",
        "department" => "Civil Engineering",
        "is_active" => false,
     
    ]];
    
    public static function all() {
       return self::$trainees;
    //    return $this->$trainees;
    //    return Trainee::$trainees;
    }


    public static function findTrainee($id) {

        return collect(self::$trainees)->firstWhere('id', $id);

        }




}


?>