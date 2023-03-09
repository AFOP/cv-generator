<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Experience;
use App\Models\Contact;

class ProfileController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $profiles = Profile::all();
        $experiences = Experience::all();
        $educations = Education::all();
        $contacts = Contact::all();
        $general = [
            'items' => $items,
            'profiles' => $profiles,
            'experiences' => $experiences,
            'educations' => $educations,
            'contacts' => $contacts
        ];
        return view('welcome')->with('general', $general);
    }

    public function items()
    {
        $items = Item::all();
        $contacts = Contact::all();
        $profiles = Profile::all();
        return view('items.profile')->with('items', $items)->with('profiles', $profiles)->with('contacts', $contacts);
    }

    public function show()
    {
        return view('/items.profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title',
            'description' => 'required|min:10'
        ], [
            'description.required' => 'La descripción es obligatoria',
            'description.min' => 'La descripción debe tener mínimo 10 caracteres'
        ]);

        $profiles = new Profile;
        $profiles->title = $request->title;
        $profiles->description = $request->description;
        $profiles->user = $request->user;
        $profiles->save();

        return redirect()->route('profile')->with('success', 'Perfil creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->description = $request->description;
        $profile->save();

        return redirect()->route('profile')->with('success', 'Descripción editada correctamente');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profile')->with('success', 'Perfil eliminado correctamente');
    }
}
