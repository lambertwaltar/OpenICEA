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

//=============================Sub Client Routes
	Route::get('/client-home', 'PatientController@index')->name('client-home');
	Route::get('/client-list', 'PatientController@list')->name('client-list');
	Route::get('/newclientform', 'PatientController@newClientForm')->name('newclientform');
	Route::post('/updateclient', 'PatientController@updatePatient')->name('updateclient');
	Route::get('/deleteclient', 'PatientController@deletePatient')->name('deleteclient');
	Route::post('/createclient', 'PatientController@createClient')->name('createclient');


//=============================Country Routes
	Route::get('/countries', 'DemographicsController@showCountries')->name('countries');
	Route::get('/newcountryform', 'DemographicsController@newCountryForm')->name('newcountryform');
	Route::get('/newcountry', 'DemographicsController@newCountry')->name('newcountry');
	Route::get('/deletecountry', 'DemographicsController@deleteCountry')->name('deletecountry');
	Route::get('/getcountries', 'PatientController@getCountries')->name('getcountries');

//=============================District Routes
	Route::get('/districts', 'DemographicsController@showDistricts')->name('districts');
	Route::get('/newdistrictform', 'DemographicsController@newDistrictForm')->name('newdistrictform');
	Route::get('/newdistrict', 'DemographicsController@newDistrict')->name('newdistrict');
	Route::get('/deletedistrict', 'DemographicsController@deleteDistrict')->name('deletedistrict');
	Route::get('/getdistricts', 'PatientController@getDistricts')->name('getdistricts');

//=============================County Routes
	Route::get('/counties', 'DemographicsController@showCounties')->name('counties');
	Route::get('/newcountyform', 'DemographicsController@newCountyForm')->name('newcountyform');
	Route::get('/newcounty', 'DemographicsController@newCounty')->name('newcounty');
	Route::get('/deletecounty', 'DemographicsController@deleteCounty')->name('deletecounty');
	Route::get('/getcounties', 'PatientController@getCounties')->name('getcounties');

//=============================Sub County Routes
	Route::get('/subcounties', 'DemographicsController@showSubcounties')->name('subcounties');
	Route::get('/newsubcountyform', 'DemographicsController@newSubcountyForm')->name('newsubcountyform');
	Route::get('/newsubcounty', 'DemographicsController@newSubcounty')->name('newsubcounty');
	Route::get('/deletesubcounty', 'DemographicsController@deleteSubcounty')->name('deletesubcounty');
	Route::get('/getsubcounties', 'PatientController@getSubcounties')->name('getsubcounties');

//=============================Parish Routes
	Route::get('/parishes', 'DemographicsController@showParishes')->name('parishes');
	Route::get('/newparishform', 'DemographicsController@newParishForm')->name('newparishform');
	Route::get('/newparish', 'DemographicsController@newParish')->name('newparish');
	Route::get('/deleteparish', 'DemographicsController@deleteParish')->name('deleteparish');
	Route::get('/getparishes', 'PatientController@getParishes')->name('getparishes');

//=============================Village Routes
	Route::get('/villages', 'DemographicsController@showVillages')->name('villages');
	Route::get('/newvillageform', 'DemographicsController@newVillageForm')->name('newvillageform');
	Route::get('/newvillage', 'DemographicsController@newVillage')->name('newvillage');
	Route::get('/deletevillage', 'DemographicsController@deleteVillage')->name('deletevillage');
	Route::get('/getvillages', 'PatientController@getVillages')->name('getvillages');

//=============================Religion Routes
	Route::get('/religions', 'DemographicsController@showReligions')->name('religions');
	Route::get('/newreligionform', 'DemographicsController@newReligionForm')->name('newreligionform');
	Route::get('/newreligion', 'DemographicsController@newReligion')->name('newreligion');
	Route::get('/deletereligion', 'DemographicsController@deleteReligion')->name('deletereligion');
	Route::get('/getreligions', 'PatientController@getReligions')->name('getreligions');

//=============================Tribe Routes
	Route::get('/tribes', 'DemographicsController@showTribes')->name('tribes');
	Route::get('/newtribeform', 'DemographicsController@newTribeForm')->name('newtribeform');
	Route::get('/newtribe', 'DemographicsController@newTribe')->name('newtribe');
	Route::get('/deletetribe', 'DemographicsController@deleteTribe')->name('deletetribe');
	Route::get('/gettribes', 'PatientController@getTribes')->name('gettribes');

//=============================Chart Location Routes
	Route::get('/chartlocations', 'DemographicsController@showChartLocations')->name('chartlocations');
	Route::get('/newchartlocationform', 'DemographicsController@newChartLocationForm')->name('newchartlocationsform');
	Route::post('/newchartlocation', 'DemographicsController@newChartLocation')->name('newchartlocation');
	Route::get('/deletechartlocation', 'DemographicsController@deleteChartLocation')->name('deletechartlocation');

