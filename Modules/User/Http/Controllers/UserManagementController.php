<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use DB;
use Modules\User\Entities\User;
use Modules\Patient\Entities\Clinician;
use Modules\User\Entities\Settings;
//use Modules\User\Entities\Role;
use Crypt,Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserManagementController extends Controller
{


    //============dump and die============
    function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
    }
    //==============================
    
    
    public function __construct(){
        //apply Administrator middleware to controller methods
   
        $this->middleware(['auth', 'is_locked_out', 'is_approved','is_admin']);
        //$this->middleware(['auth', 'is_locked_out', 'is_approved', 'is_admin']);
    }

    

    public function index()
    {   
            $users = User::all();
            return view('user::management.index', ['users'=>$users])->with('roles');           
    }

    // ==========================Approve User=====================
    public function approveUser($id)
    {   
           
        DB::table('users') ->where('OID', request()->id)->update(['IsApproved' => '1']);
        toastr()->success('System User Approved');
        return redirect()->route('user-management');
        // return redirect()->route('user-management')->with('success', ' System User Approved');
    }
    // ==========================Approve User=====================


    // ==========================Display Master Lists===================== 
    public function master()
    {   
        return view('user::management.masterlist');
    }
    // ==========================Display Master Lists=====================
    
    
    // ==========================Edit User=====================
    public function editUser()
    {
        $id = Crypt::decrypt(request()->id);
        $user = User::find($id);
        $roles = Role::all();
        return view('user::management.edituser', compact('user'), compact('roles'));
    }
    

    
    public function updateUser()
    {   
        if(request()->password !=""){
            request()->validate([
                'firstname' => 'required',
                'lastname' =>'required',
                'email' => 'required|email',
                'password' => 'confirmed|required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                ], 
                ['confirmed' =>'Passwords do not match.', 'regex'=>'Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.']);

            DB::table('users') ->where('OID', Crypt::decrypt(request()->oid))->update(['FirstName' =>request()->firstname, 'LastName'=>request()->lastname, 'EmailAddress'=>request()->email, 'password'=>Hash::make(request()->password)]);

        }

        else{

            request()->validate([
                'firstname' => 'required',
                'lastname' =>'required',
                'email' => 'required|email',
            ]);

            DB::table('users') ->where('OID', Crypt::decrypt(request()->oid))->update(['FirstName' =>request()->firstname, 'LastName'=>request()->lastname, 'EmailAddress'=>request()->email]);

        }

        if (isset(request()->isclinician)) {
            
            $clinician = new Clinician();
            $clinician->FirstName = request()->firstname;
            $clinician->Surname = request()->lastname;
            $clinician->active = 1;
            Log::info($clinician);
            $clinician->save();
        }
       

        $user = User::find(Crypt::decrypt(request()->oid));
        $user->syncRoles([]);
        if(empty(request()->roles)){
            return;
        }
        else{
           foreach(request()->roles as $role){
                $user->assignRole($role);
            }
         
        }
        
        //return redirect()->route('user-management')->with('success', ' System User Updated');

        //
    }

    // ==========================Edit User=====================

    // ==========================Roles=====================
        public function viewRoles()
        {
            $roles = Role::with('permissions')->get();
            return view('user::management.roles', ['roles'=>$roles]);
        }

        public function newRoleForm()
        {
            $permissions = Permission::all();
            return view('user::management.addrole',compact('permissions'));
        }

        public function createRole()
        {
            request()->validate(['rolename' => 'required',]);  
            $role = Role::create(['name' => request()->rolename]);

            $permissions = explode(',', request()->permissions);
            foreach($permissions as $permission){
                $perm = Permission::find($permission);
                $perm->assignRole($role);
            }
        }

        public function deleteRole()
        {
            //Log::info(Crypt::decrypt(request()->id));
            $role = Role::destroy(request()->id);
            $data = Role::all();
            return response()->json($data);
        }

        public function newPermissionForm()
        {   
            
            return view('user::management.addpermission');
        }

        public function createPermission()
        {
            $permissions = explode(',', request()->permissionname);
            foreach($permissions as $perm){
              Permission::create(['name' => $perm]); 
            }
        }

        public function getPermissions()
        {   
            $id = Crypt::decrypt(request()->id);
            $data = Role::with('permissions')->where('id', $id)->get();
            return response()->json($data);
        }

        public function deletePermission()
        {
            $permission = Permission::destroy(request()->id);
            $data = Permission::all();
            return response()->json($data);
        }

        public function editRole()
        {
            $id = Crypt::decrypt(request()->id);
            request()->validate(['rolename' => 'required',]);
            
            $role=Role::find($id);
            $role->syncPermissions();
           // dd($role);
            $permissions = explode(',', request()->permissions);
            foreach($permissions as $permission){
                $perm = Permission::find($permission);
                $perm->assignRole($role);
            }
        }

        public function getAllPermissions()
        {
            $data = Permission::all();
            return response()->json($data);
        }

        public function getAllRoles()
        {
            $data = Role::with('permissions')->get();
            return response()->json($data);
        }

    // ==========================Roles=====================

    //=========================Account Management =============

    public function lockAccount()
    {
        $id = Crypt::decrypt(request()->id);
        $user = User::find($id);
        DB::table('users')->where('OID', $id)->update(['IsLockedOut' => '1', 'IsApproved' =>'0']);
        toastr()->success('User Account Locked');
        return redirect()->route('user-management');
    }

     public function unlockAccount()
    {
        $id = Crypt::decrypt(request()->id);
        DB::table('users') ->where('OID', $id)->update(['IsLockedOut' => '0', 'IsApproved' =>'1']);
        toastr()->success('User Account unlocked');
        return redirect()->route('user-management');
    }

    //=========================Account Management =============

    //Settings
        public function settings(){
            $settings = Settings::all();
            return view('user::management.settings', compact('settings'));
        }

        public function rASettings(){
            DB::table('settings') ->where('OID', request()->id)->update(['Status' =>request()->status]);
            $data = Settings::select('OID','Status')->where('OID', request()->id)->get();
            return response()->json($data);
        }


        public function returnAppointmentSetting(){
            $data = Settings::all();
            return response()->json($data);
        }

        public function fSSettings(){
            DB::table('settings') ->where('OID', request()->id)->update(['Status' =>request()->status]);
            $data = Settings::select('OID','Status')->where('OID', request()->id)->get();
            return response()->json($data);
        }
}
