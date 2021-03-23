<?php

use App\Http\Controllers\SuperAdminAPIController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::group(['middleware' => 'prevent_back_history'], function () {
    Route::get('/home', function () {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('superadmin')->user();
        return view('superadmin.home');
    })->name('home');
    Route::get('/register', function () {
        return back();
    });

    Route::group(['middleware' => ['dcb-super-admin']], function () {
        Route::get('super-admin-profile', 'SuperAdminProfileController@profile')->name('profile');
        Route::post('super-admin-profile-update', 'SuperAdminProfileController@ProfileUpdate')->name('update');
        Route::post('super-admin-profile-password-change', 'SuperAdminProfileController@ProfilePasswordUpdate')->name('passupdate');
        // admin management
        Route::get('admin-index', 'DCB\DcbAdminController@index')->name('admin-index');
        Route::post('admin-store', 'DCB\DcbAdminController@adminStore')->name('admin-store');
        Route::post('admin-update', 'DCB\DcbAdminController@adminUpdate')->name('admin-update');
        Route::post('admin-delete', 'DCB\DcbAdminController@adminDelete')->name('admin.delete');
        Route::post('admin-active', 'DCB\DcbAdminController@adminActive')->name('admin.active');
        Route::get('admin-find', 'DCB\DcbAdminController@adminFind')->name('admin-find');
        Route::get('all-admin-user', 'DCB\DcbAdminController@AdminUser')->name('admin.user');

        Route::get('all-user', 'DCB\DcbAdminController@Users')->name('all.user');

        Route::post('user-update', 'DCB\DcbAdminController@userUpdate')->name('user-update');
        Route::post('user-delete', 'DCB\DcbAdminController@userDelete')->name('user.delete');
        Route::post('user-active', 'DCB\DcbAdminController@userActive')->name('user.active');
        Route::get('user-management', 'SuperAdminController@UserManagement')->name('user.management');

        // unit users
        Route::get('Unit-user', 'SuperAdminController@UnitUser')->name('unit-user');
        Route::post('Unit-user-store', 'SuperAdminController@unitUserStore')->name('unit-user-store');
        Route::post('Unit-user-update', 'SuperAdminController@unitUserUpdate')->name('unit-user-update');
        Route::post('Unit-user-delete', 'SuperAdminController@unitUserDelete')->name('unituser.delete');
        Route::post('Unit-user-active', 'SuperAdminController@unitUserActive')->name('unituser.active');
        Route::get('Unit-user-find', 'SuperAdminController@unitUserFind')->name('unit-user-find');

        //box
        Route::post('box_number', 'SuperAdminController@box_store')->name('box');

        /*===============fine_index======================================*/
        Route::get('fine', 'SuperAdminController@fine_index')->name('fine_index');
        /*===============End fine_index==================================*/

        /*==============================search===========================*/
        Route::post('filter_forwardcase', 'SuperAdminController@filter_forwardcase')->name('filter_forwardcase');
        /*==============================End search===========================*/

        /*==========================mp_vehicletype========================================*/
        Route::get('mp_vehicletype', 'MpAdminController@mpvehicletype_index')->name('mp_vehicletype');
        Route::post('add_vehicle', 'MpAdminController@vehicle_store')->name('vehicle');
        Route::patch('vehicle_update/{id}', 'MpAdminController@vehicle_update')->name('vehicle_update');
        Route::get('vehicle_delete/{id}', 'MpAdminController@vehicle_delete')->name('vehicle_delete');
        /*==========================mp_vehicletype========================================*/

        /*==========================mp_crimelist========================================*/
        Route::get('mp_crimelist', 'MpAdminController@mpcrimelist_index')->name('mp_crimelist');
        Route::post('add_crime', 'MpAdminController@crime_store')->name('crime');
        Route::patch('crime_update/{id}', 'MpAdminController@crime_update')->name('crime_update');
        Route::get('crime_delete/{id}', 'MpAdminController@crime_delete')->name('crime_delete');
        /*==========================mp_crimelist========================================*/

        /*=========================mp_paper============================================*/
        Route::get('paper_add', 'MpAdminController@paper_index')->name('paper');
        Route::post('paper_store', 'MpAdminController@paper_store')->name('paper_store');
        Route::patch('paper_update/{id}', 'MpAdminController@paper_update')->name('paper_update');
        Route::get('paper_delete/{id}', 'MpAdminController@paper_delete')->name('paper_delete');
        /*=========================end mp_paper============================================*/
        Route::get('all-unit-user', 'SuperAdminAPIController@allunituser')->name('allunit.user');

        Route::get('box', 'SuperAdminController@box')->name('box');
        Route::post('box-store', 'SuperAdminController@boxstore')->name('boxstore');
        Route::post('box-update', 'SuperAdminController@boxupdate')->name('boxupdate');

        Route::patch('release-update', 'SuperAdminController@releaseUpdate')->name('release.update');

        Route::get('all-invoice', 'SuperAdminController@invoice')->name('all.invoice');
        Route::get('print-invoice-{id}', 'SuperAdminController@PrintInvoice')->name('print.invoice');

        // report
        Route::get('current-month', 'DCBReportController@currentmonth')->name('current.month');
        Route::get('monthly-report', 'DCBReportController@MonthlyReport')->name('monthly.report');
        Route::post('custom-reaport', 'DCBReportController@CustomReportDate')->name('custom.report');
        Route::get('current-reaport', 'DCBReportController@currentMonthAPIReport')->name('current.report');



        Route::get('vhicle-tracking', 'DCB\DcbAdminController@VehicleTracking')->name('vehicle.tracking');
    });
    Route::group(['middleware' => ['dcb-ceo-admin', 'dcb-super-admin']], function () {

        Route::get('undo-drop-case-data/{id}', 'SuperAdminController@UndoDrop')->name('undo.drop');
    });
    // Route::group(['middleware' => ['sub-admin-dcb']], function() {

    // });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('super-admin-profile', 'SuperAdminProfileController@profile')->name('profile');
        Route::post('super-admin-profile-update', 'SuperAdminProfileController@ProfileUpdate')->name('update');
        Route::post('super-admin-profile-password-change', 'SuperAdminProfileController@ProfilePasswordUpdate')->name('passupdate');
        // forward cases
        Route::get('sa_forward_case', 'SuperAdminController@forward_case')->name('sa_forward_case');
        //  case finder
        Route::get('case-finder', 'SuperAdminController@CaseFinder')->name('case.finder');
        Route::post('case-finder', 'SuperAdminController@CaseFinderPOST')->name('case.finder.post');
        // pendding case
        Route::get('pendding-withdraw-case', 'SuperAdminController@PenndingWithdraw')->name('withdraw.request');
        // release case
        Route::get('release-data', 'SuperAdminController@relaseData')->name('release.data');
        Route::patch('release-case', 'SuperAdminController@releaseCase')->name('release.case');
        // accept case
        Route::get('accept_case', 'SuperAdminController@accept_case')->name('accept_case');
        Route::patch('accept-case', 'SuperAdminController@acceptCase')->name('case.accept');
        Route::patch('accept-case-single', 'SuperAdminController@acceptCaseSingle')->name('case.accept.single');
        // all invoice
        Route::get('all-invoice', 'SuperAdminController@invoice')->name('all.invoice');
        Route::get('print-invoice-{id}', 'SuperAdminController@PrintInvoice')->name('print.invoice');
        // Dashboard data
        Route::get('dashboard-data', 'SuperAdminController@homeData')->name('dashboard.data');
        Route::patch('case-fine-consider/{id}', 'SuperAdminController@FineConsider');
        Route::get('drop-case', 'SuperAdminController@DropCase')->name('drop.case');
        // Route::patch('confirm-withdraw', 'SuperAdminController@ConfirmWithdra')->name('confirm.withdraw');
        Route::patch('confirm-withdraw', 'SuperAdminController@ConfirmWithdra')->name('confirm.withdraw');
    });
    Route::get('all-forward-case', 'DcbCaseAPIController@forward_case_api')->name('allforward.case');
    Route::get('superadmin-case-details/{id}', 'DcbCaseAPIController@caseDetailsAPi')->name('case.details');
    Route::patch('superadmin-case-drop/{id}', 'DcbCaseAPIController@caseDrop')->name('case.drop');
    Route::get('all-accept-case', 'DcbCaseAPIController@acceptCaseApi')->name('accept.case');
    Route::get('all-release-case', 'DcbCaseAPIController@releaseCaseApi')->name('release.case.data');
    Route::get('all-drop-case-data', 'DcbCaseAPIController@DropCaseData')->name('drop.case.data');
    Route::get('all-invoice-data', 'DcbCaseAPIController@InvoiceData')->name('invoice.data');
});
