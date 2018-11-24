<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>CB-Scanner</title>
        
        @include('includes.css')
        @include('includes.js')

    </head>
    <body style="padding-top:70px">
        @include('includes.menunav')

        <div class="container" style="margin-top:10px">
            <form method="post" action="/scan_submit">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="class">Select Class</label>
                            <select class="selectpicker form-control" name="class_id" id="class_id"
                                    load-url="{{ url('/subjects/') }}">
                                <option value="">Select Class</option>
                                @foreach($classes as $key=>$value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group" id="subject_div">
                            <label for="class">Select subject</label>
                            <select class="selectpicker form-control" name="subject_id" id="subject_id">
                                <option value="">Select Subject</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="book_div">
                            <label for="class">Select Book</label>
                            <select class="selectpicker form-control" name="book_id" id="book_id">
                                <option value="">Select Book</option>
                            </select>
                        </div>
                    </div>
                </div>	
                <div class="row col-md-12">
                    <button type="button" class="btn btn-default" id="scan_submit" 
                            load-url="{{ url('/scan_submit') }}" 
                            load-chapter-url="{{ url('/chapters') }}">Scan</button>
                </div>
            </form>

            <div id="chapters_div" class="col-sm-12 col-md-12 col-xs-12" style="margin-top: 15px;">
                

            </div>

        </div><!-- Main component for a primary marketing message or call to action -->
    </body>
    
</html>
