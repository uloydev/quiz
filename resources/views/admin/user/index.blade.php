@extends('layouts.admin')

@section('title', 'Manage User')
@section('page-name', 'User Management')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Users table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                        User ID</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">
                                        Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                        Joined At</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                        Finished Quiz</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm">{{ $user->id }}</h6>
                                        </td>
                                        <td>
                                            <div class="py-1">
                                                <h6 class="mb-0 text-sm">{{ $user->email }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm">{{ $user->attemps_count }}</h6>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm bg-gradient-primary"
                                                    data-toggle="tooltip" data-original-title="Delete user" type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
