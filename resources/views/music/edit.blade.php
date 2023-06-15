@include('music.layout')
@extends('admin.layout.index')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Music</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('music.index') }}"> Back</a>

            </div>

        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif

    <form action="{{ route('music.update', $music->id) }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="Name"
                        value="{{ $music->name }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <input type="text" name="singer" class="form-control" placeholder="singer"
                        value="{{ $music->singer }}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Category:</strong>

                    <select name="category" class="form-control">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Image:</strong>

                            <input type="file" class="form-control" placeholder="Image" value="" name="image" />

                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Audio:</strong>



                        </div>

                    </div>


                    <input type="file" class="form-control" placeholder="Audio" value="" name="audio" />

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <input type="number" name="price" class="form-control" placeholder="Price"
                        value="{{ $music->price }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Description:</strong>

                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $music->description }}</textarea>

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Lyric :</strong>

                    <textarea class="form-control" style="height:150px" name="lyrics" placeholder="Lyric">{{ $music->lyrics }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

    </form>

@endsection
