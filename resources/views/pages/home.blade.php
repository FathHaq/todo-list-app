@extends('layouts.app')

@section('content')
    <div class="w-1/3 p-5 text-black bg-white rounded-xl bg-opacity-60 backdrop-filter backdrop-blur-lg">
        <div class="flex justify-center font-semibold header-card">
            <div class="text-lg">My Todo List</div>
        </div>
        <!-- end header -->

        <form action="{{ route('todo.store') }}" method="POST">
        @csrf
            <div class="flex mt-4">
                <input class="w-full px-3 py-2 mr-4 border rounded-md shadow appearance-none text-grey-darker" placeholder="Add Todo" name="title">
                <button class="p-2 border-2 rounded flex-no-shrink text-teal border-teal hover:text-white hover:bg-teal" type="submit"><i data-feather="plus"></i></button>
            </div>
        </form>

        <div class="flex flex-col mt-5 divide-y divide-slate-500 card-content gap-y-3">

            @forelse ($todoLists as $todo)
                <div class="flex items-center justify-between pt-4 card-content-profil">
                    <div class="flex items-center gap-x-2">
                        <span class="@if($todo->is_done) line-through @endif">{{ $todo->title }}</span>
                    </div>
                    <div class="flex items-center card-action gap-x-2">
                        <form method="POST" action="{{ route('todo.update-status', $todo->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="flex items-center px-2 py-1 text-xs text-white rounded-md @if($todo->is_done) bg-lime-500 hover:bg-lime-600 @else bg-gray-500 hover:bg-gray-600 @endif">
                                <i data-feather="check-circle"></i>
                            </button>
                        </form>
                        <form method="POST" action="{{ route('todo.delete', $todo->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center px-2 py-1 text-xs text-white bg-red-500 rounded-md hover:bg-red-600">
                                <i data-feather="trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="flex justify-center items -center">
                    <span class="text-gray-500">No todo list found</span>
                </div>
            @endforelse

        </div>

    </div>
@endsection
