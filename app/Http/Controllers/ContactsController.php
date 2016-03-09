<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //para la inyección de dependencias.

use App\User; 
use App\Http\Requests;  
use Auth;
use App\Contact;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\EditContactRequest;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller


{
	public function __construct(Request $request){

		$this->request = $request; 
		//primero pasa por el middleware.
		$this->middleware('auth');

	}
	//mostrar contactos
    public function index(Request $request){

 
       // dd($request->get('firstName'));

    	//obtengo el id del usuario logueado
    	$user_id_on=Auth::user()->id;
        //dd($request['filter']);


         if($request['filter'] != "" && $request['entry'] != "" && $request['order'] != ""){

            $order = $request ['order'];
             if($order == 'firstName'){

                $order = 'firstName';
                $option = 'ASC';
            }
             if($order == 'newest'){

                $order = 'created_at';
                $option = 'DESC';

            }
            if($order == 'oldest'){

                $order = 'created_at';
                $option = 'ASC';

            }
            
           // echo"eureka, consulta filtrada";
                $filter = $request['filter'];
                $entry = '%'.$request['entry'].'%';
                //var_dump($filter);
                //extraigo todos los contactos del usuario logueado ordenados por nombre
            $contacts = \DB::table('contacts')
                    ->select(['contacts.*']) 
                    ->where($filter, 'LIKE' , $entry)
                    ->where('user_id','=', $user_id_on) 
                    ->orderBy($order,$option)
                    ->paginate(10); //pagino los contactos
                 // dd($contacts); 
        }else{

           // echo"consulta normal";
                //extraigo todos los contactos del usuario logueado ordenados por nombre
            $contacts = \DB::table('contacts')
                    ->select(['contacts.*']) 
                    ->where('user_id','=', $user_id_on) 
                    ->orderBy('firstName','ASC')
                    ->paginate(10); //pagino los contactos

        }
		
				
		//vista que mostrará los contactos, se le pasa el resultado de la consultado como parámetro a la vista con compact
		return view('contacts.index',compact('contacts'));

    }

    //llama a la vista de crear contacto
    public function create(){

    	return view('contacts.create');

    }

     //almacenar contacto
    //hace uso del form request ECreateContactRequest
    public function store(CreateContactRequest $request){ //inyección de dependencias

    	//obtengo los datos
    	$arrayDatos=$request->all();

    	//obtengo el id del usuario logueado
    	$arrayDatos['user_id'] = \Auth::user()->id;

    	//le doy valor a la fecha de creación.
    	$arrayDatos['created_at'] = date('YmdHms');

    	$contact = Contact::create($arrayDatos); 
    	//dd(Request::all()); //facade
    	//dd($request->all());//inyección
    	Session::flash('message', 'Inserted contact');
       
        //redirección al listado de contactos
    	return redirect()->route('contacts.index');  
    	

    }

    //cuando pulsamos editar se lanza esta función,le llega el id del contacto
    public function edit($id){

    	//Este método devuelve el contacto seleccionado si existe y si no es así Laravel lanza automáticamente un error 404
		 $contact = Contact::findOrFail($id); 

		 //se devuelve los datos 
		 return view('contacts.edit',compact('contact'));
	}

	//al pulsar update viene aqui con el id del usuario a actualizar
	//hace uso del form request EditContactRequest
	 public function update(EditContactRequest $request,$id){

     $contact = Contact::findOrFail($id);
     $contact->fill($request->all());
     $contact->save();

     Session::flash('message', 'Edited contact');

     return redirect()->route('contacts.index');
    }

    //eliminar un contacto
    public function destroy($id){

    	Contact::destroy($id);

    	//para almacenar un mensaje en la sesión y posteriormente se borra
    	Session::flash('message', 'Deleted contact');

    	return redirect()->route('contacts.index');

    }

    //pruebas, no lo he hecho funcionar
   /* public function scopeFilter($query, $entry, $filter){


        $filters = config('options.filter');

        if($filter != "" && isset($filters[$filter]) && $query != ""){

            $query->AND($filter, 'LIKE' , '%$entry%');
        }
    }*/
}
