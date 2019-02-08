@extends('layouts.app', ['title' => $city->city])

@section('contenido')

    <div class="col-md-12">
        <div class="card col-md-6">
            <div class="card-header">
                <div class="card-title">
                    <div class="col-md-4 mt-1">
                    @include('layouts.btn_back', ['btn_name' => 'Volver'])
                </div>
                        Informacion de ciudad
                </div>
                <div class="card-body">
                    <p>Nombre: {{$city->city}}</p>
                    <p>Pais: {{$city->country}}</p>
                </div>
            </div>
        </div>
    </div>