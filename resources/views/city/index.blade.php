@extends('layouts.app', ['title' => 'Ciudades'])
@section('contenido')
    <h1>Ciudades </h1>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<a href="{{route('city.create')}}">Agregar Nuevo</a>
    <table class="table">
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $city)
                <tr>
                    <td><a href="{{route('city.show', $city->city_id)}}">{{$city->city}}</a></td>
                    <td>{{$city->country}}</td>
                    <td>
                        <form action="{{route('city.destroy', $city->city_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                    <form action="{{route('city.edit', $city->city_id)}}">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                        </button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection