<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Display the login form.
     */
    public function showLoginForm()
    {
        return view('Login.index');
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        $credentials = [
            'Usuario' => $request->input('Usuario'),
            'password' => $request->input('Clave_Bcrypt'),
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('inicio.index');
        }

        return back()->with('error', 'Credenciales inválidas');
    }

    /**
     * Handle the logout request.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Display the create account form.
     */
    public function crearCuenta()
    {
        return view('Login.crearcuenta');
    }

    /**
     * Handle the store account request.
     */
    public function storeCuenta(Request $request)
    {
        Log::info('Inicio del método storeCuenta');
    
        $existingUser = Usuario::where('Usuario', $request->input('Usuario'))->first();
    
        if ($existingUser) {
            return back()->with('error', 'El nombre de usuario ya está en uso. Por favor, elige otro.');
        }
    
        try {
            // Validar los datos del formulario
            $request->validate([
                'Usuario' => 'required|unique:usuarios',
                'Clave_Bcrypt' => 'required|min:10',
                'Confirmar_Clave' => 'required|same:Clave_Bcrypt',
                'Nombre_completo' => 'required',
            ]);
    
            // Intenta crear el usuario con ambas claves
            $usuario = Usuario::create([
                'Usuario' => $request->input('Usuario'),
                'Clave' => $request->input('Clave_Bcrypt'), // Esto puede cambiar según tus necesidades
                'Clave_Bcrypt' => Hash::make($request->input('Clave_Bcrypt')),
                'Nombre_completo' => $request->input('Nombre_completo'),
            ]);
    
            Log::info('Usuario creado exitosamente');
    
            // Autenticar al usuario después de crear la cuenta
            Auth::login($usuario);
    
        } catch (\Exception $e) {
            // Captura cualquier excepción y registra el mensaje de error
            Log::error('Error al crear el usuario: ' . $e->getMessage());
            return back()->with('error', 'Error al crear el usuario: ' . $e->getMessage());
        }
    
        Log::info('Fin del método storeCuenta');
    
        // Redirige con el mensaje de éxito
        return redirect()->route('inicio.index')->with('success', 'Cuenta creada exitosamente. Bienvenido.');
    }
    
}
