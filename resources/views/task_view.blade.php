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
                    <a class="navbar-brand" href="#">CB Scanner</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/scan">Scan</a></li>
                        <li class="active"><a href="/view">View</a></li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                               aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                            </ul>
                        </li> -->
                    </ul>
                    <!-- <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
                    </ul> -->
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container" style="margin-top:10px">
        <label for="class">Scan Task List</label>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">Class</th>
                <th class="text-center">Satndard</th>
                <th class="text-center">Chapter</th>
                <th class="text-center">PDF</th>
            </tr>
            </thead>
            <tbody>
                @if(!empty($scan_details))
                    @foreach($scan_details as $tasks)
                    <tr>
                    <td class="text-center">{{ $tasks->subject_id }}</td>
                    <td class="text-center">{{ $tasks->standard_id }}</td>
                    <td class="text-center">{{ $tasks->chapter_id }}</td>
                    <td class="text-center"><a target="_blank" href="{{ asset('book_pdf/'.$tasks->standard_id.'/'.$tasks->subject_id.'/'.$tasks->book_id.'/'.$tasks->chapter_id.'/'.$tasks->pdf_name) }}">{{ $tasks->pdf_name }}</a></td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td col-span="4" class="text-center">No task available</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $scan_details->links() }}
    </div>
    </body>
</html>
