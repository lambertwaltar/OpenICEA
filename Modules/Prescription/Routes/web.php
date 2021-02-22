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

// Route::prefix('prescription')->group(function() {
//     Route::get('/', 'PrescriptionController@index');
// });

//prescription
Route::get('/newprescription', 'PrescriptionController@newPrescriptionForm')->name('newprescription');
Route::post('/createprescription', 'PrescriptionController@createPrescription')->name('createprescription');
Route::get('/editprescription', 'PrescriptionController@editPrescription')->name('editprescription');
Route::post('/updateprescription', 'PrescriptionController@updatePrescription')->name('updateprescription');
Route::get('/deleteprescription', 'PrescriptionController@deletePrescription')->name('deleteprescription');
Route::get('/prescriptions', 'PrescriptionController@prescriptions')->name('prescriptions');
Route::get('/prescriptionsforencounter', 'PrescriptionController@prescriptionForEncounter')->name('prescriptionsforencounter');

//prescription Item
Route::get('/createprescriptionitem', 'PrescriptionController@createPrescriptionItem')->name('createprescriptionitem');
Route::get('/deleteprescriptionitem', 'PrescriptionController@deletePrescriptionItem')->name('deleteprescriptionitem');

//store routes
Route::get('/getallstores', 'PrescriptionController@getAllStores')->name('getallstores');
Route::get('/newstoreform', 'PrescriptionController@newStoreForm')->name('newstoreform');
Route::get('/deletestore', 'PrescriptionController@deleteStore')->name('deletestore');
Route::post('/createstore', 'PrescriptionController@CreateStore')->name('createstore');

//Funding Source routes
Route::get('/getallfundingsources', 'PrescriptionController@getAllFundingSources')->name('getallfundingsources');
Route::get('/newfundingsourceform', 'PrescriptionController@newFundingSourceForm')->name('newfundingsourceform');
Route::get('/deletefundingsource', 'PrescriptionController@deleteFundingSource')->name('deletefundingsource');
Route::post('/createfundingsource', 'PrescriptionController@createFundingSource')->name('createfundingsource');

//Condition routes
Route::get('/getallconditions', 'PrescriptionController@getAllConditions')->name('getallconditions');
Route::get('/newconditionform', 'PrescriptionController@newConditionForm')->name('newconditionform');
Route::get('/deletecondition', 'PrescriptionController@deleteCondition')->name('deletecondition');
Route::post('/createcondition', 'PrescriptionController@createCondition')->name('createcondition');

//Location routes
Route::get('/getalllocations', 'PrescriptionController@getAllLocations')->name('getalllocations');
Route::get('/newlocationform', 'PrescriptionController@newLocationForm')->name('newlocationform');
Route::get('/deletelocation', 'PrescriptionController@deleteLocation')->name('deletelocation');
Route::post('/createlocation', 'PrescriptionController@createLocation')->name('createlocation');

//Unit Description routes
Route::get('/getallunitdescreptions', 'PrescriptionController@getAllUnitDescriptions')->name('getallunitdescreptions');
Route::get('/newunitdescreptionform', 'PrescriptionController@newUnitDescriptionForm')->name('newunitdescreptionform');
Route::get('/deleteunitdescreption', 'PrescriptionController@deleteUnitDescription')->name('deleteunitdescreption');
Route::post('/createunitdescreption', 'PrescriptionController@createUnitDescription')->name('createunitdescreption');

//Unit of Measurement routes
Route::get('/getallunitsofmeasurement', 'PrescriptionController@getAllUnitsOfMeasurement')->name('getallunitsofmeasurement');
Route::get('/newunitofmeasurementform', 'PrescriptionController@newUnitOfMeasurementForm')->name('newunitofmeasurementform');
Route::get('/deleteunitofmeasurement', 'PrescriptionController@deleteUnitOfMeasurement')->name('deleteunitofmeasurement');
Route::post('/createunitofmeasurement', 'PrescriptionController@createUnitOfMeasurement')->name('createunitofmeasurement');

//Schedule routes
Route::get('/getallschedules', 'PrescriptionController@getAllSchedules')->name('getallschedules');
Route::get('/newscheduleform', 'PrescriptionController@newScheduleForm')->name('newscheduleform');
Route::get('/deleteschedule', 'PrescriptionController@deleteSchedule')->name('deleteschedule');
Route::post('/createschedule', 'PrescriptionController@createSchedule')->name('createschedule');

//Product Group routes
Route::get('/getallproductgroups', 'PrescriptionController@getAllProductGroups')->name('getallproductgroups');
Route::get('/newproductgroupform', 'PrescriptionController@newProductGroupForm')->name('newproductgroupform');
Route::get('/deleteproductgroup', 'PrescriptionController@deleteProductGroup')->name('deleteproductgroup');
Route::post('/createproductgroup', 'PrescriptionController@createProductGroup')->name('createproductgroup');

//drug routes
Route::get('/getalldrugs', 'PrescriptionController@getAllDrugs')->name('getalldrugs');
Route::get('/newdrugform', 'PrescriptionController@newDrugForm')->name('newdrugform');
Route::get('/deletedrug', 'PrescriptionController@deleteDrug')->name('deletedrug');
Route::post('/createdrug', 'PrescriptionController@createDrug')->name('createdrug');
Route::get('/selectdrug', 'PrescriptionController@SelectDrug')->name('selectdrug');

//regimen routes
Route::get('/getallregimens', 'PrescriptionController@getAllRegimens')->name('getallregimens');
Route::get('/newregimenform', 'PrescriptionController@newRegimenForm')->name('newregimenform');
Route::get('/deleteregimen', 'PrescriptionController@deleteRegimen')->name('deleteregimen');
Route::post('/createregimen', 'PrescriptionController@createRegimen')->name('createregimen');

//Stock routes
Route::get('/stock', 'PrescriptionController@stockItems')->name('stock');
Route::get('/newitemform', 'PrescriptionController@newItemForm')->name('newitemform');
Route::get('/deletestockitem', 'PrescriptionController@deleteStockItem')->name('deletestockitem');
Route::post('/createstockitem', 'PrescriptionController@createStockItem')->name('createstockitem');
Route::post('/editstockitem', 'PrescriptionController@editStockItem')->name('editstockitem');