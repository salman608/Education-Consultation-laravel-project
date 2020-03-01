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

Route::GET('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::POST('/login', 'Auth\LoginController@login')->name('login');
Route::POST('/login/tutor', 'Auth\LoginController@login_tutor')->name('login_tutor');
Route::POST('/logout', 'Auth\LoginController@logout')->name('logout');
Route::POST('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::GET('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::POST('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::GET('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::GET('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::POST('/register', 'Auth\RegisterController@register')->name('register');

Route::GET('/register/tutor', 'Auth\TutorRegisterController@showRegistrationForm')->name('register.tutor');
Route::POST('/register/tutor', 'Auth\TutorRegisterController@register')->name('register.tutor');

Route::GET('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::GET('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::GET('/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');


Route::GET('/jobboard', 'JobboardController@index')->name('jobboard.index');


Route::GET('/contact', 'ContactUsController@create')->name('contact.create');
Route::POST('/contact', 'ContactUsController@store')->name('contact.store');

Route::GET('/', 'FrontEndController@index')->name('/');
Route::GET('/tutorprofile', 'FrontEndController@profile')->name('tutoreprofile');

Route::GET('/whytutorprovide', function () {
    return view('whytutorprovide');
})->name('whytutorprovide');

Route::GET('/conditions', function () {
    return view('conditions');
})->name('conditions');


Route::GET('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('verified');
Route::GET('/tutors', 'TutorsController@index')->name('tutors.index')->middleware('verified');
Route::POST('/tutors/find_tutors', 'TutorsController@find_tutors')->name('tutors.find_tutors')->middleware('verified');
Route::GET('/tutors/{id}', 'TutorsController@show')->name('tutors.show')->middleware('verified');
Route::GET('/tutors/{id}/premium', 'TutorsController@premium')->name('tutors.premium')->middleware('verified');
Route::GET('/tutors/{id}/general', 'TutorsController@general')->name('tutors.general')->middleware('verified');

Route::GET('/password/change', 'SettingsController@change_password')->name('password.change')->middleware('verified');
Route::POST('/password/change', 'SettingsController@update_password')->name('password.change')->middleware('verified');


Route::GET('/tutor/upload_profile_photo', 'TutorProfileController@upload_profile_photo')->name('tutor.profile.upload_profile_photo')->middleware('verified');
Route::GET('/tutor/cv', 'TutorProfileController@generate_cv')->name('tutor.profile.generate_cv')->middleware('verified');
Route::POST('/tutor/upload_profile_photo', 'TutorProfileController@store_profile_photo')->name('tutor.profile.store_profile_photo')->middleware('verified');
Route::GET('/tutor/profile', 'TutorProfileController@show')->name('tutor.profile.show')->middleware('verified');
Route::GET('/tutor/profile/edit', 'TutorProfileController@edit')->name('tutor.profile.edit')->middleware('verified');

Route::GET('/tutor/profile/upload_credentials', function () {
    return view('profile.tutor.upload_credentials');
})->name('tutor.profile.upload_credentials')->middleware('verified');
Route::POST('/tutor/profile/store_credentials', 'TutorProfileController@store_credentials')->name('tutor.profile.store_credentials')->middleware('verified');

Route::POST('/tutor/profile/tuition', 'TutorProfileController@tuition')->name('tutor.profile.update.tuition')->middleware('verified');
Route::POST('/tutor/profile/education', 'TutorProfileController@education')->name('tutor.profile.update.education')->middleware('verified');
Route::POST('/tutor/profile/personal', 'TutorProfileController@personal')->name('tutor.profile.update.personal')->middleware('verified');

Route::GET('/tutor/status', 'TutorReviewStatusController@show')->name('tutor.status')->middleware('verified');

Route::GET('settings/payment', function () {
    return view('settings.payment');
})->name('settings.payment')->middleware('verified');

Route::GET('/guardian/upload_profile_photo', 'GuardianProfileController@upload_profile_photo')->name('guardian.profile.upload_profile_photo')->middleware('verified');
Route::POST('/guardian/upload_profile_photo', 'GuardianProfileController@store_profile_photo')->name('guardian.profile.store_profile_photo')->middleware('verified');
Route::GET('guardian/profile', function () {
    return view('profile.guardian.show');
})->name('guardian.profile.show')->middleware('verified');

Route::GET('/categories', 'CategoriesController@index')->name('categories.index')->middleware('verified');
Route::GET('/categories/create', 'CategoriesController@create')->name('categories.create')->middleware('verified');
Route::POST('/categories', 'CategoriesController@store')->name('categories.store')->middleware('verified');
Route::GET('/categories/{id}', 'CategoriesController@show')->name('categories.show')->middleware('verified');
Route::GET('/categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit')->middleware('verified');
Route::POST('/categories/{id}', 'CategoriesController@update')->name('categories.update')->middleware('verified');
Route::DELETE('/categories/{id}', 'CategoriesController@destroy')->name('categories.delete')->middleware('verified');

Route::GET('/courses', 'CoursesController@index')->name('courses.index')->middleware('verified');
Route::GET('/courses/create', 'CoursesController@create')->name('courses.create')->middleware('verified');
Route::POST('/courses', 'CoursesController@store')->name('courses.store')->middleware('verified');
Route::GET('/courses/{id}', 'CoursesController@show')->name('courses.show')->middleware('verified');
Route::GET('/courses/{id}/edit', 'CoursesController@edit')->name('courses.edit')->middleware('verified');
Route::POST('/courses/{id}', 'CoursesController@update')->name('courses.update')->middleware('verified');
Route::DELETE('/courses/{id}', 'CoursesController@destroy')->name('courses.delete')->middleware('verified');

Route::GET('/subjects', 'SubjectsController@index')->name('subjects.index')->middleware('verified');
Route::GET('/subjects/create', 'SubjectsController@create')->name('subjects.create')->middleware('verified');
Route::POST('/subjects', 'SubjectsController@store')->name('subjects.store')->middleware('verified');
Route::GET('/subjects/{id}', 'SubjectsController@show')->name('subjects.show')->middleware('verified');
Route::GET('/subjects/{id}/edit', 'SubjectsController@edit')->name('subjects.edit')->middleware('verified');
Route::POST('/subjects/{id}', 'SubjectsController@update')->name('subjects.update')->middleware('verified');
Route::DELETE('/subjects/{id}', 'SubjectsController@destroy')->name('subjects.delete')->middleware('verified');

Route::GET('/cities', 'CitiesController@index')->name('cities.index')->middleware('verified');
Route::GET('/cities/create', 'CitiesController@create')->name('cities.create')->middleware('verified');
Route::POST('/cities', 'CitiesController@store')->name('cities.store')->middleware('verified');
Route::GET('/cities/{id}', 'CitiesController@show')->name('cities.show')->middleware('verified');
Route::GET('/cities/{id}/edit', 'CitiesController@edit')->name('cities.edit')->middleware('verified');
Route::POST('/cities/{id}', 'CitiesController@update')->name('cities.update')->middleware('verified');
Route::DELETE('/cities/{id}', 'CitiesController@destroy')->name('cities.delete')->middleware('verified');

Route::GET('/locations', 'LocationsController@index')->name('locations.index')->middleware('verified');
Route::GET('/locations/create', 'LocationsController@create')->name('locations.create')->middleware('verified');
Route::POST('/locations', 'LocationsController@store')->name('locations.store')->middleware('verified');
Route::GET('/locations/{id}', 'LocationsController@show')->name('locations.show')->middleware('verified');
Route::GET('/locations/{id}/edit', 'LocationsController@edit')->name('locations.edit')->middleware('verified');
Route::POST('/locations/{id}', 'LocationsController@update')->name('locations.update')->middleware('verified');
Route::DELETE('/locations/{id}', 'LocationsController@destroy')->name('locations.delete')->middleware('verified');

Route::GET('/jobs', 'GuardianJobsController@index')->name('jobs.index')->middleware('verified');

Route::GET('/jobs/reviewing', 'GuardianJobsController@index')->name('jobs.index.reviewing')->middleware('verified');
Route::GET('/jobs/published', 'GuardianJobsController@index')->name('jobs.index.published')->middleware('verified');
Route::GET('/jobs/completed', 'GuardianJobsController@index')->name('jobs.index.completed')->middleware('verified');
Route::GET('/hot/jobs', 'GuardianJobsController@hot_jobs')->name('jobs.hot_jobs')->middleware('verified');
Route::GET('/jobs/create', 'GuardianJobsController@create')->name('jobs.create')->middleware('verified');
Route::POST('/jobs', 'GuardianJobsController@store')->name('jobs.store')->middleware('verified');
Route::GET('/jobs/{id}', 'GuardianJobsController@show')->name('jobs.show')->middleware('verified');
Route::GET('/jobs/{id}/edit', 'GuardianJobsController@edit')->name('jobs.edit')->middleware('verified');
Route::POST('/jobs/{id}', 'GuardianJobsController@update')->name('jobs.update')->middleware('verified');
Route::DELETE('/jobs/{id}', 'GuardianJobsController@destroy')->name('jobs.delete')->middleware('verified');
Route::GET('/jobs/{id}/approve', 'GuardianJobsController@approve')->name('jobs.approve')->middleware('verified');

Route::GET('/get_locations/{city_id?}', 'AxiosRequestController@get_locations')->name('get_locations');
Route::GET('/get_cources/{categories_id?}', 'AxiosRequestController@get_cources')->name('get_cources');
Route::GET('/get_cources_with_group/{categories_id?}', 'AxiosRequestController@get_cources_with_group')->name('get_cources_with_group');
Route::GET('/get_subjects/{courses_id?}', 'AxiosRequestController@get_subjects')->name('get_subjects');
Route::GET('/get_subjects_with_group/{courses_id?}', 'AxiosRequestController@get_subjects_with_group')->name('get_subjects_with_group');

Route::POST('/public_get_jobs', 'AxiosRequestController@public_get_jobs')->name('public.get_jobs');
Route::POST('/private_get_jobs', 'AxiosRequestController@private_get_jobs')->name('private.get_jobs');
Route::GET('/jobs/apply/{id}', 'AxiosRequestController@apply_job')->name('job.apply');

Route::GET('/soft_delete_users', 'SettingsController@soft_delete_users')->name('tutors.soft_delete_users');

// Admin notice controller
Route::resource('notice','admin\NoticeController');
