<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('navs.backend.dashboard'), route('admin.dashboard'));
});

require __DIR__.'/Search.php';
require __DIR__.'/Access/User.php';
require __DIR__.'/Access/Role.php';
require __DIR__.'/Access/Permission.php';
require __DIR__.'/Page.php';
require __DIR__.'/Setting.php';
require __DIR__.'/Blog_Category.php';
require __DIR__.'/Blog_Tag.php';
require __DIR__.'/Blog_Management.php';
require __DIR__.'/Faqs.php';
require __DIR__.'/Menu.php';
require __DIR__.'/LogViewer.php';

require __DIR__.'/Banner.php';
require __DIR__.'/Department.php';
require __DIR__.'/ProfessionalTitle.php';
require __DIR__.'/PhongBan.php';
require __DIR__.'/Khachhang.php';
require __DIR__.'/Interest.php';
require __DIR__.'/Watched.php';
require __DIR__.'/RealEstateListing.php';