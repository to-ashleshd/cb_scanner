<label for="class">Select Book</label>
<select class="selectpicker form-control" name="book_id" id="book_id"
        load-url="{{ url('/books/') }}">
    <option value="">Select Book</option>
    @foreach($books as $key=>$value)
        <option value="{{$value->id}}">{{$value->name}}</option>
    @endforeach
</select>