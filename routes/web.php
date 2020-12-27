<?php

use Illuminate\Support\Facades\Route;

/*
  Path declaration for treeview (CRUD)
*/
Route::get('/','TreeController@index');
Route::post('add-category','TreeController@addCategory');
Route::post('edit-category','TreeController@editCategory');
Route::post('delete-category','TreeController@deleteCategory');
Route::post('add-parent-category','TreeController@addParentCategory');


