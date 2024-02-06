<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function retrieveSuggestion() {
        $inputValue = $_POST['inputValue'];
        
        $users = User::all();
        for ($i=0; $i < count($users); $i++) { 
            if($inputValue==$users[$i]->name){
                $events = [
                    $inputValue.fake()->randomNumber(3 , true),
                    $inputValue.fake()->randomNumber(3 , true),
                    $inputValue.fake()->randomNumber(3 , true),
                    $inputValue."Béla",
                ];
            }
            else {
                $events = [
                    $inputValue.fake()->randomNumber(3 , true),
                    $inputValue."Béla",
                    'Gazsi'.fake()->randomNumber(6, true),
                    'asd123',
                ];
            }
        }

        $hint = "";
        $found = false; //bool

        if ($inputValue !== "") {
            $inputValue = strtolower($inputValue);
            $len=strlen($inputValue);
            foreach($events as $name) {
              if (stristr($inputValue, substr($name, 0, $len))) {
                if ($hint === "") {
                  $hint = $name;
                  $found = true;
                } else {
                  $hint .= ", $name";
                }
              }
            }
          }

          if (!$found) {
            $hint = "No suggestion";
          }

        return response()->json(array('msg'=> $hint), 200);
    }
}
