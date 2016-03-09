@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Contact</div>
               
                <div class="panel-body">
                   <!-- Se inclute el partials de mensajes -->
                @include('contacts.partials.messages')
               
                <!--action es el route-->
                   {{ Form::open(['route' => 'contacts.store', 'method' => 'post'])}}

                 <!-- Se incluye el partials con los campos -->
                  @include('contacts.partials.fields')

                   <button type="submit" class="btn btn-primary">Add</button>
                   {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection