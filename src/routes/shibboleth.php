<?php
Route::group(['middleware' => 'web'], function () {
    Route::name('shibboleth-login')->get('/shibboleth-login', 'StudentAffairsUwm\Shibboleth\Controllers\ShibbolethController@login');
    Route::name('shibboleth-authenticate')->get('/shibboleth-authenticate', 'StudentAffairsUwm\Shibboleth\Controllers\ShibbolethController@idpAuthenticate');
    Route::name('shibboleth-logout')->get('/shibboleth-logout', 'StudentAffairsUwm\Shibboleth\Controllers\ShibbolethController@destroy');
});
