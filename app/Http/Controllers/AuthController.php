<?php

namespace App\Http\Controllers;

use App\Helpers\Datas;
use App\Models\Alert;
use App\Models\Day;
use App\Models\Hour;
use App\Models\Quantity;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // $user = User::where('id', 1)->first();
        // $user->password = bcrypt('12345');
        // $user->save();
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('index');
    }

    public function home()
    {
        $alert = Alert::all();

        $mesAtual = Datas::mesAtual();

        $qtdAllowedUsers = Quantity::all()->first();

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

        $mySchedule = Schedule::where('user_id', session('id'))->first();

        return view('dashboard', [
            'alerts' => $alert,
            'mesAtual' => $mesAtual,
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
            'mySchedule' => $mySchedule,
            'qtdAllowedUsers' => $qtdAllowedUsers
        ]);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->status == 0) {
            $json['message'] = 'Oops, usuário se encontra bloqueado!';
            $json['icon'] = 'error';

            return response()->json($json);
        }

        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = 'Oops, informe todos os dados para efetuar o login!';
            $json['icon'] = 'error';

            return response()->json($json);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = 'Oops, informe um e-mail válido!';
            $json['icon'] = 'error';

            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            $json['message'] = 'Oops, usuário e/ou senha não confere!';
            $json['icon'] = 'error';

            return response()->json($json);
        }


        session()->put('id', $user->id);
        session()->put('name', $user->name);
        session()->put('email', $user->email);
        session()->put('photo', $user->photo);

        $json['redirect'] = route('home');

        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
