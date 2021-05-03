@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">
                        <center>Display all animals</center>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Availability</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animals as $animal)
                                    <tr>
                                        <td><img style="width:75px; height:75px"
                                                src="{{ asset('storage/images/' . $animal['image']) }}" alt=""></td>
                                        <td>{{ $animal['name'] }}</td>
                                        <td>{{ $animal['dob'] }}</td>
                                        <td>{{ $animal['description'] }}</td>
                                        <td>{{ $animal['group'] }}</td>
                                        <td>{{ $animal['availability'] }}</td>
                                        <td><a href="{{ route('animals.show', ['animal' => $animal['id']]) }}"
                                                class="btn btn-info">Details</a></td>
                                        @if (Gate::denies('displayall') == false)
                                            <td><a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}"
                                                    class="btn btn-warning">Edit</a></td>
                                            <td>
                                                <form
                                                    action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['animal' => $animal['id']]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger" type="submit"> Delete</button>

                                                </form>
                                            </td>
                                        @elseif (Gate::denies('availability') == true)
                                            <td>
                                                @if ($animal['availability'] != 'unavailable')
                                                    <form
                                                        action="{{ action([App\Http\Controllers\AdoptionController::class, 'store'], ['animal' => $animal['id']]) }}"
                                                        method="post">
                                                        @csrf
                                                        <input name="animalID" type="hidden" value="{{ $animal['id'] }}">
                                                        <input name="status" type="hidden" value="pending">
                                                        <button class="btn btn-success" type="submit"> Adopt</button>
                                                    </form>
                                                @endif
                                            </td>
                                        @endif
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
