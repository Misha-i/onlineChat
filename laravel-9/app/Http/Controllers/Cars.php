<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;

class Cars extends Controller
{
    public static function paginate()
    {
    }

    public function submit(CarRequest $req) {

        $car = new Car();
        $car = $req->input('car');

        $car->save();

        return redirect()->route('layout1');

    }

}
