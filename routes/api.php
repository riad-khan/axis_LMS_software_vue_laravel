<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    Route::post('register', 'AuthController@register');

});
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('profile', 'AuthController@profile');
    Route::post('profile-update', 'AuthController@profileUpdate');
    Route::get('notice', 'User\NoticeController@index');
    Route::get('schedule', 'User\ScheduleController@index');
    Route::get('courses', 'User\CourseController@index');
    Route::get('my-courses', 'User\CourseController@myCourses');
    Route::get('classes', 'User\ClassController@index');
    Route::get('class/{id}', 'User\ClassController@getClass');
    Route::get('class/{id}/comments', 'User\ClassCommentController@index');
    Route::post('class/{id}/comment', 'User\ClassCommentController@store');
    Route::get('class-resources', 'User\ClassResourceController@index');
    Route::get('exams', 'User\ExamController@index');
    Route::get('exam/{id}/questions', 'User\ExamController@getExamQuestions');
    Route::post('exam/question/{id}', 'User\ExamController@submitIndividualQuestionAns');
    Route::get('exam/{id}/getResult', 'User\ExamController@getResult');
    Route::post('exam/{id}/getResult', 'User\ExamController@storeResult');
    Route::post('exam/{id}/submit', 'User\ExamController@submitExam');
    Route::get('exam/{id}/getResultWithCorrectAnswer', 'User\ExamController@getResultWithCorrectAns');
    Route::post('complain', 'User\ComplainBoxController@store');
    Route::get('userResults', 'User\ResultController@index');
    Route::get('overAllResults', 'User\ResultController@overAllResults');
    Route::post('exam/{id}/getExamOverAllResult', 'User\ResultController@getExamOverAllResult');
    Route::get('upcomingClass', 'User\ClassController@upcomingClass');
    Route::get('upcomingExam', 'User\ExamController@upcomingExam');
    Route::post('submitApplicationDetails', 'User\ApplicationDetailController@store');
});
Route::get('courses', 'User\CourseController@getCourse');
Route::get('course/{id}', 'User\CourseController@getCourseDetails');
