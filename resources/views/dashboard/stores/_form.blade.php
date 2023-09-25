<div class="form-group">
    <label for="name">Store Name:</label>
    <input type="text" name="name" id="name" value="{{ $store->name }}" class="form-control"
           placeholder="Enter Store Name">
</div>
<div class="form-group">
    <label for="description">Store Description:</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control"
              placeholder="Enter Store Description">{{$store->description }}</textarea>
</div>
<div class="form-group">
    <label for="image">Store Image:</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*">
    @if($store->image)
        <img id="image-preview" src="{{ $store->image }}" alt="Image Preview"
             style="max-width: 100%; max-height: 200px;">
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">{{ $action }} Store</button>
</div>
