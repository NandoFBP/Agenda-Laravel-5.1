  <!-- si existen errores, se recorren y se muestran en una lista -->
        @if ($errors->any())
<div class="alert alert-danger" role="alert">
	           <p>Please check errors</p>
	           <ul>
		           @foreach($errors->all() as $error)

		                	<li>{{ $error }}</li>

		           @endforeach
	           </ul>
</div>
	    @endif

 <!-- Si la sesión tiene errores, se obtienen y se muestran-->
  @if (Session::has('message'))

                    <p class="alert alert-success"> {{ Session::get('message')}}</p>

  @endif