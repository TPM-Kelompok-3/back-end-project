<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Leader;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            //team
            'teamName' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
            'userType' => ['required', 'in:binusian,non-binusian'],

            //leader
            'fullName' =>['required', 'string', 'max:255'],
            'email' =>['required', 'string','lowercase','email', 'max:255', Leader::class],
            'whatsappNumber' =>['required', 'numeric', 'min:9', 'max:12', 'unique:'],
            'lineID' =>['required', 'string', 'unique:'],
            'github' =>['required', 'string'],
            'birthPlace'=>['required', 'string'],
            'dob' =>['required', 'date'],
            'cv' =>['required', 'mimes:pdf,jpg,jpeg,png'],
            'flazzCard' =>['requiredIf:userType,binusian', 'mimes:pdf,jpg,jpeg,png'],
            'idCard' =>['requiredIf:userType,non-binusian', 'mimes:pdf,jpg,jpeg,png'],
        ]);

        // Jika validasi gagal, kirim pesan error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'teamName' => $request->teamName,
            'password' => Hash::make($request->password),
            'userType' => $request->userType
        ]);

        $file = $request->file('cv');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('/public/cv', $fileName, 'public');

        $file = $request->file('flazzCard');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('/public/flazzCard', $fileName, 'public');

        $file = $request->file('idCard');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('/public/idCard', $fileName, 'public');


        $leader = Leader::create([
            'fullName' => $request->fullName,
            'email' => $request->email,
            'whatsappNumber' => $request->whatsappNumber,
            'lineID' => $request->lineID,
            'github' => $request->github,
            'birthPlace' =>$request->birthPlace,
            'dob' =>$request->dob,
            'cv' =>$request->cv,
            'flazzCard' =>$request->flazzCard,
            'idCard' =>$request->idCard
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
