<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(10);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Traer toda la información, incluso los campos de validación como el token
        // $datosEmpleado= request()->all();

        $campos=[
            'nombre'=>'required|string|max:100',
            'primer_apellido'=>'required|string|max:100',
            'segundo_apellido'=>'required|string|max:100',
            'correo'=>'required|email',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida',

        ];


        $this->validate($request, $campos, $mensaje);


        //Trae todos los datos, excepto el campo referenciado, en este caso el token
        $datosEmpleado = request()->except('_token');
        
        if ($request->hasFile('foto')) {
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Empleado::insert($datosEmpleado);
        // Retorna un texto json con todos los datos que contiene este archivo. 
        // return response()->json($datosEmpleado);
        return redirect('empleado')->with('mensaje','Empleado agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'primer_apellido'=>'required|string|max:100',
            'segundo_apellido'=>'required|string|max:100',
            'correo'=>'required|email',            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',          
        ];

        if ($request->hasFile('foto')) {
            $mensaje=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $campos=['foto.required'=>'La foto es requerida'];

        }
        $this->validate($request, $campos, $mensaje);




        $datosEmpleado = request()->except(['_token', '_method']);
        if ($request->hasFile('foto')) {
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/' . $empleado->foto);

            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Empleado::where('id', '=', $id)->update($datosEmpleado);
        $empleado = Empleado::findOrFail($id);
        // return view('empleado.edit', compact('empleado'));

        return redirect('empleado')->with('mensaje','Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        if (Storage::delete('public/'.$empleado->foto)) {
            Empleado::destroy($id);
        }
        
        return redirect('empleado')->with('mensaje','Empleado eliminado con éxito');
    }
}
