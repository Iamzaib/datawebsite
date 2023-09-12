<?php

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/lists/{slug}', 'Frontend\HomeController@lists_by_cat')->name('lists_by_cat');
Route::get('/page/{slug}', 'Frontend\HomeController@get_page')->name('pages');
Route::redirect('/home', '/');
Route::get('/coupons', 'Frontend\CouponsController@index')->name('frontend.coupons.index');

Route::redirect('/blogs/create', '/blogs');
Route::resource('blogs', 'Frontend\BlogsController')->only(['index', 'show']);
Route::get('/blog/{slug}', 'Frontend\BlogsController@view')->name('singleblog');
Route::get('/blog-category/{slug}', 'Frontend\BlogsController@category_list')->name('blog_category');
Route::get('/blog-tag/{slug}', 'Frontend\BlogsController@tag_list')->name('blog_tag');
Route::get('/author-blogs/{id}', 'Frontend\BlogsController@user_list')->name('blog_user');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Coupons
    Route::delete('coupons/destroy', 'CouponsController@massDestroy')->name('coupons.massDestroy');
    Route::post('coupons/media', 'CouponsController@storeMedia')->name('coupons.storeMedia');
    Route::post('coupons/ckmedia', 'CouponsController@storeCKEditorImages')->name('coupons.storeCKEditorImages');
    Route::post('coupons/{coupon}/add-codes', 'CouponsController@generateCodes')->name('coupons.generateCodes');
    Route::resource('coupons', 'CouponsController');

    // Codes
    Route::delete('codes/destroy', 'CodesController@massDestroy')->name('codes.massDestroy');
    Route::resource('codes', 'CodesController');

    // Purchases
    Route::delete('purchases/destroy', 'PurchasesController@massDestroy')->name('purchases.massDestroy');
    Route::resource('purchases', 'PurchasesController');
    // Emails
    Route::delete('emails/destroy', 'EmailsController@massDestroy')->name('emails.massDestroy');
    Route::post('emails/parse-csv-import', 'EmailsController@parseCsvImport')->name('emails.parseCsvImport');
    Route::post('emails/process-csv-import', 'EmailsController@processCsvImport')->name('emails.processCsvImport');
    Route::resource('emails', 'EmailsController');
    // Email Lists
    Route::delete('email-lists/destroy', 'EmailListsController@massDestroy')->name('email-lists.massDestroy');
    Route::post('email-lists/media', 'EmailListsController@storeMedia')->name('email-lists.storeMedia');
    Route::post('email-lists/ckmedia', 'EmailListsController@storeCKEditorImages')->name('email-lists.storeCKEditorImages');
    Route::post('email-lists/parse-csv-import', 'EmailListsController@parseCsvImport')->name('email-lists.parseCsvImport');
    Route::post('email-lists/process-csv-import', 'EmailListsController@processCsvImport')->name('email-lists.processCsvImport');
    Route::resource('email-lists', 'EmailListsController');
    Route::resource('listcategorys', 'EmailListsCategoryController');
    Route::delete('listcategorys/destroy', 'EmailListsCategoryController@massDestroy')->name('listcategorys.massDestroy');
    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // States
    Route::delete('states/destroy', 'StatesController@massDestroy')->name('states.massDestroy');
    Route::post('states/parse-csv-import', 'StatesController@parseCsvImport')->name('states.parseCsvImport');
    Route::post('states/process-csv-import', 'StatesController@processCsvImport')->name('states.processCsvImport');
    Route::resource('states', 'StatesController');
    Route::get('states/get_by_country/{country_id}', 'StatesController@get_by_country')->name('states.get_by_country');


    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::post('cities/parse-csv-import', 'CitiesController@parseCsvImport')->name('cities.parseCsvImport');
    Route::post('cities/process-csv-import', 'CitiesController@processCsvImport')->name('cities.processCsvImport');
    Route::resource('cities', 'CitiesController');
    Route::get('cities/get_by_state/{state_id}', 'CitiesController@get_by_state')->name('cities.get_by_state');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/parse-csv-import', 'CompaniesController@parseCsvImport')->name('companies.parseCsvImport');
    Route::post('companies/process-csv-import', 'CompaniesController@processCsvImport')->name('companies.processCsvImport');
    Route::resource('companies', 'CompaniesController');

    // Job Positions
    Route::delete('job-positions/destroy', 'JobPositionsController@massDestroy')->name('job-positions.massDestroy');
    Route::post('job-positions/parse-csv-import', 'JobPositionsController@parseCsvImport')->name('job-positions.parseCsvImport');
    Route::post('job-positions/process-csv-import', 'JobPositionsController@processCsvImport')->name('job-positions.processCsvImport');
    Route::resource('job-positions', 'JobPositionsController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');
    // Blog Category
    Route::delete('blog-categories/destroy', 'ContentCategoryController@massDestroy')->name('blog-categories.massDestroy');
    Route::resource('blog-categories', 'BlogCategoryController');

    // Blog Tag
    Route::delete('blog-tags/destroy', 'BlogTagController@massDestroy')->name('blog-tags.massDestroy');
    Route::resource('blog-tags', 'BlogTagController');

    // Blog Post
    Route::delete('blog-posts/destroy', 'BlogPostController@massDestroy')->name('blog-posts.massDestroy');
    Route::post('blog-posts/media', 'BlogPostController@storeMedia')->name('blog-posts.storeMedia');
    Route::post('blog-posts/ckmedia', 'BlogPostController@storeCKEditorImages')->name('blog-posts.storeCKEditorImages');
    Route::resource('blog-posts', 'BlogPostController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::redirect('/home', '/')->name('home');
/*
    // Coupons
    Route::resource('coupons', 'CouponsController')->only('show');

    // Codes
    Route::post('codes/{code}/purchase', 'CodesController@purchase')->name('codes.purchase');

    // Purchases
    Route::resource('purchases', 'PurchasesController')->only(['index', 'show']);

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');*/
});
