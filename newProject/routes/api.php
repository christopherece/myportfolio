<?php

use Illuminate\Http\Request;

use App\Projects;

Route::group(['middleware' => 'api'], function (){

    //get Projects
    Route::get('projects/', function (){
        return Projects::latest()->orderBy('created_at','desc')->get();
    });

    //get SingleProjects
    Route::get('projects/{id}', function ($id){
        return Projects::findOrFail($id);
    });

    //post Post
    Route::post('projects/store', function (Request $request){
        return Projects::create([
            'title' => $request->input(['title']),
            'image' => $request->input(['image']),
            'description' => $request->input(['description']),
            'client' => $request->input(['client']),
            'service' => $request->input(['service']),
            'url' => $request->input(['url']),
            'date' => $request->input(['date']),

        ]);
    });

    //get Update
    Route::patch('projects/{id}', function (Request $request, $id){
         Projects::findOrFail($id)->update([
             'title' => $request->input(['title']),
             'image' => $request->input(['image']),
             'description' => $request->input(['description']),
             'client' => $request->input(['client']),
             'service' => $request->input(['service']),
             'url' => $request->input(['url']),
             'date' => $request->input(['date']),
        ]);
    });

    //get Delete
    Route::delete('projects/{id}', function ($id){
        return Projects::destroy($id);
    });







});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
