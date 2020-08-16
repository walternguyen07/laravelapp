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
Breadcrumbs::register('admin.watcheds.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.watcheds.management'), route('admin.watcheds.index'));
});

Breadcrumbs::register('admin.watcheds.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.watcheds.index');
    $breadcrumbs->push(trans('menus.backend.watcheds.create'), route('admin.watcheds.create'));
});

Breadcrumbs::register('admin.watcheds.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.watcheds.index');
    $breadcrumbs->push(trans('menus.backend.watcheds.edit'), route('admin.watcheds.edit', $id));
});
