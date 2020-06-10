<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecepcionistaRequest;
use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    //

    function guardarPass(StoreRecepcionistaRequest $request)
    {
        $recepcionista = RecepcionistaModel::update($request);

        return $recepcionista->id;
    }
}
