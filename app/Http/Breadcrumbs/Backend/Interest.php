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
Breadcrumbs::register('admin.interests.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.interests.management'), route('admin.interests.index'));
});

Breadcrumbs::register('admin.interests.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.interests.index');
    $breadcrumbs->push(trans('menus.backend.interests.create'), route('admin.interests.create'));
});

Breadcrumbs::register('admin.interests.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.interests.index');
    $breadcrumbs->push(trans('menus.backend.interests.edit'), route('admin.interests.edit', $id));
});
