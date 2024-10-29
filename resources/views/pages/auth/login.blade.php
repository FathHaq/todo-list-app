@extends('layouts.app')

@section('content')
    <div class="w-1/4 p-5 text-black bg-white rounded-xl bg-opacity-60 backdrop-filter backdrop-blur-lg">
        <div class="flex justify-center font-semibold header-card">
            <div class="text-lg">Login</div>
        </div>
        <!-- end header -->

        <div class="flex flex-col mt-5 divide-y divide-slate-500 card-content gap-y-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('password')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">
                        Login
                    </button>
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 underline hover:text-gray-900">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
