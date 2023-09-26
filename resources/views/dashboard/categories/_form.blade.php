<div class="form-group">
    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control"
           placeholder="Enter Category Name">
</div>
<div class="form-group">
    <label for="description">Category Description:</label>
    <textarea name="description" id="description" class="form-control"
              placeholder="Enter Category Description">{{$category->description }}</textarea>
</div>
<div class="form-group">
    <label for="parent_id">Primary Category:</label>
    <select name="parent_id" id="parent_id" class="form-control select2">
        <option value="" selected>Primary Category</option>
        @foreach($parentCategories as $parentCategory)
            <option
                value="{{ $parentCategory->id }}" @selected($parentCategory->id == $category->parent_id)>
                {{ $parentCategory->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="image">Category Image:</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="image" id="image" class="custom-file-input" accept="image/*">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>
    @if($category->image)
        <label for="old-image" class="mt-2 col-12">Current Category Image:</label>
        <img src="{{ $category->image }}" alt="{{ $category->name }}"
             style="max-width: 100%; max-height: 200px;" class="mt-1">
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">{{ $action }} Category</button>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
