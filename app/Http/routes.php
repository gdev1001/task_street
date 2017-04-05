<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('howitwork', 'WelcomeController@howitwork');

// Auth routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('checked/{email}', 'Auth\AuthController@checked');
Route::get('auth/email_check/{email?}', 'Auth\AuthController@email_check');//to check unique email using ajax
Route::get('auth/resend_activation', 'Auth\AuthController@resend_activation');
Route::controllers([
	'password' => 'Auth\PasswordController',
]);

// Registration routes...
Route::get('auth/register', 'Auth\RegisterController@register');
Route::get('auth/invite/{key?}', 'Auth\RegisterController@invite');

Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/register/student','Auth\RegisterController@student');
Route::get('auth/register/company','Auth\RegisterController@company');
Route::get('auth/register/expertise','Auth\RegisterController@expertise');
Route::get('auth/register/success', 'Auth\AuthController@success');//to redirect success page after registration

Route::get('/password/email', 'Auth\PasswordController@postEmail');
Route::get('/allread/{id}', function ($id) {
    \Notice::allread($id);
    return view('welcome');
});
//Route::get('test', 'TaskController@index');

Route::get('project', 'ProjectController@index');
Route::get('project/get_projects', 'ProjectController@get_projects');// to get freelacer data from ajax
Route::get('profile', 'ProjectController@profile');

Route::get('/project/task/{id}', 'ProjectController@tasks');

//Route::get('profile',['as' => 'profile','uses' => 'ProfileController@index']);
Route::get('search','SearchController@index');
Route::get('search','SearchController@index');
Route::get('resume','ProfileController@resume');
Route::get('lazy','CompanyController@post');
Route::post('project/update','ProjectController@upload');

Route::get('/project/testUrl/{id?}', 'ProjectController@getAjax');
Route::get('/project/checkMessages', 'ProjectController@getUserMessages');
Route::get('/project/complete_task/{id?}', 'ProjectController@completeTask');


/*Route::get('file','fileSystemController@store');*/
Route::get('project/store','ProjectController@store');
Route::get('project/compile','ProjectController@compile');
Route::get('project/{id}', 'ProjectController@decide');


Route::get('/client/post', 'CompanyController@post');
Route::get('/client/manage', 'CompanyController@manage');
Route::get('/client/progress/{id}', 'CompanyController@progress');
Route::post('/client/store', 'CompanyController@store');
Route::post('/client/delete', 'CompanyController@delete');
Route::get('/client/transaction', 'CompanyController@transaction');
Route::get('/client/invite', 'CompanyController@invite');
Route::post('/client/invite', 'CompanyController@postInvite');
Route::get('/client/interview/{id}','CompanyController@get_interview');
Route::post('/client/interview/skip/{uid}/{pid}','CompanyController@skip_interview');
Route::post('/client/interview/accept/{cid}/{pid}','CompanyController@accept_interview');

// Client Payment
Route::get('/client/deposit/{id}','PaymentController@deposit_project');
Route::post('/client/deposit','PaymentController@deposit_client');

Route::get('/client/profile','CompanyController@profile');
Route::post('/client/profile','CompanyController@store_profile');

Route::get('project/reject/{id}', 'ProjectController@reject');
Route::get('project/approve/{id}', 'ProjectController@approve');

Route::get('noticemarkread','CompanyController@noticemarkread');//to change notice status for company
Route::get('get_notifications','CompanyController@get_notifications');//to get notification by ajax
Route::get('notificationscount','CompanyController@notificationscount');//to get notification count of company

Route::get('user_notifications','ProjectController@user_notifications');//to get notification by ajax
Route::get('user_noticemarkread','ProjectController@user_noticemarkread');//to change notice status for developer
Route::get('user_notificationscount','ProjectController@user_notificationscount');//to get notification count of developer


Route::post('profile','ProfileController@store');
Route::get('profile/resumeStore', ['as' => 'profile.resumeStore',    'uses' => 'ProfileController@resumeStore']);
Route::get('text','ProfileController@analysis');


