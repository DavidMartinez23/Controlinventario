@extends('layouts.guest')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-indigo-500 to-blue-400">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Iniciar Sesión</h2>
        @if (session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input id="password" type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="flex items-center justify-between mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-indigo-600">
                    <span class="ml-2 text-gray-600">Recordarme</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">¿Olvidaste tu contraseña?</a>
                @endif
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">Entrar</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>
</div>
@endsection
