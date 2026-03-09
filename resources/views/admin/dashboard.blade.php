@extends('layouts.app')

@section('content')

    <div class="xl:pl-72">
        <!-- Sticky search header -->
        <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-6 border-b border-gray-200 bg-white px-4 shadow-xs sm:px-6 lg:px-8">
            <div class="w-full md:flex md:items-center md:justify-between">
                <div class="flex-1">
                    <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Dashboard</h2>
                </div>
            </div>
        </div>

        <main class="bg-gray-400">
            <div class="px-4 sm:px-6 lg:px-8">
                <!-- Your content -->
            </div>
        </main>
    </div>


@endsection
