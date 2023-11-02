<x-form.input name="name_en" label="Name English" class="col-6" :value="$category->getTranslation('name', 'en') ?? ''"/>
<x-form.input name="name_ar" label="Name Arabic" class="col-6" :value="$category->getTranslation('name', 'ar') ?? ''"/>
<x-form.textarea name="description_en" label="Description English" class="col-6"
                 :value="$category->getTranslation('description', 'en') ?? ''"/>
<x-form.textarea name="description_ar" label="Description Arabic" class="col-6"
                 :value="$category->getTranslation('description', 'ar') ?? ''"/>
<x-form.select-input name="parent_id" label="Primary Category" class="col-6" :options="$parentCategories"
                     :selected="$category->parent_id ?? null"/>
<x-form.image-input name="image" label="Image" :value="$category->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' ' . __('Category')" class="col-12"/>
