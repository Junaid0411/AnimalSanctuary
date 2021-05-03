@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <center>View all adoption requests</center>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>UserID</th>
                                    <th>AnimalID</th>
                                    <th>Status</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adoptions as $adoption)
                                    <tr>
                                        <td><img style="width:75px; height:75px"
                                                src="{{ asset(
    'storage/images/' .
        App\Models\Animal::select('image')->where('id', $adoption['animalID'])->get()->first()['image'],
) }}"
                                                alt=""></td>
                                        <td>{{ $adoption['userID'] }}</td>
                                        <td>{{ $adoption['animalID'] }}</td>
                                        <td>{{ $adoption['status'] }}</td>
                                        <td>
                                            @if ($adoption['status'] == 'pending')
                                                <form
                                                    action="{{ action([App\Http\Controllers\AdoptionController::class, 'create'], ['adoption' => $adoption['status'], $adoption['id']]) }}"
                                                    method="get">
                                                    @csrf
                                                    <input name="userID" type="hidden" value="{{ $adoption['userID'] }}">
                                                    <input name="animalID" type="hidden"
                                                        value="{{ $adoption['animalID'] }}">
                                                    <input name="availability" type="hidden" value="unavailable">
                                                    <button class="btn btn-primary" type="submit"> Approve</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($adoption['status'] == 'pending')
                                                <form
                                                    action="{{ action([App\Http\Controllers\AdoptionController::class, 'update'], ['adoption' => $adoption['status'], $adoption['id']]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    <input name="userID" type="hidden" value="{{ $adoption['userID'] }}">
                                                    <input name="animalID" type="hidden"
                                                        value="{{ $adoption['animalID'] }}">
                                                    <button class="btn btn-danger" type="submit"> Reject</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
