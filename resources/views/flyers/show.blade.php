@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{{ $flyer->street }}</h1>
            <h2>{!! $flyer->price !!}</h2>
            <hr>
            <div class="description">{!! nl2br ($flyer->description) !!}</div>
        </div>

        <div class="col-md-8 gallery">
            @foreach ($flyer->photos->chunk(4) as $set)
                <div class='row'>
                    @foreach ($set as $photo)
                        <div class="col-md-3 gallery_image">
                            <img src="/{{ $photo->thumbnail_path }}" alt="" />
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <hr>
    <h2>Add Your Photos</h2>

    <form id="addPhotosForm" 
    action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}" 
    method="POST" 
    class="dropzone">
        {{ csrf_field() }}
    </form>
@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    <script>
    Dropzone.options.addPhotosForm = {
        paramName: 'photo',
        maxFilesize: 3,
        acceptedFiles: '.jpg, .png, .bmp, .gif'
    };
    </script>
@stop




@stop