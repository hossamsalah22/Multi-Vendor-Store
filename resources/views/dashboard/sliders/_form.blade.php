<x-form.input name="title" label="Title" class="col-6" :value="$slider->title ?? ''"/>
<x-form.input name="price" type="number" min="1" label="Price" class="col-6" :value="$slider->price ?? ''"/>
<x-form.textarea name="description" label="Description" class="col-6" :value="$slider->description ?? ''"/>
<x-form.image-input name="image" label="Image" :value="$slider->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' ' . __('Slider')" class="col-12"/>
