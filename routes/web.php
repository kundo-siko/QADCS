<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('dashboard');
});
*/
Route::get('professional_qualifications', function () {
    return view('Data_collection/professional_qualifications',['x' => '']);
});

Route::get('current_training', function () {
    return view('Data_collection/current_training',['x' => '']);
});

Route::get('employment_record', function () {
    return view('Data_collection/employment_record',['x' => '']);
});

Route::get('add_user', function () {
    return view('Admin/add_user',['x' => '']);
});

Route::get('show', function () {
    return view('Admin/show');
});

//CRUD User
//* Admin Creates a new user *//
Route::post('addUser', 'AdminsController@addUser')->middleware('auth','CheckStatus');
Route::post('checkhash', 'AdminsController@checkhash')->middleware('auth','CheckStatus');
//* Admin Creates edits user details *//
Route::post('editUser', 'AdminsController@editUser')->middleware('auth','CheckStatus');
//* Save New User details in Database *//
Route::post('post_editUser', 'AdminsController@post_editUser')->middleware('auth','CheckStatus');

//* Removing user prevelleges for employee *//
Route::post('remove_user', 'AdminsController@remove_user')->middleware('auth','CheckStatus');
//* Returng user prevelleges for employee *//
Route::post('return_user', 'AdminsController@return_user')->middleware('auth','CheckStatus');

//* Admin views all users in Database *//
Route::get('all_users', 'AdminsController@all_Users')->middleware('auth','CheckStatus');

//Authentication Routes, e.g. 
Auth::routes(['register' => false]);

//Dashboard Routes
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','CheckStatus');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth','CheckStatus');
Route::get('/not_allowed', 'HomeController@not_allowed')->name('not_allowed')->middleware('auth');
Route::get('logout', 'HomeController@logout')->middleware('auth');
// Reset Password 
Route::get('Reset_Password', 'HomeController@Reset_Password')->middleware('auth');
Route::post('password_reset', 'HomeController@password_reset')->middleware('auth','CheckStatus');

//Dashboard Routes
Route::get('view_profile', 'HomeController@view_profile')->middleware('auth','CheckStatus');

//CRUD Audit Records
Route::get('personal_update', 'AuditController@personal_update')->middleware('auth','CheckStatus');
Route::post('personal', 'AuditController@personal')->middleware('auth','CheckStatus');
Route::post('personal_profile', 'AuditController@personal_profile')->middleware('auth','CheckStatus');
Route::post('edit_profile', 'AuditController@edit_profile')->middleware('auth','CheckStatus');
Route::post('academic', 'AuditController@academic')->middleware('auth','CheckStatus');
Route::post('professional', 'AuditController@professional')->middleware('auth','CheckStatus');
Route::post('training_record', 'AuditController@training_record')->middleware('auth','CheckStatus');
Route::post('employment', 'AuditController@employment')->middleware('auth','CheckStatus');

//Professional/Vocational Qualifications Routes
Route::get('view_professional', 'PersonalRecordsController@view_professional')->middleware('auth','CheckStatus');
Route::post('edit_professional', 'PersonalRecordsController@edit_professional')->middleware('auth','CheckStatus');
Route::post('postedit_professional', 'PersonalRecordsController@postedit_professional')->middleware('auth');

//Academic Qualifications Routes
Route::get('view_academic', 'PersonalRecordsController@view_academic')->middleware('auth','CheckStatus');
Route::post('edit_academic', 'PersonalRecordsController@edit_academic')->middleware('auth','CheckStatus');
Route::post('postedit_academic', 'PersonalRecordsController@postedit_academic')->middleware('auth','CheckStatus');

//Current Training Routes
Route::get('view_training', 'PersonalRecordsController@view_training')->middleware('auth','CheckStatus');
Route::post('edit_training', 'PersonalRecordsController@edit_training')->middleware('auth','CheckStatus');
Route::post('postedit_training', 'PersonalRecordsController@postedit_training')->middleware('auth','CheckStatus');

