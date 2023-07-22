<?php

namespace App\Http\Controllers;

use App\Http\Requests\Alert as AlertRequest;
use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::orderBy('id', 'DESC')->get();

        return view('pages.alerts', [
            'alerts' => $alerts
        ]);
    }

    public function store(AlertRequest $request)
    {
        $alertCreate = Alert::create($request->all());
        return response()->json($alertCreate);
    }

    public function edit($id)
    {
        $alert = Alert::findOrFail($id);

        return response()->json($alert);
    }

    public function update(AlertRequest $request, $id)
    {
        $alert = Alert::where('id', $id)->first();

        $alert->fill($request->all());

        $alert->save();

        return response()->json($alert);
    }

    public function delete($id)
    {
        $alert = Alert::findOrFail($id)->delete();

        return response()->json($alert);
    }
}
