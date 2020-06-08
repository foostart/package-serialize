<?php

use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use Foostart\Category\Helpers\FooCategory;
use Foostart\Category\Helpers\SortTable;

/*
|-----------------------------------------------------------------------
| GLOBAL VARIABLES
|-----------------------------------------------------------------------
|   $sidebar_items
|   $sorting
|   $order_by
|   $plang_admin = 'serialize-admin'
|   $plang_front = 'serialize-front'
*/
View::composer([
                'package-serialize::admin.serialize-edit',
                'package-serialize::admin.serialize-form',
                'package-serialize::admin.serialize-items',
                'package-serialize::admin.serialize-item',
                'package-serialize::admin.serialize-search',
                'package-serialize::admin.serialize-config',
                'package-serialize::admin.serialize-lang',
    ], function ($view) {

        //Order by params
        $params = Request::all();

        /**
         * $plang-admin
         * $plang-front
         */

        $plang_admin = 'serialize-admin';
        $plang_front = 'serialize-front';

        $fooCategory = new FooCategory();
        $key = $fooCategory->getContextKeyByRef('admin/serialize');

        /**
         * $sidebar_items
         */
        $sidebar_items = [
            trans('serialize-admin.sidebar.add') => [
                'url' => URL::route('serialize.edit', []),
                'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'
            ],
            trans('serialize-admin.sidebar.list') => [
                "url" => URL::route('serialize.list', []),
                'icon' => '<i class="fa fa-list-ul" aria-hidden="true"></i>'
            ],
            trans('serialize-admin.sidebar.category') => [
                'url'  => URL::route('categories.list',['_key='.$key]),
                'icon' => '<i class="fa fa-sitemap" aria-hidden="true"></i>'
            ],
            trans('serialize-admin.sidebar.config') => [
                "url" => URL::route('serialize.config', []),
                'icon' => '<i class="fa fa-braille" aria-hidden="true"></i>'
            ],
            trans('serialize-admin.sidebar.lang') => [
                "url" => URL::route('serialize.lang', []),
                'icon' => '<i class="fa fa-language" aria-hidden="true"></i>'
            ],
        ];

        /**
         * $sorting
         * $order_by
         */
        $orders = [
            '' => trans($plang_admin.'.form.no-selected'),
            'id' => trans($plang_admin.'.fields.id'),
            'sequence' => trans($plang_admin.'.fields.sequence'),
            'serialize_name' => trans($plang_admin.'.fields.name'),
            'serialize_status' => trans($plang_admin.'.fields.status'),
            'updated_at' => trans($plang_admin.'.fields.updated_at'),
        ];
        $sortTable = new SortTable();
        $sortTable->setOrders($orders);
        $sorting = $sortTable->linkOrders();


        //Order by
        $order_by = [
            'asc' => trans('category-admin.order.by-asc'),
            'desc' => trans('category-admin.order.by-des'),
        ];

        // assign to view
        $view->with('sidebar_items', $sidebar_items );
        $view->with('order_by', $order_by);
        $view->with('sorting', $sorting);
        $view->with('plang_admin', $plang_admin);
        $view->with('plang_front', $plang_front);
});
