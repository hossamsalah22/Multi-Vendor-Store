{{--products (id, name, image, quantity, slug, price, description, active, category_id(FK), store_id(FK));--}}
<div class="form-group">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control"
           placeholder="Enter Product Name">
</div>
<div class="form-group">
    <label for="description">Product Description:</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control"
              placeholder="Enter Product Description">{{ $product->description }}</textarea>
</div>
<div class="form-group">
    <label for="image">Product Image:</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*">
    @if($product->image)
        <img id="image-preview" src="{{ $product->image }}" alt="Image Preview"
             style="max-width: 100%; max-height: 200px;">
    @endif
</div>
<div class="form-group">
    <label for="quantity">Product Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control"
           placeholder="Enter Product Quantity">
</div>
<div class="form-group">
    <label for="price">Product Price:</label>
    <input type="number" name="price" id="price" value="{{ $product->price }}" class="form-control"
           placeholder="Enter Product Price">
</div>
<div class="form-group">
    <label for="category_id">Product Category:</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="" disabled selected>Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="store_id">Product Store:</label>
    <select name="store_id" id="store_id" class="form-control">
        <option value="" disabled selected>Select Store</option>
        @foreach($stores as $store)
            <option value="{{ $store->id }}" {{ $product->store_id == $store->id ? 'selected' : '' }}>
                {{ $store->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">{{ $action }} Product</button>
</div>
