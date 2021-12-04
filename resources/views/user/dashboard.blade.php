@extends('layouts.app')


@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('user.sidebar')
            <div class="col py-3 overflow-auto">
                <div class="container">
                    <h2 class="text-custom-4 mb-4">Available Quiz</h2>
                    <hr>
                    <div class="row g-4">
                        @foreach ($availableQuiz as $quiz)
                            <div class="col-md-4 p-2 h-auto">
                                <div class="bg-custom-2 rounded-3 p-3 text-custom-4 shadow h-100 d-flex flex-column justify-content-between">
                                    <h4 class="text-custom-5">{{ $quiz->name }}</h4>
                                    <hr>
                                    <p>Time : {{ $quiz->time }} menit</p>
                                    <p>Question : {{ $quiz->questions_count }}</p>
                                    <a class="btn bg-custom-4 text-custom-1 btn w-100 font-weight-bold" href="{{ route('user.attemp', ['quiz'=> $quiz->id]) }}">Attemp Now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