//Current Training Routes
Route::get('view_employment', 'PersonalRecordsController@view_employment')->middleware('auth','CheckStatus');
Route::post('view_full_employment', 'PersonalRecordsController@view_full_employment')->middleware('auth','CheckStatus');
Route::post('edit_employment', 'PersonalRecordsController@edit_employment')->middleware('auth','CheckStatus');
Route::post('postedit_employment', 'PersonalRecordsController@postedit_employment')->middleware('auth','CheckStatus');

//Records Document Download Routes
Route::post('download_academic', 'DownloadsController@download_academic')->middleware('auth','CheckStatus');
Route::post('download_professional', 'DownloadsController@download_professional')->middleware('auth','CheckStatus');
Route::post('download_payslip', 'DownloadsController@download_payslip')->middleware('auth','CheckStatus');

//All Records Crud
Route::get('all_profiles', 'RecordsController@all_profiles')->middleware('auth','CheckStatus');
Route::get('filtered_profiles', 'RecordsController@filtered_profiles')->middleware('auth','CheckStatus')->name('filtered_profiles');
Route::post('filter_all_profiles', 'RecordsController@filter_all_profiles')->middleware('auth','CheckStatus');
Route::post('view_all_profiles', 'RecordsController@view_all_profiles')->middleware('auth','CheckStatus');

//All Academic Records
Route::get('all_academic', 'RecordsController@all_academic')->middleware('auth','CheckStatus');
Route::post('filter_all_academic', 'RecordsController@filter_all_academic')->middleware('auth','CheckStatus');
Route::get('filter_academic', 'RecordsController@filter_academic')->middleware('auth','CheckStatus')->name('filter_academic');
Route::get('academic_qualifications', 'RecordsController@academic_qualifications')->middleware('auth','CheckStatus');
Route::post('view_all_academic', 'RecordsController@view_all_academic')->middleware('auth','CheckStatus');


//All Professional Records
Route::get('all_professional', 'RecordsController@all_professional')->middleware('auth','CheckStatus');
Route::post('filter_all_professional', 'RecordsController@filter_all_professional')->middleware('auth','CheckStatus');
Route::get('filter_professional', 'RecordsController@filter_professional')->middleware('auth','CheckStatus')->name('filter_professional');
Route::post('view_all_professional', 'RecordsController@view_all_professional')->middleware('auth','CheckStatus');
Route::get('professional_view', 'RecordsController@professional_view')->middleware('auth','CheckStatus')->name('professional_view');

//All Training Records
Route::get('all_training', 'RecordsController@all_training')->middleware('auth','CheckStatus');
Route::post('filter_all_training', 'RecordsController@filter_all_training')->middleware('auth','CheckStatus');
Route::get('filter_training', 'RecordsController@filter_training')->middleware('auth','CheckStatus')->name('filter_training');
Route::post('fil_tra', 'RecordsController@fil_tra')->middleware('auth','CheckStatus');
Route::get('view_all_training', 'RecordsController@view_all_training')->middleware('auth','CheckStatus');

//All employment Records Records
Route::get('all_employment', 'RecordsController@all_employment')->middleware('auth','CheckStatus');
Route::post('filter_all_employment', 'RecordsController@filter_all_employment')->middleware('auth','CheckStatus');
Route::get('filter_employment', 'RecordsController@filter_employment')->middleware('auth','CheckStatus')->name('filter_employment');
Route::post('view_all_employment', 'RecordsController@view_all_employment')->middleware('auth','CheckStatus');
Route::post('view_employment_filtered', 'RecordsController@view_employment_filtered')->middleware('auth','CheckStatus');
Route::get('employment_view', 'RecordsController@employment_view')->middleware('auth','CheckStatus')->name('employment_view');

