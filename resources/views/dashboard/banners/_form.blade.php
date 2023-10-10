<x-form.input name="title" label="Banner Title" class="col-6" :value="$banner->title ?? ''"/>
<x-form.textarea name="description" label="Banner Description" class="col-6" :value="$banner->description ?? ''"/>
<x-form.image-input name="image" label="Banner Image" :value="$banner->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' Banner'" class="col-12"/>
