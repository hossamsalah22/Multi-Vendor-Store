<x-form.input name="title" label="Slider Title" class="col-6" :value="$slider->title ?? ''"/>
<x-form.input name="price" type="number" min="1" label="Slider Price" class="col-6" :value="$slider->price ?? ''"/>
<x-form.textarea name="description" label="Slider Description" class="col-6" :value="$slider->description ?? ''"/>
<x-form.image-input name="image" label="Slider Image" :value="$slider->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' Slider'" class="col-12"/>
