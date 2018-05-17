{!! Form::open(['url' => $delete_url, 'method' => 'DELETE']) !!}
    <a href="{{ $show_url }}" class="btn btn-sm blue btn-outline">Show</a>
    <a href="{{ $edit_url }}" class="btn btn-sm dark btn-outline">Edit</a>
    <button 
        type="submit" 
        class="btn btn-sm red btn-outline"
        onclick="alert('Are you sure want to delete this data ?')"
    >Delete</button>
{!! Form::close() !!}