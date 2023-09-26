<div class="form-group">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control"
           placeholder="Enter Product Name">
</div>
<div class="form-group">
    <label for="description">Product Description:</label>
    <textarea name="description" id="description" class="form-control"
              placeholder="Enter Product Description">{{ $product->description }}</textarea>
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
    <select name="category_id" id="category_id" class="form-control select2"
            style="width: 100%;">
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
    <select name="store_id" id="store_id" class="form-control select2">
        <option value="" disabled selected>Select Store</option>
        @foreach($stores as $store)
            <option value="{{ $store->id }}" {{ $product->store_id == $store->id ? 'selected' : '' }}>
                {{ $store->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="image">Product Image:</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="image" id="image" class="custom-file-input" accept="image/*">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>
    @if($product->image)
        <label for="old-image" class="mt-2">Current Product Image:</label>
        <img src="{{ $product->image }}" alt="{{ $product->name }}"
             style="max-width: 100%; max-height: 200px;" class="mt-1">
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">{{ $action }} Product</button>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
