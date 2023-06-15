@include('music.layout')
@extends('clien.layout.index')
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show music</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('pages.homepage') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $music->name }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Lyric:</strong>

                {{ $music->lyrics }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Image:</strong>

                <img src="{{ asset('image/music/' . $music->image) }}" alt="" border=3 height=150 width=150>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Audio:</strong><br>

                <audio controls controlsList="nodownload" style="width: 300px;" ontimeupdate="myAudio(this)">
                    <source src="{{ asset('audio/music/'.$music->audio) }}" type="audio/mp3">
                    </audio>
                    <script type="text/javascript">
                        function myAudio(event){
                            if(event.currentTime>10){
                                event.currentTime=0;
                                event.pause();
                                alert("Bạn phải trả phí để nghe cả bài")
                            }
                        }
                    </script>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Singer:</strong>

                {{ $music->singer }}

            </div>

        </div>

        


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Category:</strong>

                {{ $music->category->name }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Price:</strong>

                {{ $music->price }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Details:</strong>

                {{ $music->description }}

            </div>

        </div>

    </div>
@endsection
