<x-form.input name="name" label="Name" :value="$store->name ?? ''" class="col-6"/>
<x-form.textarea name="description" label="Description" :value="$store->description ?? ''" class="col-6"/>
<x-form.image-input name="image" label="Image" :value="$store->image ?? ''" class="col-6"/>
<x-form.submit-button :value='$action . " " . __("Store")' class="col-12"/>
