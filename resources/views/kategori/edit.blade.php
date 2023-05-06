@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-lg-4 mt-5 pt-5">
            <div class="box">
                <form action="/edit-kategori/proses/{{ $kategori->id_kategori }}" class="position-absolute top-50 start-50 translate-middle"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" value="{{ $kategori->nama_kategori }}" name="nama_kategori">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
