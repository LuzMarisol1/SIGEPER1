Route::get('/register', 'AccountController@showRegistrationForm')->name('register');
Route::post('/register', 'AccountController@register');