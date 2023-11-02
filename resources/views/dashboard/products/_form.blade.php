<x-form.input name="name_en" :value="$product->getTranslation('name', 'en')" label="Name English"
              placeholder="Enter Product Name English"
              class="col-6"/>
<x-form.input name="name_ar" :value="$product->getTranslation('name', 'ar')" label="Name Arabic"
              placeholder="Enter Product Name Arabic"
              class="col-6"/>
<x-form.textarea name="description_en" :value="$product->getTranslation('description', 'en')"
                 label="Description English" class="col-6"/>
<x-form.textarea name="description_ar" :value="$product->getTranslation('description', 'ar')" label="Description Arabic"
                 class="col-6"/>
<x-form.input type="number" name="price" :value="$product->price" label="Price"
              placeholder="Enter Product Price" class="col-6"/>

<x-form.input type="number" name="compare_price" :value="$product->compare_price" label="Discount Price"
              placeholder="Enter Product Discount Price" class="col-6"/>
<x-form.input type="number" name="quantity" :value="$product->quantity" label="Quantity"
              placeholder="Enter Product Quantity" class="col-6"/>
<x-form.select-input name="category_id" label="Category" :options="$categories"
                     :selected="$product->category_id ?? null" class="col-6"/>
<x-form.select-input name="store_id" label="Store" placeholder="Select Store" :options="$stores"
                     :selected="$product->store_id" class="col-6"/>
<x-form.image-input name="image" label="Image" :value="$product->image" class="col-12"/>
<x-form.submit-button :value="$action.' ' . __('Product')" class="col-12"/>


