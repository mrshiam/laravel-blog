<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Select Category</option>
        @foreach($categories as $id=>$category)
            <option value="{{$id}}" @if(old('category_id',isset($post)?$post->category_id:null) == $id) selected @endif>{{$category}}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="author_id">Author</label>
    <select name="author_id" id="author_id" class="form-control">
        <option value="">Select Author</option>
        @foreach($authors as $id=>$author)
            <option value="{{$id}}" @if(old('author_id',isset($post)?$post->author_id:null) == $id) selected @endif>{{$author}}</option>
        @endforeach
    </select>
    @error('author_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{old('title',isset($post)?$post->title:null)}}" placeholder="Enter Post Title" required>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="details">Details</label>
    <textarea name="details" id="details" cols="30" rows="3" class="form-control" placeholder="Enter Post Details">{{old('details',isset($post)?$post->details:null)}}</textarea>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Post's Photo</label>
    <input type="file" name="image" class="form-control" id="image">
    @error('photo')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="is_featured">Is Featured</label>
    <input type="checkbox" name="is_featured"  id="is_featured" @if(old('is_featured',isset($post)?$post->is_featured:null) == 1) checked @endif value="1">
    <label for="is_featured">Yes</label>
    @error('is_featured')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="is_trending">Is Trending</label>
    <input type="checkbox" name="is_trending"  id="is_trending" @if(old('is_trending',isset($post)?$post->is_trending:null) == 1) checked @endif value="1">
    <label for="is_trending">Yes</label>
    @error('is_trending')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="is_editors_pick">Is Editor's Pick</label>
    <input type="checkbox" name="is_editors_pick"  id="is_editors_pick" @if(old('is_editors_pick',isset($post)?$post->is_editors_pick:null) == 1) checked @endif value="1">
    <label for="is_editors_pick">Yes</label>
    @error('is_editors_pick')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input id="published" type="radio" @if(old('status',isset($post)?$post->status:null) == 'Published') checked @endif name="status" value="Published">
    <label for="published">Published</label>
    <input id="unpublished" type="radio" @if(old('status',isset($post)?$post->status:null) == 'Unpublished') checked @endif name="status" value="Unpublished">
    <label for="unpublished">Unpublished</label>
    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>



