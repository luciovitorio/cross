<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedule as ScheduleRequest;
use App\Models\Hour;
use App\Models\Quantity;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(ScheduleRequest $request)
    {
        $schedule = Schedule::where('user_id', $request->user_id)->first();

        if ($schedule) {
            Schedule::findOrFail($schedule->id)->delete();
            $hour = Hour::where('id', $schedule->hour_id)->first();
            $total = $hour->total;
            $hour->total = $total - 1;
            $hour->save();
        }

        $qtdAllowedUsers = Quantity::all()->first();

        $hour = Hour::where('id', $request->hour_id)->first();

        if ($qtdAllowedUsers->quantity == $hour->total) {
            return;
        }

        $total = $hour->total + 1;

        $hour->total = $total;

        $hour->save();

        $scheduleCreate = Schedule::create($request->all());

        return response()->json($scheduleCreate);
    }

    public function index($hourId, $dayId)
    {
        $schedules = Schedule::where('hour_id', $hourId)->where('day_id', $dayId)->get();

        $users = [];
        foreach ($schedules as $schedule) {
            $users[] = User::find($schedule->user_id);
        }

        return $users;
    }

    public function delete($hourId, $userId)
    {
        $hour = Hour::where('id', $hourId)->first();
        $total = $hour->total;
        $hour->total = $total - 1;
        $hour->save();

        $schedule = Schedule::where('user_id', $userId)->delete();

        return response()->json($schedule);
    }

    public function reset()
    {
        DB::table('schedules')->delete();
        DB::table('hours')->update(['total' => 0]);
        return response()->json();
    }
}
