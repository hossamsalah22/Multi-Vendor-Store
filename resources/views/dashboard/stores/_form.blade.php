<div class="form-group">
    <label for="name">Store Name:</label>
    <input type="text" name="name" id="name" value="{{ $store->name }}"
           class="form-control"
           placeholder="Enter Store Name">
</div>
<div class="form-group">
    <label for="description">Store Description:</label>
    <textarea name="description" id="description" class="form-control"
              placeholder="Enter Store Description">{{ $store->description }}</textarea>
</div>
<div class="form-group">
    <label for="image">Store Image:</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="image" id="image" class="custom-file-input" accept="image/*">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>
    @if($store->image)
        <label for="old-image" class="mt-2">Current Store Image:</label>
        <img src="{{ $store->image }}" alt="{{ $store->name }}"
             style="max-width: 100%; max-height: 200px;" class="mt-1">
    @endif
</div>
<div class="form-group mt-4">
    <button type="submit" class="btn btn-primary btn-block">{{ $action }} Store</button>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
