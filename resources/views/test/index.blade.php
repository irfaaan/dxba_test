@extends('layout.master')

@push('css')
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="text-center">
        <a class="btn btn-light text-lg" href="{{route('logout')}}">Logout</a></div>
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 d-flex justify-content-center bg-success p-3">
            <form id="question-form" class="w-100">
                @csrf
                <div class="form-group">
                    <h3 class="text-center">
                        Question: <span id="question_no"></span>
                    </h3>
                    <h5 class="question" id="question"></h5>
                    <div class="answers">
                        <input type="radio" id="ans1" name="answer" value="opt_1" required>
                        <label for="ans1" class="option" id="opt_1"></label><br>
                        <input type="radio" id="ans2" name="answer" value="opt_2" required>
                        <label for="ans2" class="option" id="opt_2"></label> <br>
                        <input type="radio" id="ans3" name="answer" value="opt_3" required>
                        <label for="ans3" class="option" id="opt_3"></label> <br>
                        <input type="radio" id="ans4" name="answer" value="opt_4" required>
                        <label for="ans4" class="option" id="opt_4"></label> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="button" id="skip-btn" class="btn btn-secondary form-control">Skip</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-secondary form-control">Next</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    @include('test.indexJs')

@endpush