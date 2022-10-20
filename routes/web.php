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

use Illuminate\Support\Facades\Route;

// http://www.edu.south1918.com:8086/admin/public/login
// 后台登录路由，不需要路由保护（权限判断
Route::group(["prefix"=>"admin"],function(){
    // 后台登录页面|路由保护，设置别名
    Route::get("public/login","Admin\PublicController@login")->name("login");
    // 后台登录验证页面
    Route::post("public/check","Admin\PublicController@check");
    Route::get("index/logout","Admin\IndexController@logout");  //登出

   /*  Route::get("index/index","Admin\IndexController@index")->middleware("auth:admin");    //主页
    Route::get("index/welcome","Admin\IndexController@welcome")->middleware("auth:admin");//欢迎页 */

});    

// 需要权限判断
 Route::group(["prefix"=>"admin","middleware"=>"auth:admin"],function(){
    // 后台首页|路由保护，设置中间件
    Route::get("index/index","Admin\IndexController@index") ;    //主页
    Route::get("index/welcome","Admin\IndexController@welcome");//欢迎页

    // 管理员管理
    Route::get("manager/index","Admin\ManagerController@index");

    // 权限管理
    Route::get("auth/index","Admin\AuthController@index");
    Route::any("auth/add","Admin\AuthController@add");

    // 角色展示路由
    Route::get("role/index","Admin\RoleController@index");
    // 角色分配权限路由
    Route::any("role/assign","Admin\RoleController@assign");

    // 会员管理模块
    // 会员列表
    Route::get("member/index","Admin\MemberController@index");
    // 会员添加
    Route::any("member/add","Admin\MemberController@add");
    // 异步上传
    Route::post("uploader/webuploader","Admin\UploaderController@webuploader");
    // 七牛上传图片
    Route::post("uploader/qiniu","Admin\UploaderController@qiniu");
    // ajax联动
    Route::get("member/getAreaById","Admin\MemberController@getAreaById");
    // 会员信息展示
    Route::any("member/show","Admin\MemberController@show");

    // 专业管理模块
    // 专业分类列表
    Route::any("protype/index","Admin\ProtypeController@index");
    //专业目录 
    Route::any("profession/index","Admin\ProfessionController@index");

    // 课程管理
    // 课程列表
    Route::get("course/index","Admin\CourseController@index");
    //点播列表
    Route::get("lesson/index","Admin\LessonController@index");
    //视频播放地址
    Route::get("lesson/player","Admin\LessonController@player");

});
