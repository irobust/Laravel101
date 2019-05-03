@foreach($errors->all() as $message)
    <div>{{ $message }}</div>
@endforeach

<form action="{{ route('create-post') }}" method="POST">
    {{ csrf_field() }}
    <div>
        <label for="title">Title: </label>
        <input type="text" name="title" value="{{ old('title') }}" />
    </div>
    @error('title')
        <div>{{ $message }}</div>
    @enderror
    <div>
        <label for="body">Body:</label>
        <textarea name="body" cols="30" rows="10">{{ old('body') }}</textarea>
    </div>
    @error('body')
        <div>{{ $message }}</div>
    @enderror
    <button type="submit">Save</button>
</form>