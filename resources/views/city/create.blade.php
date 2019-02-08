@extends('layouts.app', ['title' => 'Agregar nueva Ciudad'])

@section('contenido')
    
    <h1>Nueva Ciudad</h1>
    
    <div>
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
        <div class="card">
            <div class="col-md-4 mt-1">
                    @include('layouts.btn_back', ['btn_name' => 'Volver'])
            </div>
            <div class="card-body">
            <form action="{{route('city.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name_city">Nombre Ciudad</label>
                            <input type="text" name="name_city" id="name_city" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="country">Pais</label>
                            <select name="country" id="county" class="form-control">
                                @foreach ($countries as $country)
                            <option value="{{$country->country_id}}">{{$country->country}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Agregar</button>
                </form>
            </div>
        </div>
    </div>
@endsection