//=============================Referral Routes
	Route::get('/referrals', 'DemographicsController@showReferrals')->name('referrals');
	Route::get('/newreferralform', 'DemographicsController@newReferralForm')->name('newreferralform');
	Route::post('/newreferral', 'DemographicsController@newReferral')->name('newreferral');
	Route::get('/deletereferral', 'DemographicsController@deleteReferral')->name('deletereferral');


//KCCA Clinic Routes
	Route::get('/kccaclinics', 'DemographicsController@showKCCAClinics')->name('kccaclinics');
	Route::get('/newkccaclinicform', 'DemographicsController@newKCCAClinicform')->name('newkccaclinicform');
	Route::post('/newkccaclinic', 'DemographicsController@newKCCAClinic')->name('newkccaclinic');
	Route::get('/deletekccaclinic', 'DemographicsController@deleteKCCAClinic')->name('deletekccaclinic');

//masterlist routes
	Route::get('/getalltribes', 'MasterlistController@getAllTribes')->name('getalltribes');
	Route::get('/getallreligions', 'MasterlistController@getAllReligions')->name('getallreligions');
	Route::get('/getalldistricts', 'MasterlistController@getAllDistricts')->name('getalldistricts');
	Route::get('/getallcounties', 'MasterlistController@getAllCounties')->name('getallcounties');
	Route::get('/getallsubcounties', 'MasterlistController@getAllSubcounties')->name('getallsubcounties');
	Route::get('/getallparishes', 'MasterlistController@getAllParishes')->name('getallparishes');
	Route::get('/getallvillages', 'MasterlistController@getAllVillages')->name('getallvillages');

//phone routes
	Route::get('/savephone', 'PatientController@savePhone')->name('savephone');
	Route::get('/getphone', 'PatientController@getPhone')->name('getphone');
	Route::get('/deletephone', 'PatientController@deletePhone')->name('deletephone');
	Route::get('/clientsearch', 'PatientController@searchClient')->name('clientsearch');

//encounter routes
	Route::get('/encounter', 'EncounterController@encounterForm')->name('encounter');
	Route::post('/createencounter', 'EncounterController@createEncounter')->name('createencounter');
	Route::get('/getallpatientencounters', 'EncounterController@getAllPatientEncounters')->name('getallpatientencounters');
	Route::get('/editencounterform', 'EncounterController@editencounterForm')->name('editencounterform');
	Route::post('/updateencounter', 'EncounterController@updateEncounter')->name('updateencounter');
	Route::get('/deleteencounter', 'EncounterController@deleteEncounter')->name('deleteencounter');

//Appointment route
	Route::get('/newappointmenttypeform', 'EncounterController@appointmentTypeForm')->name('newappointmenttypeform');
	Route::get('/getallappointmenttypes', 'EncounterController@getAllAppointmentTypes')->name('getallappointmenttypes');
	Route::get('/createappointmenttype', 'EncounterController@createAppointmentType')->name('createappointmenttype');
	Route::get('/deleteappointmenttype', 'EncounterController@deleteAppointmentType')->name('deleteappointmenttype');

//schedule appointment
	Route::get('/scheduleapointment', 'EncounterController@scheduleAppointment')->name('scheduleapointment');
	Route::get('/checkapointment', 'EncounterController@checkapointment')->name('checkapointment');
	Route::post('/saveappointment', 'EncounterController@saveAppointment')->name('saveappointment');
	Route::get('/patientappointment', 'EncounterController@patientAppointment')->name('patientappointment');
	Route::get('/enrolmenthistory', 'PatientController@enrolmentHistory')->name('enrolmenthistory');


//triage
	Route::get('/triageform', 'EncounterController@triageForm')->name('triageform');
	Route::post('/savetriage', 'EncounterController@createTriageDetails')->name('savetriage');
	Route::get('/gettriagedetail', 'EncounterController@getTriageDetail')->name('gettriagedetail');

//DSDM Type
	Route::get('/dsdmtypeform', 'PatientController@DSDMForm')->name('dsdmtypeform');
	Route::post('/savedsdmtype', 'PatientController@createDSDMType')->name('savedsdmtype');
	Route::get('/getdsdmtypes', 'PatientController@getDSDMTypes')->name('getdsdmtypes');
	Route::get('/deletedsdmtypes', 'PatientController@deleteDSDMType')->name('deletedsdmtypes');

//Client Monitoring Flowsheet
	Route::get('/flowsheets', 'ClientMonitoringFlowSheetController@index')->name('flowsheets');
	Route::get('/newflowsheet', 'ClientMonitoringFlowSheetController@newFlowSheet')->name('newflowsheet');
	Route::post('/saveflowsheet', 'ClientMonitoringFlowSheetController@saveFlowSheet')->name('saveflowsheet');
	Route::get('/editflowsheet', 'ClientMonitoringFlowSheetController@editFlowSheet')->name('editflowsheet');
	Route::post('/updateflowsheet', 'ClientMonitoringFlowSheetController@updateFlowSheet')->name('updateflowsheet');
	Route::get('/deleteflowsheet', 'ClientMonitoringFlowSheetController@deleteFlowSheet')->name('deleteflowsheet');

