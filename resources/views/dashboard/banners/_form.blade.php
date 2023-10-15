<x-form.input name="title" label="Title" class="col-6" :value="$banner->title ?? ''"/>
<x-form.textarea name="description" label="Description" class="col-6" :value="$banner->description ?? ''"/>
<x-form.image-input name="image" label="Image" :value="$banner->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' ' . __('Banner')" class="col-12"/>
