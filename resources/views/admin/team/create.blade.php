@extends('layouts.app')

@section('content')

    <div class="xl:pl-72">

        <!-- Header -->
        <div class="sticky top-0 z-40 flex h-16 items-center border-b bg-white px-6">
            <h2 class="text-2xl font-bold text-gray-900">
                {{ isset($team) ? 'Edit Team Member' : 'New Team Member' }}
            </h2>
        </div>

        <div class="p-6">

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <!-- Validation Errors -->
            @if($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- FORM START -->
            <form method="POST"
                  action="{{ isset($team) ? route('team.update', $team->id) : route('team.store') }}"
                  enctype="multipart/form-data">

                @csrf
                @if(isset($team))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Name -->
                    <div>
                        <label class="font-semibold">Full Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', $team->name ?? '') }}"
                               class="w-full border p-2 rounded mt-1">
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="font-semibold">Country</label>
                        <select name="country" class="w-full border p-2 rounded mt-1">
                            <option value="">Select</option>
                            <option value="India" {{ old('country', $team->country ?? '') == 'India' ? 'selected' : '' }}>India</option>
                            <option value="USA" {{ old('country', $team->country ?? '') == 'USA' ? 'selected' : '' }}>USA</option>
                            <option value="Canada" {{ old('country', $team->country ?? '') == 'Canada' ? 'selected' : '' }}>Canada</option>
                        </select>
                    </div>

                    <!-- About -->
                    <div class="md:col-span-2">
                        <label class="font-semibold">About</label>
                        <textarea name="about" rows="3"
                                  class="w-full border p-2 rounded mt-1">{{ old('about', $team->about ?? '') }}</textarea>
                    </div>

                    <!-- Languages -->
                    <div class="md:col-span-2">
                        <label class="font-semibold">Languages</label>
                        <div class="flex gap-6 mt-2">

                            @php
                                $langs = old('languages', $team->languages ?? []);
                            @endphp

                            <label>
                                <input type="checkbox" name="languages[]" value="Hindi"
                                    {{ in_array('Hindi', $langs ?? []) ? 'checked' : '' }}>
                                Hindi
                            </label>

                            <label>
                                <input type="checkbox" name="languages[]" value="English"
                                    {{ in_array('English', $langs ?? []) ? 'checked' : '' }}>
                                English
                            </label>

                            <label>
                                <input type="checkbox" name="languages[]" value="Gujarati"
                                    {{ in_array('Gujarati', $langs ?? []) ? 'checked' : '' }}>
                                Gujarati
                            </label>

                        </div>
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="font-semibold">Gender</label>
                        <div class="flex gap-4 mt-2">
                            <label>
                                <input type="radio" name="gender" value="Male"
                                    {{ old('gender', $team->gender ?? '') == 'Male' ? 'checked' : '' }}>
                                Male
                            </label>

                            <label>
                                <input type="radio" name="gender" value="Female"
                                    {{ old('gender', $team->gender ?? '') == 'Female' ? 'checked' : '' }}>
                                Female
                            </label>
                        </div>
                    </div>

                    <!-- Photo -->
                    <div>
                        <label class="font-semibold">Photo</label>
                        <input type="file" name="photo" class="mt-1">

                        @if(isset($team) && $team->photo)
                            <div class="relative mt-3 inline-block">

                                <!-- Image -->
                                <img src="{{ asset('storage/'.$team->photo) }}"
                                     class="h-24 w-24 object-cover rounded border">

                                <!-- ❌ Remove Button -->
                                <button type="button"
                                        onclick="document.getElementById('remove_image').value = 1; this.parentElement.style.display='none';"
                                        class="absolute top-0 right-0 bg-red-600 text-white text-xs px-1 rounded-full cursor-pointer">
                                    ✕
                                </button>

                            </div>
                        @endif

                        <!-- Hidden input to detect remove -->
                        <input type="hidden" name="remove_image" id="remove_image" value="0">
                    </div>

                    <!-- Multiple Images -->
                    <div class="md:col-span-2">
                        <label class="font-semibold">Gallery Images</label>

                        <input type="file" name="gallery[]" multiple class="mt-2">

                        <!-- Existing Images -->
                        @if(isset($team) && $team->gallery)
                            <div class="flex gap-4 mt-3 flex-wrap">
                                @foreach($team->gallery as $key => $image)
                                    <div class="relative">

                                        <img src="{{ asset('storage/'.$image) }}"
                                             class="h-20 w-20 object-cover rounded border">

                                        <!-- ❌ Remove button -->
                                        <button type="button"
                                                onclick="removeGalleryImage({{ $key }}, this)"
                                                class="absolute -top-2 -right-2 bg-red-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                            ✕
                                        </button>

                                        <input type="hidden" name="existing_gallery[]" value="{{ $image }}">

                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-6 flex justify-end gap-4">
                    <a href="{{ route('team.index') }}" class="px-4 py-2 bg-gray-200 rounded cursor-pointer">Cancel</a>

                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded cursor-pointer">
                        {{ isset($team) ? 'Update' : 'Save' }}
                    </button>
                </div>

            </form>
            <!-- FORM END -->

        </div>
    </div>

    <script id="4p4knp">
        function removeGalleryImage(index, el) {
            el.parentElement.remove();
        }
    </script>
@endsection
