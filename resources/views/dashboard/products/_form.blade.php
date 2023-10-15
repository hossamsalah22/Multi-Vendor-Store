<x-form.input name="name" :value="$product->name" label="Name" placeholder="Enter Product Name"
              class="col-6"/>
<x-form.textarea name="description" :value="$product->description" label="Description" class="col-6"/>
<x-form.input type="number" name="quantity" :value="$product->quantity" label="Quantity"
              placeholder="Enter Product Quantity" class="col-6"/>
<x-form.input type="number" name="price" :value="$product->price" label="Price"
              placeholder="Enter Product Price" class="col-6"/>
<x-form.select-input name="category_id" label="Category" :options="$categories"
                     :selected="$product->category_id ?? null" class="col-6"/>
<x-form.select-input name="store_id" label="Store" placeholder="Select Store" :options="$stores"
                     :selected="$product->store_id" class="col-6"/>
<x-form.image-input name="image" label="Image" :value="$product->image" class="col-12"/>
<x-form.submit-button :value="$action.' ' . __('Product')" class="col-12"/>


