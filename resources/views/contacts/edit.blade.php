@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Contact: {{ $contact->firstName }} </div>
                <div class="panel-body">
                 @include('contacts.partials.messages')
                <!--action es el route-->
                   {{ Form::model($contact, ['route' => ['contacts.update',
                      $contact->id], 'method' => 'PUT']) }}

                  @include('contacts.partials.fields')

                   <button type="submit" class="btn btn-primary">Update</button>
                   {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
