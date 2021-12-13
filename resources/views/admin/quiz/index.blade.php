@extends('layouts.admin')

@section('title', 'Manage Quiz')
@section('page-name', 'Quiz Management')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Quizzes table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    @if (count($quizzes))
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Quiz ID</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">
                                            Question</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">
                                            Time</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Created At</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Attemp Count</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quizzes as $quiz)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm">{{ $quiz->id }}</h6>
                                            </td>
                                            <td>
                                                <div class="py-1">
                                                    <h6 class="mb-0 text-sm">{{ $quiz->name }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $quiz->questions_count }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $quiz->time }} minutes</h6>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $quiz->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm">{{ $quiz->attemps_count }}</h6>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('admin.quiz.destroy', $quiz->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-sm bg-gradient-primary" data-toggle="tooltip"
                                                        data-original-title="Delete Quiz" type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.quiz.question.index', $quiz->id) }}"
                                                    class="btn btn-sm bg-gradient-info" data-toggle="tooltip"
                                                    data-original-title="Show Question" type="submit">
                                                    Question list
                                                </a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editQuiz{{ $quiz->id }}">
                                                    Edit
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editQuiz{{ $quiz->id }}" tabindex="-1"
                                                    aria-labelledby="editQuiz{{ $quiz->id }}Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editQuiz{{ $quiz->id }}Label">Modal
                                                                    Edit Quiz {{ $quiz->name }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.quiz.update', $quiz->id) }}" method="post" id="formQuiz{{ $quiz->id }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row text-center py-3">
                                                                        <div class="col-10 mx-auto">
                                                                            <div class="input-group input-group-static">
                                                                                <label
                                                                                    class="">Name</label>
                                                                                <input type="text" class="form-control" name="name" value="{{ $quiz->name }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row text-center py-3 mt-3">
                                                                        <div class="col-10 mx-auto">
                                                                            <div class="input-group input-group-static">
                                                                                <label
                                                                                    class="">Time (minutes)</label>
                                                                                <input type="text" class="form-control" name="time" value="{{ $quiz->time }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary" type="submit"
                                                                    form="formQuiz{{ $quiz->id }}">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            There is no data to show at the moment.
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $quizzes->links() }}
            </div>
        </div>
    </div>
@endsection
