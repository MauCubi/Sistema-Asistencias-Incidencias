<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Empleado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $empleado = Empleado::where('email',$data['email'])->first();
        if($empleado != null){
        return User::create([
            'name' => $empleado->nombre.' '.$empleado->apellido,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'empleado_id' => $empleado->id,
        ]);
        }else{
            return Redirect::to("register")->with('status','Error');
        }
    }


    public function register(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]            
        );
        $empleado = Empleado::where('email',$request['email'])->first();
        $user = User::where('email', $request['email'])->first();

        if($empleado != null){
        User::create([
            'name' => $empleado->nombre.' '.$empleado->apellido,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'empleado_id' => $empleado->id,
        ])->assignRole('Empleado');
            return Redirect::to("login")->with('status','Te registraste Correctamente');
        }else{
            return Redirect::to("register")->with('status','El email ingresado no corresponde a ningun empleado');
        }
        // $this->validator($request->all())->validate();
        // event(new Registered($user = $this->create([
        //     'name' => 'Juan',
        //     'email' => $request->email,
        //     'password' => Hash::make($request['password']),
        //     'empleado_id' => 5,
        // ])));
        
        // return $this->registered($request, $user)
        //    // ?: redirect($this->redirectPath());
        //   ?: redirect()->route('home')->with('success', 'You are successfully Registered!');
    }
}
