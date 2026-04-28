@extends('layouts.app')

@section('content')

    <div class="xl:pl-72">

        <!-- Sticky search header -->
        <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-6 border-b border-gray-200 bg-white px-4 shadow-xs sm:px-6 lg:px-8">
            <div class="w-full md:flex md:items-center md:justify-between">
                <div class="flex-1">
                    <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Teams</h2>
                </div>
                <div>
                    <a href="{{ route('team.create') }}"
                       class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add Team
                    </a>
                </div>
            </div>
        </div>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm outline-1 outline-black/5 sm:rounded-lg">
                            <table class="relative min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Country</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Gender</th>
                                    <th scope="col" class="py-3.5 pr-4 pl-3 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse($teams as $team)
                                    <tr>
                                        <td class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-gray-900 sm:pl-6">
                                            {{ $team->name ?? "" }}
                                        </td>
                                        <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{{ $team->country ?? "" }}</td>
                                        <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{{ $team->gender ?? "" }}</td>
                                        <td class="py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-6 w-28">
                                            <div class="flex justify-between items-end">
                                                <!-- ✅ Edit Button -->
                                                <a href="{{ route('team.edit', $team->id) }}"
                                                   class="text-indigo-600 hover:text-indigo-900 cursor-poiter">
                                                    Edit
                                                </a>

                                                <!-- ✅ Delete Button -->
                                                <form action="{{ route('team.destroy', $team->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this record?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="text-red-600 hover:text-red-900 cursor-poiter">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
