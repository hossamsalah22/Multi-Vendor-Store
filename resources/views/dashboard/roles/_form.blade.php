<x-form.input name="name" label="Name" class="col-12" :value="$role->name ?? ''"/>
<x-form.input name="guard_name" label="Guard Name" class="col-12" :value="$role->guard_name ?? ''"/>
<fieldset class="form-group ">
    <legend>{{ __('Permissions') }}</legend>
    <label class="form-check form-check-lg form-check-custom form-check-solid fs-7 text-muted">
        <input name="selectAll" value="1" {{ old('selectAll') == '1' ? 'checked' : '' }}
        id="select_all" class="form-check-input h-15px w-15px" type="checkbox">
        <span for="select_all" class="form-check-label">{{ __('Select all') }}</span>
    </label>
    <div class="col-12 row">
        @foreach($permissions as $permission_code => $permission_name)
            <x-form.checkbox-input :value="$permission_code" :name="$permission_name"
                                   :checked="$role->hasPermissionTo($permission_code)"/>

        @endforeach
    </div>
</fieldset>
<x-form.submit-button :value="$action . ' ' . __('Role')" class="col-12"/>

