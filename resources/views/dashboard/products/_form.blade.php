<x-form.input name="name" :value="$product->name" label="Product Name" placeholder="Enter Product Name"
              class="col-6"/>
<x-form.textarea name="description" :value="$product->description" label="Product Description" class="col-6"/>
<x-form.input type="number" name="quantity" :value="$product->quantity" label="Product Quantity"
              placeholder="Enter Product Quantity" class="col-6"/>
<x-form.input type="number" name="price" :value="$product->price" label="Product Price"
              placeholder="Enter Product Price" class="col-6"/>
<x-form.select-input name="category_id" label="Product Category" placeholder="Select Category" :options="$categories"
                     :selected="$product->category_id" class="col-6"/>
<x-form.select-input name="store_id" label="Product Store" placeholder="Select Store" :options="$stores"
                     :selected="$product->store_id" class="col-6"/>
<x-form.image-input name="image" label="Product Image" :value="$product->image" class="col-12"/>
<x-form.submit-button :value="$action.' Product'" class="col-12"/>


