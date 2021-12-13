@extends('layouts.admin')

@section('title', 'Manage Attemp')
@section('page-name', 'Attemp Management')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Attemps table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    @if (count($attemps))
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Attemp ID</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">User
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">
                                            Quiz</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Finished At</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Score</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attemps as $attemp)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm">{{ $attemp->id }}</h6>
                                            </td>
                                            <td>
                                                <div class="py-1">
                                                    <h6 class="mb-0 text-sm">{{ $attemp->user->email }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $attemp->quiz->name }}</h6>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $attemp->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="mb-0 text-sm badge badge-info">{{ $attemp->score }}</span>
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
                {{ $attemps->links() }}
            </div>
        </div>
    </div>
@endsection
