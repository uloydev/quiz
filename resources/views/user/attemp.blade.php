@extends('layouts.app')


@section('title', 'Attemp Quiz')
@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('user.sidebar')
        <div class="col py-3 overflow-auto">
            <quiz-component :quiz="{{ $quiz }}" token="{{ csrf_token() }}" url="{{ route('user.attemp', $quiz->id) }}"></quiz-component>
        </div>
    </div>
</div>
@endsection


