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

@section ('title', trans('labels.backend.professionaltitles.management') . ' | ' . trans('labels.backend.professionaltitles.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.professionaltitles.management') }}
        <small>{{ trans('labels.backend.professionaltitles.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.professionaltitles.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-professionaltitle']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.professionaltitles.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.professionaltitles.partials.professionaltitles-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.professionaltitles.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.professionaltitles.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
