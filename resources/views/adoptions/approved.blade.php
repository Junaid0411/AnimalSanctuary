@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <center>Approved Adoptions</center>
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
                                    @if ($adoption['status'] == 'accepted')
                                        {{-- {{ $image = App\Models\Animal::select('image')->where('id', $adoption['animalID'])->get()->first()['image'] }} --}}
                                        <tr>
                                            <td><img style="width:75px; height:75px"
                                                    src="{{ asset('storage/images/' . App\Models\Animal::select('image')->where('id', $adoption['animalID'])->get()->first()['image']) }}" alt=""></td>
                                            <td>{{ $adoption['userID'] }}</td>
                                            <td>{{ $adoption['animalID'] }}</td>
                                            <td>{{ $adoption['status'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <td><img style="width:75px; height:75px" src="{{ asset('storage/images/' . $animal['image']) }}" alt=""></td> --}}
