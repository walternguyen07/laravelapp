<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade laravel walter package to newer
 * versions in the future.
 *
 * @category    Walter
 * @package     Laravel
 * @author      Walter Nguyen
 * @copyright   Copyright (c) Walter Nguyen
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ProfessionalTitles'], function () {
        Route::resource('professionaltitles', 'ProfessionalTitlesController');
        //For Datatable
        Route::post('professionaltitles/get', 'ProfessionalTitlesTableController')->name('professionaltitles.get');
    });
    
});