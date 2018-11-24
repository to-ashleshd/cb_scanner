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
