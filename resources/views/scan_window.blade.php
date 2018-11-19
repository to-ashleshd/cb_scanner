<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>CB-Scanner</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/commonJs.js') }}"></script>

    </head>
    <body style="padding-top:70px">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                               aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container" style="margin-top:10px">
            <form method="post" action="/scan_submit">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="class">Select Class</label>
                            <select class="selectpicker form-control" name="class_id" id="class_id"
                                    load-url="{{ url('/subjects/') }}">
                                <option value=""></option>
                                @foreach($classes as $key=>$value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group" id="subject_div">
                            <label for="class">Select subject</label>
                            <select class="selectpicker form-control" name="subject_id" id="subjet_id"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="book_div">
                            <label for="class">Select Book</label>
                            <select class="selectpicker form-control" name="book_id" id="book_id"></select>
                        </div>
                    </div>
                </div>	
                <div class="row col-md-12">
                    <button type="button" class="btn btn-default" id="scan_submit" 
                            load-url="{{ url('/scan_submit') }}">Scan</button>
                </div>
            </form>
        </div><!-- Main component for a primary marketing message or call to action -->
    </body>
</html>
