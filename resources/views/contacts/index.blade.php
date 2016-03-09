@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                 <!-- Incluyo mensajes -->
                @include('contacts.partials.messages')
                <div class="panel-heading"><a class="btn btn-info" href="{{ route("contacts.create")}}" role="button">New Contact</a></div>

                <!-- Incluyo el buscador -->
               @include('contacts.partials.search')

                <div class="panel-body">
                    
                <!-- última página,total de contactos y página actual -->
  
                    <ul class="nav nav-pills" role="tablist">
                          <li class="active"><a>There are <span class="badge">{{$contacts->lastPage()}} pages</span></a></li>
                          <li class="active"><a>You are on the page <span class="badge">{{$contacts->currentPage()}}</span></a></li>
                          <li class="active"><a>There are <span class="badge">{{$contacts->total()}} contacts</span></a></li>
                    </ul>
                    <br>
                    <!-- Incluyo la tabla y llamo al método render -->
                   @include('contacts.partials.table')
                    {{$contacts->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection