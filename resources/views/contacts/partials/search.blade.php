 <div class="panel-heading">
  <p><b>If you want to do a search , please enter an text, select a filter and a order.</b></p>
  <p><b>If you don't fill in these three fields, the search will be done by default.</b></p>
         {!! Form::open(['route' => 'contacts.index', 'method' => 'GET', 'role' => 'search']) !!}
         <div class="input-group">
         	<div class="input-group">
         	 {!! Form::text('entry', null, ['class' => 'search', 'placeholder' => 'Search for', 'name' => 'entry']) !!}
         	   		<span class="input-group-btn">
       					 <button class="btn btn-default btn-success" type="submit">Search</button>
      				</span>
      		 
      		</div> <br>
             <p> {!! Form::select('filter', config('options.filter.filter'), null, ['class' => 'search']) !!} </p>
             <p> {!! Form::select('order', config('options.order.order'), null, ['class' => 'search']) !!} </p> 	   
              
         {!! Form::close() !!}
 </div>	</div>