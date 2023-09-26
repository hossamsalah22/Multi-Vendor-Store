<x-form.input name="name" label="Store Name" :value="$store->name ?? ''" class="col-6"/>
<x-form.textarea name="description" label="Store Description" :value="$store->description ?? ''" class="col-6"/>
<x-form.image-input name="image" label="Store Image" :value="$store->image ?? ''" class="col-6"/>
<x-form.submit-button :value='$action . " Store"' class="col-12"/>
