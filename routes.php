<?php

use Illuminate\Session\TokenMismatchException;


/**
 * FRONT
 */
Route::get('serialize', [
    'as' => 'serialize',
    'uses' => 'Foostart\Serialize\Controllers\Front\SerializeFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'Foostart\Serialize\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage serialize
          |-----------------------------------------------------------------------
          | 1. List of serialize
          | 2. Edit serialize
          | 3. Delete serialize
          | 4. Add new serialize
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/serialize', [
            'as' => 'serialize.list',
            'uses' => 'SerializeAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/serialize/edit', [
            'as' => 'serialize.edit',
            'uses' => 'SerializeAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/serialize/copy', [
            'as' => 'serialize.copy',
            'uses' => 'SerializeAdminController@copy'
        ]);

        /**
         * serialize
         */
        Route::post('admin/serialize/edit', [
            'as' => 'serialize.post',
            'uses' => 'SerializeAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/serialize/delete', [
            'as' => 'serialize.delete',
            'uses' => 'SerializeAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/serialize/trash', [
            'as' => 'serialize.trash',
            'uses' => 'SerializeAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/serialize/config', [
            'as' => 'serialize.config',
            'uses' => 'SerializeAdminController@config'
        ]);

        Route::post('admin/serialize/config', [
            'as' => 'serialize.config',
            'uses' => 'SerializeAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/serialize/lang', [
            'as' => 'serialize.lang',
            'uses' => 'SerializeAdminController@lang'
        ]);

        Route::post('admin/serialize/lang', [
            'as' => 'serialize.lang',
            'uses' => 'SerializeAdminController@lang'
        ]);

        /**
         * edit-add
         */
        Route::post('admin/serialize/updatesequence', [
            'as' => 'serialize.updatesequence',
            'uses' => 'SerializeAdminController@updateSequence'
        ]);

    });
});
