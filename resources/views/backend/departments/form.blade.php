<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.backend.department.title'), ['class' => 'col-lg-2 control-label required']) }}

    <div class="col-lg-10">
        {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.department.title'), 'required' => 'required']) }}
    </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
    {{ Form::label('status', trans('validation.attributes.backend.department.is_active'), ['class' => 'col-lg-2 control-label']) }}

    <div class="col-lg-10">
        <div class="control-group">
            <label class="control control--checkbox">
                    @if(isset($departments->status) && !empty ($departments->status))
                        {{ Form::checkbox('status', 1, true) }}
                    @else
                        {{ Form::checkbox('status', 1, false) }}
                    @endif
                <div class="control__indicator"></div>
            </label>
        </div>
    </div><!--col-lg-3-->
</div>
