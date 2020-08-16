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
Breadcrumbs::register('admin.phongbans.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.phongbans.management'), route('admin.phongbans.index'));
});

Breadcrumbs::register('admin.phongbans.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.phongbans.index');
    $breadcrumbs->push(trans('menus.backend.phongbans.create'), route('admin.phongbans.create'));
});

Breadcrumbs::register('admin.phongbans.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.phongbans.index');
    $breadcrumbs->push(trans('menus.backend.phongbans.edit'), route('admin.phongbans.edit', $id));
});
