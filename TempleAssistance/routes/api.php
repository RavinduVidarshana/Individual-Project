<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource("Test","TestController");

Route::apiResource("TempleRegister","Common\TempleRegisterController");
Route::apiResource("BFRegister","Common\BFRegisterController");

Route::apiResource("Login","Common\LoginController");

Route::apiResource("DaneSchedule","DaneScheduleController");
Route::apiResource("DhammaSchool","DhammaSchoolController");
Route::apiResource("WelfareSociety","WelfareSocietyController");

Route::apiResource("TempleEvent","Event\TempleEventController");
Route::apiResource("WelfareSocietyEvent","Event\WelfareSocietyEventController");
Route::apiResource("DhammaSchoolEvent","Event\DhammaSchoolEventController");

Route::apiResource("News","News\TempleNewsController");

Route::apiResource("TempleProfile","Profile\TempleProfileController");
Route::apiResource("BuddhistFollowersProfile","Profile\BuddhistFollowersProfileController");

Route::apiResource("TempleAddress","Address\TempleAddressController");
Route::apiResource("BuddhistFollowersAddress","Address\BuddhistFollowersAddressController");
Route::apiResource("WelfareSocietyAddress","Address\WelfareSocietyAddressController");
Route::apiResource("DhammaSchoolAddress","Address\DhammaSchoolAddressController");

Route::apiResource("TempleEmail","Email\TempleEmailController");
Route::apiResource("BuddhistFollowersEmail","Email\BuddhistFollowersEmailController");
Route::apiResource("WelfareSocietyEmail","Email\WelfareSocietyEmailController");
Route::apiResource("DhammaSchoolEmail","Email\DhammaSchoolEmailController");

Route::apiResource("TemplePhone","Phone\TemplePhoneController");
Route::apiResource("BuddhistFollowersPhone","Phone\BuddhistFollowersPhoneController");
Route::apiResource("WelfareSocietyPhone","Phone\WelfareSocietyPhoneController");
Route::apiResource("DhammaSchoolPhone","Phone\DhammaSchoolPhoneController");

Route::apiResource("BuddhistFollowersManage","Manage\BuddhistFollowersManageController");
Route::apiResource("DhammaSchoolManage","Manage\DhammaSchoolManageController");
Route::apiResource("NewsManage","Manage\NewsManageController");
Route::apiResource("TempleManage","Manage\TempleManageController");
Route::apiResource("WelfareSocietyManage","Manage\WelfareSocietyManageController");

Route::apiResource("Admin","Admin\AdminUserController");

Route::apiResource("ReservedController","Analytical\ReservedController");
Route::apiResource("SearchController","Analytical\SearchController");
