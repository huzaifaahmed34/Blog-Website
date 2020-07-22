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



	// Route::get('LoginUser', 'User\Account@index');

	// Route::post('LoginUser', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);
Route::get('/','Home\Home@index');
Route::get('popular-post','Home\Home@PopularPost');
Route::get('/showcomments','Home\Home@showcomments');
Route::post('/addcomments','Home\Home@addcomments');

Route::post('/Subscribe','Home\Newsletter_Controller@store');
Route::post('ContactUsSubmit','Home\ContactUs@AddContactUs');

             

Route::get('blog/{slug}','Home\Home@ShowPostDetail');
Route::get('category/{slug}','Home\Home@ShowCategoryPost');
Route::get('tags/{slug}','Home\Home@ShowTagsPost');

Route::get('tags/{slug}','Home\Home@ShowTagsPost');
Route::get('subcategory/{slug}','Home\Home@ShowSubCategoryPost');
Route::get('search/{slug}','Home\Home@ShowSearchPost');
Route::get('/AboutUs','Home\Home@AboutUs')->name('About-Us');
Route::get('/ContactUs','Home\ContactUs@index')->name('Contact-Us');


Route::group( [ 'prefix' => 'admin' ,'middleware'=>['auth:web']], function()
{	 Route::get('/','Admin\Dashboard@index');
    Route::get('/CategoryAdd','Admin\Category@AddCategory');
Route::post('/InsertCategory','Admin\Category@InsertCategory');
Route::get('/CategoryView','Admin\Category@ViewCategory');
Route::get('/CategoryShow','Admin\Category@ShowCategory');
Route::post('/CategoryUpdate','Admin\Category@UpdateCategory');
Route::get('/CategoryEdit/{id}','Admin\Category@EditCategory');
Route::get('/CategoryDelete/{id}','Admin\Category@DeleteCategory');

Route::post('/TagsUpdate','Admin\Post@UpdateTags');
Route::get('/TagDelete','Admin\Post@DeleteTags');

Route::get('/TagsAdd','Admin\Post@AddTags');


Route::post('/ImageEdit','Admin\Post@ImageEdit');

    Route::get('/SubCategoryAdd','Admin\Subcategory@AddSubCategory');
Route::post('/InsertSubCategory','Admin\Subcategory@InsertSubCategory');
Route::get('/SubCategoryView','Admin\Subcategory@ViewSubCategory');
Route::get('/SubCategoryShow','Admin\Subcategory@ShowSubCategory');


Route::get('/SubCategoryEdit/{id}','Admin\Subcategory@EditSubCategory');
Route::get('/SubCategoryDelete/{id}','Admin\Subcategory@DeleteSubCategory');
Route::post('/SubCategoryUpdate','Admin\Subcategory@UpdateSubCategory');


Route::get('/ShowTags','Admin\Post@ShowTags');
Route::get('/changeCategory','Admin\Post@changeCategory');
    Route::get('/PostAdd','Admin\Post@AddPost');
Route::post('/InsertPost','Admin\Post@InsertPost');
Route::get('/InsertTags','Admin\Post@InsertTags');
Route::get('/PostView','Admin\Post@ViewPost');
Route::get('/PostShow','Admin\Post@ShowPost');
Route::post('/PostUpdate','Admin\Post@UpdatePost');
Route::get('/PostEdit/{id}','Admin\Post@EditPost');
Route::get('/PostDelete/{id}','Admin\Post@DeletePost');

});



 
Auth::routes();


?>