<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="width: 50%;">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ url('posts') }}"> Posts</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ url('create-post') }}" method="POST">
                        @csrf

                        @if(session()->has('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        Create Post!
                        <br>

                        <textarea name="content" id=""></textarea>
    
                        <br>
                        
                        <input type="submit" class="btn btn-sm btn-primary" value="Post">

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
