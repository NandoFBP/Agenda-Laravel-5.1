 					 <div class="form-group">
                   	{{ Form::label('firstName', 'FirstName')}}
                   	{{ Form::text('firstName', null, ['class' =>'form-control', 'placeholder' => 'Name'])}}
                   </div>

                    <div class="form-group">
                   	{{ Form::label('lastName', 'LastName')}}
                   	{{ Form::text('lastName', null, ['class' =>'form-control', 'placeholder' => 'lastName'])}}
                   </div>

                     <div class="form-group">
                   	{{ Form::label('phone', 'Phone')}}
                   	{{ Form::text('phone', null, ['class' =>'form-control', 'placeholder' => 'phone'])}}
                   </div>

                   {{ Form::label('email', 'Email')}}
 					          <div class="input-group">
                   	{{ Form::text('email', null , ['class' =>'form-control', 'placeholder' => 'Email'])}}
                    <span class="input-group-addon" id="basic-addon2">@example.com</span>
                   </div>

                   <div class="form-group">
                   	{{ Form::label('address', 'Address')}}
                   	{{ Form::text('address', null , ['class' =>'form-control', 'placeholder' => 'address'])}}
                   </div>
                  
                      <div class="form-group">
                   	{{ Form::label('category', 'Category')}}
                   	{{ Form::select('category', ['family' => 'Family', 'friends' =>'Friends' , 'work' => 'Work'],null, ['class' => 'form-control', 'placeholder' => 'Choose an option'])}}
                   </div>