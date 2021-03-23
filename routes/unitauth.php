<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'prevent_back_history'], function () {
    Route::get('/home', function () {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('unitauth')->user();
        //dd($users);
        return view('unitauth.home');
    })->name('home');
    Route::get('/register', function () {
        return back();
    });
    Route::get('Unit-user-profile', 'UnitAuthController@UnitProfile')->name('unit.user.profile');
    Route::get('sidebar', 'UnitAuthController@SidebarCount')->name('sidebar.count');
    Route::post('Unit-user-profile-update', 'UnitAuthController@UnitProfileUpdate')->name('unit.user.update');
    Route::post('Unit-user-profile-password-change', 'UnitAuthController@UnitProfilePasswordUpdate')->name('unit.user.passupdate');

    Route::get('home-page-data', 'UnitAuthController@HompageData')->name('home-page.data');

    Route::group(['middleware' => ['super-admin']], function () {
        /*======================================Cases=====================================*/
        /*new_case*/
        Route::get('new_case', 'MpAdminController@newcase_index')->name('new_case');
        Route::patch('case_update/{id}', 'MpAdminController@case_update')->name('case_update');
        /*forwardcase*/
        Route::get('forwardcase', 'MpAdminController@forwardcase_index')->name('forwardcase');
        /*drop_case*/
        Route::get('drop_case', 'MpAdminController@dropcase_index')->name('drop_case');
        Route::get('case_drop/{id}', 'MpAdminController@casedrop_store')->name('case_drop');
        /*all_cases*/
        Route::get('allcases', 'MpAdminController@allcases_index')->name('allcases');
        // mp case counter
        Route::get('mp-cases', 'MpAdminController@MpCases')->name('mp-case-counter');
        /*mpregister*/
        Route::post('mpregister', 'MpAdminController@mpregister_store')->name('mpregister');
        Route::post('sadminregister', 'MpAdminController@sadminregister_store')->name('sadminregister');
        /*==========================location==============================================*/
        Route::get('mp_location', 'MpAdminController@mplocation_index')->name('mp_location');
        Route::post('add_location', 'MpAdminController@location_store')->name('location');
        Route::patch('locatione_update/{id}', 'MpAdminController@locatione_update')->name('locatione_update');
        /*==========================endlocation==============================================*/
        /*==========================add_mp==============================================*/
        Route::get('add_mp', 'MpAdminController@mp_index')->name('add_mp');
        Route::post('mp_store', 'MpAdminController@mp_store')->name('mp_store');
        Route::patch('mp_update/{id}', 'MpAdminController@mp_update')->name('mp_update');
        /*==========================add_mp==============================================*/
        /*==========================user manager=============================================*/
        /*mp_access*/
        Route::get('mp_access', 'MpAdminController@mpaccess_index')->name('mp_access');
        Route::patch('mpuser_update/{id}', 'MpAdminController@mpuser_update')->name('mpuser_update');
        /*systemadmin_access*/
        Route::get('systemadmin_access', 'MpAdminController@systemadminaccess_index')->name('systemadmin_access');
        Route::patch('deskuser_update/{id}', 'MpAdminController@deskuser_update')->name('deskuser_update');
        /*==========================end user manager=============================================*/
        /*==========================filter_searchnewcase=========================================*/
        Route::post('filter_allcase', 'MpAdminController@filter_allcase')->name('filter_allcase');
        Route::post('filter_searchnewcase', 'MpAdminController@filter_searchnewcase')->name('filter_searchnewcase');
        Route::post('filter_forwaredcase', 'MpAdminController@filter_forwaredcase')->name('filter_forwaredcase');
        Route::post('filter_dropcase', 'MpAdminController@filter_dropcase')->name('filter_dropcase');

        Route::get('vehicle-track', 'MpAdminController@VehicleTracking')->name('vehicle.tracking');
        /*==========================filter_searchnewcase=========================================*/
        //user management system
        Route::get('Unit-user', 'UnitAuthController@UnitUser')->name('unit-user');
        Route::get('unit-user-data', 'UnitAuthController@UnitUserajax')->name('unit-user-ajax');
        Route::post('Unit-user-store', 'UnitAuthController@unitUserStore')->name('unit-user-store');
        Route::post('Unit-user-update', 'UnitAuthController@unitUserUpdate')->name('unit-user-update');
        Route::post('Unit-user-delete', 'UnitAuthController@unitUserDelete')->name('unituser.delete');
        Route::post('Unit-user-active', 'UnitAuthController@unitUserActive')->name('unituser.active');
        Route::get('Unit-user-find', 'UnitAuthController@unitUserFind')->name('unit-user-find');
    });

    Route::patch('case_update/{id}', 'SystemAdminCotroller@case_update')->name('case_update');
    Route::get('case_update/find/{id}', 'SystemAdminCotroller@findcase')->name('find.case');

    Route::group(['middleware' => ['sub-admin']], function () {

        /*Register Case*/
        Route::get('case_register_home-subadmin', 'SystemAdminCotroller@case_register_home')->name('case_register_home.sub-admin');
        Route::post('register_case-subadmin', 'SystemAdminCotroller@registercase_store')->name('register_case.subadmin');
        /*End Register Case*/
        /*newcaselist*/
        Route::get('newcaselist', 'SystemAdminCotroller@new_caselist')->name('newcaselist');
        /*End newcaselist*/
        /*comletnewcase*/
        Route::get('comletnewcase', 'SystemAdminCotroller@complet_caselist')->name('completnewcase');
        /*forward_offsofficer*/
        Route::get('forward_offsofficer', 'SystemAdminCotroller@forwardoffsofficer_index')->name('forward_offsofficer');


        Route::patch('caseforward', 'SystemAdminCotroller@forwardallstore')->name('caseforward');

        /*end forward_offsofficer*/
        /*allcase*/
        Route::get('allcase', 'SystemAdminCotroller@allcase_index')->name('allcase');
        /*allcase*/
        /*================================filter_case===============================*/
        Route::post('search_case', 'SystemAdminCotroller@search_case')->name('search_case');
        Route::post('search_case_complet', 'SystemAdminCotroller@search_case_complet')->name('search_case_complet');
        Route::post('filter_forwardcase', 'SystemAdminCotroller@filter_forwardcase')->name('filter_forwardcase');
        Route::post('filter_allcase', 'SystemAdminCotroller@filter_allcase')->name('filter_allcase');
        /*==============================End filter_case=============================*/
        /*print_allcase*/
        Route::get('print_allcase', 'SystemAdminCotroller@allcase_print')->name('print_allcase');
        /*End print_allcase*/
    });
    Route::get('caseforward_single/{id}', 'SystemAdminCotroller@caseforwardsingle_store')->name('caseforward_single');
    Route::group(['middleware' => ['mp-admin']], function () {
        Route::get('register_case', 'MpController@registercasedetails_index')->name('register_case');
        /*=============================userregister_case==============================*/
        Route::post('userregister_case', 'MpController@userregister_case')->name('userregister_case');
        /*=============================end userregister_case==============================*/
    });
    Route::get('case_register_home', 'MpController@case_register_home')->name('case_register_home');

    Route::post('register_case', 'MpController@registercase_store')->name('register_case');

    Route::patch('case_update', 'MpController@case_update')->name('case_update');

    //api//
    Route::get('register-case-super-admin', 'CaseAPIController@RegisterCaseSuperAdmin')->name('register.case.data');
    Route::get('new_case_subadmin', 'CaseAPIController@Newcase_unit_subadmin')->name('newcase.subadmin');
    Route::get('all_case_subadmin', 'CaseAPIController@allcase')->name('allcase.subadmin');
    Route::get('forward_case_subadmin', 'CaseAPIController@forwardCase')->name('forward.subadmin');
    Route::get('new-case-complete', 'CaseAPIController@newcasecomplete')->name('new-complete.subadmin');
    Route::get('register-case-mp-unit', 'CaseAPIController@registercaseunitmp')->name('mp-unit.register-case');
    Route::get('drop-case', 'CaseAPIController@dropcase')->name('dropcase');

    Route::get('unit-user-details', 'CaseAPIController@UnitUserajax')->name('unit-user.details');
    Route::get('packet-check/{id}', 'CaseAPIController@Checkpacket')->name('packet.check');
    //Route::get('unit-user-details','CaseAPIController@Allunituser')->name('unit-user.details');


    Route::get('case_finder', 'SystemAdminCotroller@Case_finder')->name('case.finder');
    Route::post('case_finder', 'SystemAdminCotroller@Case_finderPost')->name('case.finder.post');



    Route::get('forward-report', 'SystemAdminCotroller@ForwardReport')->name('forwad.report');

    Route::get('forward-report-{date}', 'SystemAdminCotroller@ForwardReportDate')->name('forwad.report.date');
    Route::get('case-slip/{id}', 'SystemAdminCotroller@CaseSlip')->name('case-slip');
});
