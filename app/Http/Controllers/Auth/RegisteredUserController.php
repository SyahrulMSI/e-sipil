<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('auth.register');
        return abort(403);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telp' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_telp'   => $request->no_telp,
            'role'  =>  3,
            'password' => Hash::make($request->password),
        ]);

       $result =  event(new Registered($user));


        if($result){
        Auth::login($user);
        Alert::success('Success', 'Selamat, Pendaftaran anda berhasil. Silahkan Login !');
        // return redirect(RouteServiceProvider::HOME);
        return redirect('customer.dashboard.index');
        } else {
            Alert::error('Error', 'Selamat, Pendaftaran anda berhasil. Silahkan Ulangi Kembali !');
        }


    }
}
