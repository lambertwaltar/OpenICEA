<?php


namespace Modules\User\Http\Controllers;
//use Redirect;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\User;
use Validator,Redirect,Response;
use Session, DB;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Modules\User\Events\SuccessfulLogin;

class UserController extends Controller
{   

   // protected $username = 'username';

      /**
 * Get the login username to be used by the controller.
 *
 * @return string
 */
    public function username()
    {
        return 'username';
    }

 
    public function __construct(){
     
        //$this->middleware(['is_locked_out','is_approved','auth'])->except(['index', 'registration', 'postLogin', 'postRegistration']);
        $this->middleware(['is_locked_out','is_approved','auth'])->except(['index', 'registration', 'postLogin', 'postRegistration']);
    }

    //============dump and die============
    function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
    }
    //==============================


    public function index()
    {   
        //dd(Auth::check());
        return view('user::log');
    }

    public function registration()
    {
        return view('user::reg');
    }


    //===================handles the login process=================================
        public function postLogin(Request $request)
        {
            request()->validate(['username' => 'required', 'password' => 'required',]);  
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)){
                event(new SuccessfulLogin());

                //toastr()->info('Welcome '.auth()->user()->FirstName.' '.auth()->user()->LastName);
                return redirect()->route('client-home');  
               

                // if(auth()->user()->hasRole('Super Admin')){
                //     toastr()->info('Welcome '.auth()->user()->FirstName.' '.auth()->user()->LastName);
                //     return redirect()->route('client-home');
                // }

                // if(auth()->user()->can('collect lab samples')){
                //     toastr()->info('Welcome '.auth()->user()->FirstName.' '.auth()->user()->LastName);
                //     return redirect()->route('labrequisitions'); 
                // }            
                
                
            }
            //Authentication Failed.
            toastr()->error('Invalid Login credentials','Try Again');
            return Redirect::back()->withInput($request->except('password')); //
        }
    //===================handles the login process=================================


    //===========================Register new user=================================
        public function postRegistration(Request $request)
        {  
            request()->validate([
            'username' => 'required|unique:users,username',
            'firstname' => 'required',
            'lastname' =>'required',
            'email' => 'required|email|unique:users,EmailAddress',
            'password' => 'confirmed|required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ], 
            ['confirmed' =>'Passwords do not match.', 'regex'=>'Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.']);
      
            $data = $request->all();
     
            $check = $this->createUser($data);
            toastr()->success('User successfuly created');
            return Redirect::to("/");
        }

     //===========================Register new user=================================

    //===========================Create user=================================
        public function createUser(array $data)
        {
            return User::create([
            'username' => $data['username'],
            'FirstName' => $data['firstname'],
            'LastName' => $data['lastname'],
            'EmailAddress' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
        }
    //===========================Create user=================================

   //===========================Logout=================================
        public function logout() {
            //dd(request()->session);
            if(request()->session){
				Session::flush();
				Auth::logout();
				Session::flash('error','Logged out due to inactivity');
				return Redirect("/");
            }


            Session::flush();
            Auth::logout();
            toastr()->success('Logged Out, Goodbye!!!');
            return Redirect("/");
            // return Redirect("/")->withSuccess('Successfully Logged Out');
        }

    //===========================Logout=================================
}
