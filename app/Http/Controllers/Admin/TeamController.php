<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'country' => 'nullable',
            'about' => 'nullable',
            'languages' => 'nullable|array',
            'gender' => 'nullable',
            'photo' => 'nullable|image',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Upload single photo
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        // ✅ Upload multiple images
        if ($request->hasFile('gallery')) {
            $gallery = [];

            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('team/gallery', 'public');
            }

            $data['gallery'] = $gallery;
        }

        \App\Models\Team::create($data);

        return redirect()->route('team.index')->with('success', 'Team created successfully');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team.create', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = \App\Models\Team::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'country' => 'nullable',
            'about' => 'nullable',
            'languages' => 'nullable|array',
            'gender' => 'nullable',
            'photo' => 'nullable|image',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // =========================
        // ✅ REMOVE SINGLE IMAGE
        // =========================
        if ($request->remove_image == 1 && $team->photo) {
            if (\Storage::disk('public')->exists($team->photo)) {
                \Storage::disk('public')->delete($team->photo);
            }
            $data['photo'] = null;
        }

        // =========================
        // ✅ UPLOAD NEW PHOTO
        // =========================
        if ($request->hasFile('photo')) {

            // delete old
            if ($team->photo && \Storage::disk('public')->exists($team->photo)) {
                \Storage::disk('public')->delete($team->photo);
            }

            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        // =========================
        // ✅ GALLERY UPDATE
        // =========================

        // Keep existing images (those not removed from UI)
        $existingGallery = $request->existing_gallery ?? [];

        // Upload new images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $existingGallery[] = $file->store('team/gallery', 'public');
            }
        }

        // Delete removed images from storage
        if ($team->gallery) {
            foreach ($team->gallery as $oldImage) {
                if (!in_array($oldImage, $existingGallery)) {
                    if (\Storage::disk('public')->exists($oldImage)) {
                        \Storage::disk('public')->delete($oldImage);
                    }
                }
            }
        }

        $data['gallery'] = $existingGallery;

        // =========================
        // ✅ UPDATE RECORD
        // =========================
        $team->update($data);

        return redirect()->route('team.index')->with('success', 'Team updated successfully');
    }

    public function destroy($id)
    {
        $team = \App\Models\Team::findOrFail($id);

        // Delete image (optional)
        if ($team->photo && \Storage::disk('public')->exists($team->photo)) {
            \Storage::disk('public')->delete($team->photo);
        }

        $team->delete();

        return redirect()->route('team.index')->with('success', 'Deleted successfully');
    }
}
