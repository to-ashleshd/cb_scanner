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

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/HoldOn.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css"/>
        
        <script src="{{ asset('includes/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        
        <script src="{{ asset('includes/bootstrap-growl/bootstrap-growl.min.js') }}"></script>  
        
        
        <link href="{{ asset('includes/bootstrap-sweetalert/lib/sweet-alert.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('includes/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>
        
        <script src="{{ asset('js/HoldOn.min.js') }}"></script>
        <script src="{{ asset('js/commonJs.js') }}"></script>
        <script src="{{ asset('js/cm.js') }}"></script>
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
