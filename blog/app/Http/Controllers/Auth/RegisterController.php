<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Providers\RouteServiceProvider;
use App\Model\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        try {
            $users = DB::table('users')->select('*')->get();
            // $request->user()->authorizeRoles(['vendedor', 'admin']);
            return view('auth/register', compact('users'));
        } catch (\Exception $error) {
            return $error;
        }
    }
    protected function validator(array $data)
    {
        try {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        } catch (\Exception $error) {
            return $error;
        }
    }

    protected function create(array $data)
    {
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rol_id' => $data['role'],
            ]);

            $user->roles()->attach(Role::where('name', 'user')->first());
            return $user;
        } catch (Exception $error) {
            return $error;
        }
    }
    public function delete($id){
        try{
            User::where('id', $id)->delete();
            return redirect()->back();
        } catch(\Exception $error){
            return $error;
        }
    }
    public function editar(Request $request, $id){
        try{
            User::where('id', $id)->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                // 'rol_id' => $request->get('rol_id'),
            ]);
            return redirect()->back();
        } catch(\Exception $error){
            return $error;
        }
    }
}
