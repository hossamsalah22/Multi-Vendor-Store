<x-form.input name="title_en" label="Title English" class="col-6"
              :value="$slider->getTranslation('title', 'en') ?? ''"/>
<x-form.input name="title_ar" label="Title Arabic" class="col-6" :value="$slider->getTranslation('title', 'ar') ?? ''"/>
<x-form.textarea name="description_en" label="Description English" class="col-6"
                 :value="$slider->getTranslation('description', 'en') ?? ''"/>
<x-form.textarea name="description_ar" label="Description Arabic" class="col-6"
                 :value="$slider->getTranslation('description', 'ar') ?? ''"/>
<x-form.input name="price" type="number" min="1" label="Price" class="col-6" :value="$slider->price ?? ''"/>
<x-form.image-input name="image" label="Image" :value="$slider->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' ' . __('Slider')" class="col-12"/>
