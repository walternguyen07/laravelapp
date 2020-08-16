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
Breadcrumbs::register('admin.khachhangs.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.khachhangs.management'), route('admin.khachhangs.index'));
});

Breadcrumbs::register('admin.khachhangs.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.khachhangs.index');
    $breadcrumbs->push(trans('menus.backend.khachhangs.create'), route('admin.khachhangs.create'));
});

Breadcrumbs::register('admin.khachhangs.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.khachhangs.index');
    $breadcrumbs->push(trans('menus.backend.khachhangs.edit'), route('admin.khachhangs.edit', $id));
});
