@extends('layout.master')

@section('content')

    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-lg-4 col-md justify-content-center bg-success p-5">
            <h4 class="h4 text-center">Test Result</h4> <br />

            <table class="table table-lg">
                <tr>
                    <td>Correct Answers</td><td>{{$result->correct}}</td>
                </tr>

                <tr>
                    <td>Wrong Answers</td><td>{{$result->wrong}}</td>
                </tr>

                <tr>
                    <td>Skipped Answers</td><td>{{$result->skipped}}</td>
                </tr>
            </table>

            <a class="btn btn-light pull-right" href="{{route('logout')}}">Logout</a>
            <a class="btn btn-warning" href="{{route('test')}}">Try Again</a>
        </div>
    </div>

@endsection
