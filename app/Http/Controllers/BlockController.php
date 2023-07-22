<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Hour;
use App\Models\Quantity;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index()
    {
        $segunda = Day::where('name', 'segunda')->first();
        $terca = Day::where('name', 'terça')->first();
        $quarta = Day::where('name', 'quarta')->first();
        $quinta = Day::where('name', 'quinta')->first();
        $sexta = Day::where('name', 'sexta')->first();
        $sabado = Day::where('name', 'sabado')->first();
        $hoursSeg = Hour::where('day_id', 1)->get();
        $hoursTer = Hour::where('day_id', 2)->get();
        $hoursQua = Hour::where('day_id', 3)->get();
        $hoursQui = Hour::where('day_id', 4)->get();
        $hoursSex = Hour::where('day_id', 5)->get();
        $hoursSab = Hour::where('day_id', 6)->get();

        $schedules = Schedule::all();

        $users = [];
        foreach ($schedules as $schedule) {
            $data = [
                'name' => User::find($schedule->user_id)->name,
                'userId' => User::find($schedule->user_id)->id,
                'hour' => Hour::find($schedule->hour_id)->hour,
                'day' => Hour::find($schedule->hour_id)->day_name,
                'hourId' => Hour::find($schedule->hour_id)->id,
                'hourStatus' => Hour::find($schedule->hour_id)->status
            ];

            $users[] = $data;
        }
        
        $qtdAllowedUsers = Quantity::all()->first();

        return view('pages.blocks', [
            'users' => $users,
            'quantity' => $qtdAllowedUsers->quantity,
            'segunda' => $segunda,
            'terca' => $terca,
            'quarta' => $quarta,
            'quinta' => $quinta,
            'sexta' => $sexta,
            'sabado' => $sabado,
            'hoursSeg' => $hoursSeg,
            'hoursTer' => $hoursTer,
            'hoursQua' => $hoursQua,
            'hoursQui' => $hoursQui,
            'hoursSex' => $hoursSex,
            'hoursSab' => $hoursSab,
        ]);
    }

    public function alterStatus($id)
    {
        $day = Day::where('id', $id)->first();

        $hours = Hour::where('day_id', $id)->get();


        // for ($i = 0; $i < count($hours); $i++) {
        //     if ($hours[$i]['status'] == 0) {
        //         Hour::where(['day_id' => $id])->update(['status' => '1']);
        //     }

        //     if ($hours[$i]['status'] == 1) {
        //         Hour::where(['day_id' => $id])->update(['status' => '0']);
        //     }
        // }

        if ($day->status == 1) {
            $day->status = 0;
            $day->save();
            for ($i = 0; $i < count($hours); $i++) {
                if ($hours[$i]['status'] == 1) {
                    Hour::where(['day_id' => $id])->update(['status' => '0']);
                }
            }
            return response()->json($day);
        }

        if ($day->status == 0) {
            $day->status = 1;
            $day->save();
            return response()->json($day);
        }
    }

    public function alterHourStatus($id)
    {
        $hour = Hour::where('id', $id)->first();

        if ($hour->status == 1) {
            $hour->status = 0;
            $hour->save();
            return response()->json($hour);
        }

        if ($hour->status == 0) {
            $hour->status = 1;
            $hour->save();
            return response()->json($hour);
        }

        // $day = Day::where('id', $id)->first();

        // $hours = Hour::where('day_id', $id)->get();



        // for ($i = 0; $i < count($hours); $i++) {
        //     if ($hours[$i]['status'] == 0) {
        //         Hour::where(['day_id' => $id])->update(['status' => '1']);
        //     }

        //     if ($hours[$i]['status'] == 1) {
        //         Hour::where(['day_id' => $id])->update(['status' => '0']);
        //     }
        // }


        // if ($day->status == 1) {
        //     $day->status = 0;
        //     $day->save();
        //     return response()->json($day);
        // }

        // if ($day->status == 0) {
        //     $day->status = 1;
        //     $day->save();
        //     return response()->json($day);
        // }
    }
}
