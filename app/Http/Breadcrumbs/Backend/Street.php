<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade laravel walter package to newer
 * versions in the future.
 *
 * @category    Walter
 * @package     Laravel
 * @author      Walter Nguyen
 * @copyright   Copyright (c) Walter Nguyen
 */
Breadcrumbs::register('admin.streets.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.streets.management'), route('admin.streets.index'));
});

Breadcrumbs::register('admin.streets.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.streets.index');
    $breadcrumbs->push(trans('menus.backend.streets.create'), route('admin.streets.create'));
});

Breadcrumbs::register('admin.streets.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.streets.index');
    $breadcrumbs->push(trans('menus.backend.streets.edit'), route('admin.streets.edit', $id));
});
