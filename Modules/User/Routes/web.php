<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
    Route::get('registration', 'UserController@registration');
	Route::post('post-registration', 'UserController@postRegistration'); 
});
*/

	Route::get('/', 'UserController@index')->name('login');
	Route::post('/post-login', 'UserController@postLogin');
    Route::get('/registration', 'UserController@registration');
	Route::post('/post-registration', 'UserController@postRegistration');
	Route::get('/logout', 'UserController@logout')->name('logout');
	Route::get('/user-management', 'UserManagementController@index')->name('user-management');
	Route::get('/master-list', 'UserManagementController@master')->name('masterlists');

	Route::get('/approveuser/{id}', 'UserManagementController@approveUser')->name('approveuser');
	Route::get('/edituser', 'UserManagementController@editUser')->name('edituser');
	Route::post('/updateuser', 'UserManagementController@updateUser')->name('updateuser');
	Route::get('/lockaccount/{id}', 'UserManagementController@lockAccount')->name('lockaccount');
	Route::get('/unlockaccount/{id}', 'UserManagementController@unlockAccount')->name('unlockaccount');


	Route::get('/roles', 'UserManagementController@viewRoles')->name('roles');
	Route::get('/new_role', 'UserManagementController@newRoleForm')->name('new_role');
	Route::get('/createrole', 'UserManagementController@createRole')->name('createrole');
	Route::get('/deleterole', 'UserManagementController@deleteRole')->name('deleterole');
	Route::get('/newpermission', 'UserManagementController@newPermissionForm')->name('newpermission');
	Route::get('/createpermission', 'UserManagementController@createPermission')->name('createpermission');
	Route::get('/getpermissions', 'UserManagementController@getPermissions')->name('getpermissions');
	Route::get('/editrole', 'UserManagementController@editRole')->name('editrole');
	Route::get('/deletepermission', 'UserManagementController@deletePermission')->name('deletepermission');
	Route::get('/getallroles', 'UserManagementController@getAllRoles')->name('getallroles');
	Route::get('/getallpermissions', 'UserManagementController@getAllPermissions')->name('getallpermissions');

	Route::get('/settings', 'UserManagementController@settings')->name('settings');
	Route::get('/rasetting', 'UserManagementController@rASettings')->name('rasetting');
	Route::get('/returnappointmentsetting', 'UserManagementController@returnAppointmentSetting')->name('returnappointmentsetting');
	Route::get('/fssetting', 'UserManagementController@fSSettings')->name('fssetting');
	
