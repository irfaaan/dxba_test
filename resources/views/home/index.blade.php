@extends('layout.master')

@section('content')
<style>
    body{
        background-color: black;
    }
</style>
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 d-flex justify-content-center bg-success p-5">

            <form id="user-form" class="w-100 text-center my-5">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Enter Your Full Name">
                </div>
                <button type="submit" class="btn btn-secondary px-5">Next</button>
            </form>

        </div>
    </div>

@endsection

@push('scripts')

    @include('home.indexJs')

@endpush