//Reports Routes
//training Reports Routes
Route::get('training_report', 'ReportsController@training_report')->middleware('auth','CheckStatus');
Route::post('generate_training_report', 'ReportsController@generate_training_report')->middleware('auth','CheckStatus');
Route::get('view_training_report', 'ReportsController@view_training_report')->middleware('auth','CheckStatus')->name('view_training_report');

//qualification_report
Route::get('qualification_report', 'ReportsController@qualification_report')->middleware('auth','CheckStatus');
Route::post('generate_academic_report', 'ReportsController@generate_academic_report')->middleware('auth','CheckStatus');
Route::get('view_qualification_report', 'ReportsController@view_qualification_report')->middleware('auth','CheckStatus');

//profesional_report
Route::get('professional_report', 'ReportsController@professional_report')->middleware('auth','CheckStatus');
Route::post('generate_professional_report', 'ReportsController@generate_professional_report')->middleware('auth','CheckStatus');
Route::get('view_professional_report', 'ReportsController@view_professional_report')->middleware('auth','CheckStatus');

//employment_report
Route::get('employment_report', 'ReportsController@employment_report')->middleware('auth','CheckStatus');
Route::post('generate_employment_report', 'ReportsController@generate_employment_report')->middleware('auth','CheckStatus');
Route::get('view_employment_report', 'ReportsController@view_employment_report')->middleware('auth','CheckStatus');



/*//Route::post('view_professional_report', 'ReportsController@view_professional_report')->middleware('auth','CheckStatus');
Route::post('view_employment_report', 'EmploymentReportsController@view_employment_report')->middleware('auth','CheckStatus');
Route::post('view_position_report', 'EmploymentReportsController@view_position_report')->middleware('auth','CheckStatus');
Route::post('view_date_report', 'EmploymentReportsController@view_date_report')->middleware('auth','CheckStatus');
Route::post('view_status_report', 'EmploymentReportsController@view_status_report')->middleware('auth','CheckStatus');
Route::post('view_type_report', 'EmploymentReportsController@view_type_report')->middleware('auth','CheckStatus');
Route::post('view_section_report', 'EmploymentReportsController@view_section_report')->middleware('auth','CheckStatus');
Route::post('view_department_report', 'EmploymentReportsController@view_department_report')->middleware('auth','CheckStatus');
Route::post('view_station_report', 'EmploymentReportsController@view_station_report')->middleware('auth','CheckStatus');
*/
//export_excel
Route::post('export_excel', 'ExelExportsController@export_excel')->middleware('auth','CheckStatus');
Route::post('export_emp', 'ExelExportsController@export_emp')->middleware('auth','CheckStatus');
Route::post('export_training', 'ExelExportsController@export_training')->middleware('auth','CheckStatus');
Route::post('export_academic', 'ExelExportsController@export_academic')->middleware('auth','CheckStatus');

//Delete Records
//Delete Academic
Route::post('delete_academic', 'DeleteRecordsController@delete_academic')->middleware('auth','CheckStatus');
//Delete professional
Route::post('delete_professional', 'DeleteRecordsController@delete_professional')->middleware('auth','CheckStatus');
//Delete Training
Route::post('delete_training', 'DeleteRecordsController@delete_training')->middleware('auth','CheckStatus');
//Delete Employment Record
Route::post('delete_employment', 'DeleteRecordsController@delete_employment')->middleware('auth','CheckStatus');


//Contacts
Route::get('new_contact', 'ContactsController@new_contact');
Route::get('view_contact', 'ContactsController@view_contact');

Route::post('create_contact', 'ContactsController@create_contact');

Route::post('filter_all_contacts', 'ContactsController@filter_all_contacts');

Route::get('filter_contact', 'ContactsController@filter_contact');



Route::post('show_contact', 'ContactsController@show_contact');

Route::post('edit_contact', 'ContactsController@edit_contact');

Route::get('contact_edit', 'ContactsController@contact_edit');



