<?php


// Route::prefix('laboratory')->group(function() {
//     Route::get('/labrequisitionform', 'LaboratoryController@index')->name('labrequisitionform');
//     Route::get('/createlabrequisitionform', 'LaboratoryController@index')->('createlabrequisitionform');
// });

Route::get('/labrequisitionform', 'LaboratoryController@requisitionForm')->name('labrequisitionform');
Route::get('/editrequisition', 'LaboratoryController@editLabRequisition')->name('editrequisition');
Route::get('/getlabrequisitiontests', 'LaboratoryController@getRequisitionTests')->name('getlabrequisitiontests');
Route::post('/createlabrequisition', 'LaboratoryController@createRequisition')->name('createlabrequisition');
Route::post('/updatelabrequisition', 'LaboratoryController@updateLabRequisition')->name('updatelabrequisition');
Route::get('/labrequisitions', 'LaboratoryController@showRequisitions')->name('labrequisitions');
Route::get('/deleterequisition', 'LaboratoryController@deleteRequisition')->name('deleterequisition');
//lab test
Route::get('/labtestform', 'LaboratoryController@labTestForm')->name('labtestform');
Route::post('/createlabtest', 'LaboratoryController@createLabeTest')->name('createlabtest');
Route::get('/getalllabtests', 'LaboratoryController@getAllLabTests')->name('getalllabtests');
Route::get('/deletelabtest', 'LaboratoryController@deleteLabTest')->name('deletelabtest');
//sample type
Route::get('/sampletypeform', 'LaboratoryController@sampleTypeForm')->name('sampletypeform');
Route::post('/createsampletype', 'LaboratoryController@createSampleType')->name('createsampletype');
Route::get('/getallsampletypes', 'LaboratoryController@getAllSampleTypes')->name('getallsampletypes');
Route::get('/deletesampletype', 'LaboratoryController@deleteSampleType')->name('deletesampletype');
Route::get('/getsampletests', 'LaboratoryController@getSampleTests')->name('getsampletests');

Route::get('/getnotifications', 'LaboratoryController@getNotifications')->name('getnotifications');
Route::post('/marknotifications', 'LaboratoryController@markNotifications')->name('marknotifications');

Route::get('/collectsample', 'LaboratoryController@collectSample')->name('collectsample');
Route::post('/updaterequisition', 'LaboratoryController@updateRequisition')->name('updaterequisition');
Route::get('/patientlabs', 'LaboratoryController@patientLabs')->name('patientlabs');
//submit results
Route::get('/submitgenresults', 'LaboratoryController@submitGenResults')->name('submitgenresults');
Route::post('/savegeneralresults', 'LaboratoryController@saveGeneralResults')->name('savegeneralresults');
Route::get('/submithivresults', 'LaboratoryController@submitHIVResults')->name('submithivresults');
Route::post('/savehivresults', 'LaboratoryController@saveHivResults')->name('savehivresults');
Route::get('/editresults', 'LaboratoryController@editResults')->name('editresults');
Route::post('/updateresults', 'LaboratoryController@updateResults')->name('updateresults');

Route::get('/viewresults', 'LaboratoryController@viewResults')->name('viewresults');
Route::get('/printresults','LaboratoryController@PrintResults')->name('printresults');
Route::get('/print','LaboratoryController@Print')->name('print');



