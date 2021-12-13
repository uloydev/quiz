@extends('layouts.admin')

@section('title', 'Manage Question')
@section('page-name', 'Question List of ' . $quiz->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Question table</h6>
                        <a href="{{ route('admin.quiz.index') }}" class="btn btn-light mr-4">Back To Quiz List</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 px-4">
                    <edit-question :question="{{ $question }}" token="{{ csrf_token() }}"></edit-question>
                </div>
            </div>
        </div>
    </div>
@endsection
