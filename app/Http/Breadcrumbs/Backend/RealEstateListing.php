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
Breadcrumbs::register('admin.realestatelistings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.realestatelistings.management'), route('admin.realestatelistings.index'));
});

Breadcrumbs::register('admin.realestatelistings.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.realestatelistings.index');
    $breadcrumbs->push(trans('menus.backend.realestatelistings.create'), route('admin.realestatelistings.create'));
});

Breadcrumbs::register('admin.realestatelistings.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.realestatelistings.index');
    $breadcrumbs->push(trans('menus.backend.realestatelistings.edit'), route('admin.realestatelistings.edit', $id));
});
