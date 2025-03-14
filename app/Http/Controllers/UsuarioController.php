<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsuarioController extends Controller
{
    // Método para mostrar todos los usuarios
    public function index()
    {
        // Obtener todos los usuarios de la base de datos
        $usuarios = Usuario::all();
        // Retornar la vista con los usuarios obtenidos
        return view('usuarios.index', compact('usuarios'));
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        // Validación de los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required|string|max:40', // Validación del nombre con un máximo de 40 caracteres
            'email' => 'required|email|unique:usuarios,email', // Validación de un correo electrónico único
            'contraseña' => 'required|string|min:8', // Validación de la contraseña con un mínimo de 8 caracteres
        ]);

        // Crear un nuevo usuario con la contraseña encriptada
        Usuario::create([
            'nombre' => $request->nombre, // Asignación del nombre
            'email' => $request->email, // Asignación del correo electrónico
            'contraseña' => bcrypt($request->contraseña), // Encriptación de la contraseña antes de guardar
        ]);

        // Redireccionar a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    // Método update (actualización) de un usuario en el sistema
    public function update(Request $request, $id)
    {
        // Validación de los nuevos datos ingresados
        $request->validate([
            'nombre' => 'required|string|max:40', // Validación del nombre con un máximo de 40 caracteres
            'email' => 'required|email|unique:usuarios,email,' . $id, // Validación del correo único, excluyendo el propio usuario
        ]);

        // Encontrar el usuario por su ID
        $usuario = Usuario::findOrFail($id);
        // Actualizar los datos del usuario con los datos validados
        $usuario->update($request->all());

        // Redireccionar a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    // Método Eliminar (delete) con destroy
    public function destroy($id)
    {
        // Eliminar el usuario según su ID
        Usuario::destroy($id);
        // Redireccionar a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado de manera exitosa!');
    }
}

