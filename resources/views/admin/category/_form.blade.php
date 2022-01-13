<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{old('name',isset($category)?$category->name:null)}}" placeholder="Enter user name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input id="active" type="radio" @if(old('status',isset($category)?$category->status:null) == 'Active') checked @endif name="status" value="Active">
    <label for="active">Active</label>
    <input id="inactive" type="radio" @if(old('status',isset($category)?$category->status:null) == 'Inactive') checked @endif name="status" value="Inactive">
    <label for="inactive">Inactive</label>
    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
