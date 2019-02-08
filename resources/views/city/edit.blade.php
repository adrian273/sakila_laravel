@extends('layouts.app', ['title' => 'Edicion'])

@section('contenido')
    <div class="col-md-12">
        <h1>Edicion de Ciudad</h1>
            <div class="card card-info col-md-8 mt-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{route('city.update', $city->city_id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="city">Nombre Ciudad</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{$city->city}}">
                        </div>
            
                        <button type="submit" class="btn btn-info mb-5">
                            Actualizar
                        </button>
                    </form>
                </div>
    </div>
@endsection