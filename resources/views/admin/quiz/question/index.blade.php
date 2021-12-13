@extends('layouts.admin')

@section('title', 'Manage User')
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
                    <ul class="list-group my-3">
                        @forelse ($questions as $question)
                            <li class="list-group-item border-0 p-4 mb-3 bg-gradient-light border-radius-lg">
                                <form action="{{ route('admin.quiz.question.destroy', [$quiz->id, $question->id]) }}"
                                    method="POST" id="formDelete{{ $question->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <div class="row align-items-center">
                                    <div class="col-md-8 col-lg-9">
                                        <h6 class="mb-3">Question ID : {{ $question->id }}</h6>
                                        <p class="font-weight-bold">{{ $question->text }}</p>
                                    </div>
                                    <div class="col-md-4 col-lg-3 d-flex d-md-block">
                                        <div class="flex-fill d-grid">
                                            <button class="btn btn-primary m-2" type="submit"
                                                form="formDelete{{ $question->id }}"><i
                                                    class="material-icons text-sm me-2">delete</i>Delete</button>
                                        </div>
                                        <a class="btn btn-info flex-fill m-2 d-block"
                                            href="{{ route('admin.quiz.question.edit', [$quiz->id, $question->id]) }}"><i
                                                class="material-icons text-sm me-2">edit</i>Edit</a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="text-center py-4">
                                There is no data to show at the moment.
                            </div>
                        @endforelse
                    </ul>
                    <div class="d-flex justify-content-center">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
