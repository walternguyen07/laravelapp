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
?>
@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.phongbans.management') . ' | ' . trans('labels.backend.phongbans.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.phongbans.management') }}
        <small>{{ trans('labels.backend.phongbans.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($phongbans, ['route' => ['admin.phongbans.update', $phongban], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-phongban']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.phongbans.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.phongbans.partials.phongbans-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.phongbans.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.phongbans.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
