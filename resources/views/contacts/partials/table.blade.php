 <table class="table table-striped">

                        <tr>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Category</th>
                            <th>Email</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        @foreach($contacts as $contact)
                        <tr>  
                            <th>{{ $contact->firstName }}</th>  
                            <th>{{ $contact->lastName }}</th>
                            <th>{{ $contact->phone }}</th>
                            <th>{{ $contact->address }}</th>
                            <th>{{ $contact->category }}</th>
                            <th>{{ $contact->email }}</th>

                            <th><a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id) }}">Edit</a></th>
                             <!-- se incluye el delete -->
                           <th> @include('contacts.partials.delete')</th>
                           
                        </tr>
                        @endforeach
</table>