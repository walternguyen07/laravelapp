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
Breadcrumbs::register('admin.professionaltitles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.professionaltitles.management'), route('admin.professionaltitles.index'));
});

Breadcrumbs::register('admin.professionaltitles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.professionaltitles.index');
    $breadcrumbs->push(trans('menus.backend.professionaltitles.create'), route('admin.professionaltitles.create'));
});

Breadcrumbs::register('admin.professionaltitles.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.professionaltitles.index');
    $breadcrumbs->push(trans('menus.backend.professionaltitles.edit'), route('admin.professionaltitles.edit', $id));
});
