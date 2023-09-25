<div class="form-group">
    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control"
           placeholder="Enter Category Name">
</div>
<div class="form-group">
    <label for="description">Category Description:</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control"
              placeholder="Enter Category Description">{{$category->description }}</textarea>
</div>
<div class="form-group">
    <label for="parent_id">Parent Category:</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="" disabled selected>Select Parent Category</option>
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
    <input type="file" name="image" id="image" class="form-control" accept="image/*">
    <img id="image-preview" src="{{ $category->image }}" alt="Image Preview"
         style="max-width: 100%; max-height: 200px;">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">{{ $action }} Category</button>
</div>