Route::resource('{name}/wiki', PageController::class);
Route::get('{name}/wiki/{id}', 'PageController@index');
Route::get('{name}/wiki/{id}', 'PageController@show');
Route::get('{name}/wiki/{id}/create', 'PageController@create');
Route::get('{name}/wiki/{id}/delete', 'PageController@destroy');
Route::get('{name}/wiki/{id}/refresh', 'PageController@refresh');
Route::get('{name}/wiki/{id}/history', 'PageController@showHistory');
Route::get('{name}/wiki/{id}/sendNotification', 'PageController@sendNotification');
Route::get('{name}/wiki/{id}/lock', 'PageController@pageLock');
Route::get('{name}/wiki/{id}/unlock', 'PageController@pageUnlock');
Route::match(['get', 'post'],'{name}/wiki/{id}/permissions', 'PageController@managePermissions');
Route::get('{name}/wiki/{id}/{parent}/{total}/rollback', 'PageController@rollback');
Route::post('{name}/wiki/{id}/userList', 'PageController@userList');
Route::post('{name}/wiki/{id}/addUser', 'PageController@addUser');


Route::get('project/question/{id}',        		['as' => 'question',          	   	'uses' => 'Question\QuestionController@index']);
Route::post('project/question/store',      		['as' => 'question.store',         	'uses' => 'Question\QuestionController@store']);
Route::get('project/question/message/{id}',     ['as' => 'question.message',       	'uses' => 'Question\QuestionController@message']);


Route::get('expertise',							['as' => 'expertise',				'uses' => 'Expertise\ProjectController@index']);
Route::get('expertise/project/{id}',			['as' => 'expertise.view',          'uses' => 'Expertise\ProjectController@view']);
Route::get('expertise/project_task_tree/{id?}', 'Expertise\ProjectController@get_task_tree');
Route::get('expertise/task_detail/{id?}',       'Expertise\ProjectController@get_task_detail');
Route::get('expertise/task_developer/{id?}',    'Expertise\ProjectController@get_task_developer');
Route::get('expertise/task_applied/{id?}',      'Expertise\ProjectController@get_applied_tasks');

Route::get('expertise/project_test/{id}',			['as' => 'expertise.view_test',          'uses' => 'Expertise\ProjectController@view_test']);

Route::get('expertise/task/{id}',			    ['as' => 'expertise.task.view',          'uses' => 'Expertise\TaskController@view']);

Route::get('expertise/task/create/{id}',  		['as' => 'expertise.task.create',   'uses' => 'Expertise\TaskController@create']);
Route::post('expertise/task/store/{id}',  		['as' => 'expertise.task.store',   	'uses' => 'Expertise\TaskController@store']);
Route::post('expertise/task/update/{id}',  		['as' => 'expertise.task.update',   	'uses' => 'Expertise\TaskController@update']);
Route::get('expertise/task/delete/{id}',  		['as' => 'expertise.task.delete',  	'uses' => 'Expertise\TaskController@delete']);
Route::get('expertise/task/edit/{id}',			['as' => 'expertise.task.edit',		'uses' => 'Expertise\TaskController@edit']);
Route::get('expertise/project/download/{id}',	['as' => 'expertise.task.download', 'uses' => 'Expertise\ProjectController@download']);
Route::get('expertise/project/validate/{id}',	['as' => 'expertise.task.validate', 'uses' => 'Expertise\ProjectController@validating']);
Route::get('expertise/project/deny/{id}',	    ['as' => 'expertise.task.deny',     'uses' => 'Expertise\ProjectController@deny']);
Route::get('expertise/project/accept/{id}/{user_id}',	['as' => 'expertise.task.accept', 'uses' => 'Expertise\ProjectController@accept']);
Route::get('expertise/project/reject/{id}',	['as' => 'expertise.task.reject', 'uses' => 'Expertise\ProjectController@reject']);
Route::get('expertise/project/admin/{id}',	['as' => 'expertise.admin', 'uses' => 'Expertise\ProjectController@admin']);

// Temp Payment 
Route::get('/payment_form','PageController@payment');
Route::post('/checkout','PaymentController@checkout');

//TO VERIFY EMAIL ID

Route::get('auth/register/verify/{confirmationCode}', ['as' => 'confirmation_path','uses' => 'Auth\RegisterController@confirm']);
