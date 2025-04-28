<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use App\Models\Socios;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
class SocioController extends Controller
{
    //
    public function index()
    {
        $MostrarSocios = Socios::paginate(5);

        // Desencriptar los datos antes de pasarlos a la vista
        $MostrarSocios->transform(function ($socio) {
            $socio->num_socio = decrypt($socio->num_socio);
            $socio->nombre = decrypt($socio->nombre);
            $socio->apellido = decrypt($socio->apellido);
            $socio->dni = decrypt($socio->dni);
            $socio->telefono = decrypt($socio->telefono);
            $socio->direccion = decrypt($socio->direccion);
            $socio->email = decrypt($socio->email);
            // Las fechas no necesitan desencriptarse
            return $socio;
        });
        // Aquí puedes obtener la lista de socios desde la base de datos
        // Puedes pasar los datos a la vista para mostrarlos
       return view('socio.index',compact('MostrarSocios'));
    }
    public function create()
    {
        // Aquí puedes mostrar el formulario para crear un nuevo socio
        return view('socio.create');
    }
    public function captura()
    {
        
        return view('socio.foto');
    }
    public function show(Socios $socio)
    {
        // Aquí puedes mostrar los detalles de un socio específico
      
        return view('socio.show',compact('socio'));
    }
    public function store(Request $request)
    {
        // Aquí puedes manejar la lógica para almacenar un nuevo socio en la base de datos
        //los datos se recepcionan en el metodo post
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'num_socio'=>'required|integer|max:1000',
            'dni'=>'required|integer|min:8',
            'email'=>'required|email|max:100',
            'telefono'=>'required|integer|min:8',
            'direccion'=>'required|string|max:100',
            'fecha_nacimiento'=>'required|date',
            'fecha_ingreso'=>'required|date',
            'imagen'=>'required|image|max:2048',
            'estado'=>'required|integer'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'imagen.required'=>'La imagen es requerida',
            'imagen.image'=>'El archivo debe ser una imagen',
            'imagen.max'=>'La imagen no debe pesar mas de 2MB',
            'estado.required'=>'El estado es requerido'
        ];
        $this->validate($request,$campos,$mensaje);
        //validar los datos
       $datos=request()->all();
       
       $nombre=$request->nombre;
       $apellido=$request->apellido;
       $num_socio=$request->num_socio;
       $dni=$request->dni;
       $email=$request->email;
       $telefono=$request->telefono;
       $direccion=$request->direccion;
       $fecha_nacimiento=$request->fecha_nacimiento;
       $fecha_ingreso=$request->fecha_ingreso;
       $imagenRuta=$request->file('imagen')->store('imagenes','public');
       $estado=$request->estado;
           
            //obtener nombre de la imagen
            //$_imagen = $imagen->getClientOriginalName();
            //crea una instancia del modelo Socios
            $socio = new Socios();
            $socio->nombre = encrypt($nombre);
            $socio->apellido =encrypt( $apellido);
            $socio->num_socio =encrypt($num_socio);
            $socio->dni =encrypt( $dni);
            $socio->email = encrypt($email);
            $socio->telefono = encrypt($telefono);
            $socio->direccion = encrypt($direccion);
            $socio->fecha_nacimiento = $fecha_nacimiento;
            $socio->fecha_ingreso = $fecha_ingreso;
            $socio->imagen = basename($imagenRuta);
            $socio->estado = $estado;
            if($socio->estado== 1){
                $socio->estado = 'activo';
            }else{
                $socio->estado = 'inactivo';
            }
           
            $socio->save();
            
        //return response()->json($datos);

        return redirect()->route('socios.index');
    }
    public function edit(Socios $socio)
    {
        // Aquí puedes mostrar el formulario para editar un socio existente
         // Desencriptar los datos del socio
    $socio->nombre = decrypt($socio->nombre);
    $socio->apellido = decrypt($socio->apellido);
    $socio->num_socio = decrypt($socio->num_socio);
    $socio->dni = decrypt($socio->dni);
    $socio->email = decrypt($socio->email);
    $socio->telefono = decrypt($socio->telefono);
    $socio->direccion = decrypt($socio->direccion);
        return view('socio.edit', compact('socio'));
       
    }
    public function update(Request $request,Socios $socio)
    {
        
        // Aquí puedes manejar la lógica para actualizar un socio existente en la base de datos
       
        $socio->nombre = encrypt($request->input('nombre'));
        $socio->apellido = encrypt($request->input('apellido'));
        $socio->num_socio = encrypt($request->input('num_socio'));
        $socio->dni = encrypt($request->input('dni'));
        $socio->email = encrypt($request->input('email'));
        $socio->telefono = encrypt($request->input('telefono'));
        $socio->direccion = encrypt($request->input('direccion'));
        $socio->fecha_nacimiento = $request->input('fecha_nacimiento');
        $socio->fecha_ingreso = $request->input('fecha_ingreso');
        $socio->estado = $request->input('estado');
      
        // Verificar si se ha subido una nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if (Storage::disk('public')->exists('imagenes/' . $socio->imagen)) {
                Storage::disk('public')->delete('imagenes/' . $socio->imagen);
            }
            // Guardar la nueva imagen
            $imagenRuta = $request->file('imagen')->store('imagenes', 'public');
            $socio->imagen = basename($imagenRuta);
        }

        //$socio->update($request->all());
        // Guardar los cambios en la base de datos
        $socio->save();
        // Redirigir a la lista de socios después de actualizar
        return redirect()->route('socios.index');

      

    }
    public function destroy(Socios $socio)
    {
        // Aquí puedes manejar la lógica para eliminar un socio de la base de datos
        if(Storage::disk('public')->exists('imagenes/'.$socio->imagen)){
            Storage::disk('public')->delete('imagenes/'.$socio->imagen);
        }
        // Eliminar el socio de la base de datos
      
        $socio->delete();
     
        // Redirigir a la lista de socios después de eliminar
      
        return redirect()->route('socios.index')->with('success', 'Registro eliminado correctamente.');    
    }
  
  
  
  
  
   
  
}
