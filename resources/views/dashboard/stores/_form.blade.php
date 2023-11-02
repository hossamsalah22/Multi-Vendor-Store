<x-form.input name="name_en" label="Name English" placeholder="Enter Store Name English"
              :value="$store->getTranslation('name', 'en') ?? ''" class="col-6"/>
<x-form.input name="name_ar" label="Name Arabic" placeholder="Enter Store Name Arabic"
              :value="$store->getTranslation('name', 'ar') ?? ''" class="col-6"/>
<x-form.textarea name="description_en" label="Description English"
                 :value="$store->getTranslation('description', 'en') ?? ''" class="col-6"/>
<x-form.textarea name="description_ar" label="Description Arabic"
                 :value="$store->getTranslation('description', 'ar') ?? ''" class="col-6"/>
<x-form.image-input name="image" label="Image" :value="$store->image ?? ''" class="col-6"/>
<x-form.submit-button :value='$action . " " . __("Store")' class="col-12"/>
