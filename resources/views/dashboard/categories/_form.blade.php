<x-form.input name="name" label="Category Name" class="col-6" :value="$category->name ?? ''"/>
<x-form.textarea name="description" label="Category Description" class="col-6" :value="$category->description ?? ''"/>
<x-form.select-input name="parent_id" label="Primary Category" class="col-6" :options="$parentCategories"
                     :selected="$category->parent_id ?? null"/>
<x-form.image-input name="image" label="Category Image" :value="$category->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' Category'" class="col-12"/>
