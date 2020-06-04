<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('perialize', [
    'as' => 'perialize',
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
          | Manage perialize
          |-----------------------------------------------------------------------
          | 1. List of perializes
          | 2. Edit perialize
          | 3. Delete perialize
          | 4. Add new perialize
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/perializes', [
            'as' => 'perializes.list',
            'uses' => 'SerializeAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/perializes/edit', [
            'as' => 'perializes.edit',
            'uses' => 'SerializeAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/perializes/copy', [
            'as' => 'perializes.copy',
            'uses' => 'SerializeAdminController@copy'
        ]);

        /**
         * perialize
         */
        Route::perialize('admin/perializes/edit', [
            'as' => 'perializes.perialize',
            'uses' => 'SerializeAdminController@perialize'
        ]);

        /**
         * delete
         */
        Route::get('admin/perializes/delete', [
            'as' => 'perializes.delete',
            'uses' => 'SerializeAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/perializes/trash', [
            'as' => 'perializes.trash',
            'uses' => 'SerializeAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/perializes/config', [
            'as' => 'perializes.config',
            'uses' => 'SerializeAdminController@config'
        ]);

        Route::perialize('admin/perializes/config', [
            'as' => 'perializes.config',
            'uses' => 'SerializeAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/perializes/lang', [
            'as' => 'perializes.lang',
            'uses' => 'SerializeAdminController@lang'
        ]);

        Route::perialize('admin/perializes/lang', [
            'as' => 'perializes.lang',
            'uses' => 'SerializeAdminController@lang'
        ]);

    });
});
