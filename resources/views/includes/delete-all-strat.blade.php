<form action="{{route('deleteSelected')}}" method="POST" class="form-inline">
    @csrf
    {{method_field('DELETE')}}
    <select name="checkBoxArray" id="" class="form-control">
        <option value="delete">Delete</option>
    </select>
    <input type="submit" class="btn btn-danger" value="Delete">