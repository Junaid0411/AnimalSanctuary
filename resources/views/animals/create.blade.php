<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">Add a new animal</div>
                    <!-- display the errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <!-- display the success status -->
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    <!-- define the form -->
                    <div class="card-body ">
                        <form class="form-horizontal" method="POST" action="{{ url('animals') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8 center">
                                <label>Animal Name</label>
                                <input type="text" name="name" placeholder="Animal name" />
                            </div>
                            <div class="col-md-8">
                                <label>Availability</label>
                                <select name="availability">
                                    <option value="available">Yes</option>
                                    <option value="unavailable">No</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Type</label>
                                <select name="group">
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                    <option value="bird">Bird</option>
                                    <option value="fish">Fish</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" />
                            </div>
                            <div class="col-md-8">
                                <label>Date of birth</label>
                                <input type="date" name="dob" placeholder="Date Of Birth" />
                            </div>
                            <div class="col-md-8">
                                <label>Image</label>
                                <input type="file" name="image" placeholder="Image file" />
                            </div>
                            <div class="col-md-8">
                                <label>Image 2</label>
                                <input type="file" name="image2" placeholder="Image2 file" />
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
