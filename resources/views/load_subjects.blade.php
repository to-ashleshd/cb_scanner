<label for="class">Select subject</label>
<select class="selectpicker form-control" name="subject_id" id="subject_id"
        load-url="{{ url('/load_books/') }}">
    <option value=""></option>
    @foreach($subjects as $key=>$value)
        <option value="{{$value->subject_id}}">{{$value->subject}}</option>
    @endforeach
</select>