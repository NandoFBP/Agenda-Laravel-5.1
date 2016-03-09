{{ Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'DELETE']) }}
<button type="submit" class="btn btn-danger">Delete</button>
{{ Form::close() }}