<?php
Route::group (['middleware' => ['web']], function () {
    Route::post ('/add_comment', array (
            'as' => 'add_comment',
            'uses' => 'Vis\Comments\CommentsController@doAddComment'
        )
    );
});