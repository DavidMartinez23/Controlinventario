@extends('layouts.guest')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-indigo-500 to-blue-400">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Crear Cuenta</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input id="password" type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                @error('password_confirmation')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">Registrarse</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</div>
@endsection
