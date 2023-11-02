<x-form.input name="title_en" label="Title English" class="col-6"
              :value="$banner->getTranslation('title', 'en') ?? ''"/>
<x-form.input name="title_ar" label="Title Arabic" class="col-6"
              :value="$banner->getTranslation('title', 'ar') ?? ''"/>
<x-form.textarea name="description_en" label="Description English" class="col-6"
                 :value="$banner->getTranslation('description', 'en') ?? ''"/>
<x-form.textarea name="description_ar" label="Description Arabic" class="col-6"
                 :value="$banner->getTranslation('description', 'ar') ?? ''"/>
<x-form.image-input name="image" label="Image" :value="$banner->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' ' . __('Banner')" class="col-12"/>
