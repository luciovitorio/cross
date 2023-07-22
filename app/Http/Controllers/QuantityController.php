<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quantity as QuantityRequest;
use App\Models\Quantity;
use Illuminate\Http\Request;

class QuantityController extends Controller
{
    public function update(QuantityRequest $request)
    {
        $quantity = Quantity::where('id', 1)->first();

        $quantity->fill($request->all());

        $quantity->save();

        return redirect()->route('block.index');
    }
}
