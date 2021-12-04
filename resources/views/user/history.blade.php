@extends('layouts.app')


@section('title', 'History')
@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('user.sidebar')
            <div class="col py-3">
                <div class="container">
                    <h2 class="text-custom-4 mb-4">History Quiz</h2>
                    <hr>
                    <div class="row g-4">
                        @forelse ($attempHistory as $attemp)
                            <div class="col-md-4 p-2">
                                <div class="bg-custom-2 rounded-3 p-3 text-custom-3 shadow">
                                    <h4 class="text-custom-4">{{ $attemp->quiz->name }}</h4>
                                    <hr>
                                    <div class="row me-3">
                                        <div class="col-6">
                                            <p>Waktu : {{ $attemp->quiz->time }} menit</p>
                                            <p>Pertanyaan : {{ $attemp->quiz->questions_count }}</p>
                                        </div>
                                        <div class="col-6 bg-custom-3 rounded-3 text-custom-2">
                                            <h5 class="text-center fw-bolder">Score</h5>
                                            <h2 class="text-center fw-bold">{{ $attemp->score }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col p-2 bg-custom-2 text-custom-3">
                                <h4 class="text-center">There is no data available right now !</h4>
                            </div>
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
