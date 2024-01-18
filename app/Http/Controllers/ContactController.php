<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('/items.contact')->with('contacts', $contacts);
    }
    public function store(Request $request)
    {
        $request->validate([
            'profession' => 'required',
            'skills' => 'required',
            'firts_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'url'
        ], [
            'profession' => 'Profesion es obligatoria',
            'skills' => 'Habilidades son obligatorias',
            'firts_name' => 'Nombres es obligatorio',
            'last_name' => 'Apellidos es obligatorio',
            'address' => 'Dirección es obligatoria',
            'phone.required' => 'Numero de celular es obligatorio',
            'email.required' => 'El campo Correo electrónico es obligatorio.',
            'email.email' => 'El campo Correo electrónico debe ser una dirección de correo electrónico válida.'
        ]);

        $contact = new Contact;
        $contact->profession = $request->profession;
        $contact->skills = $request->skills;
        $contact->experience = $request->experience;
        $contact->time = $request->time;
        $contact->firts_name = $request->firts_name;
        $contact->last_name = $request->last_name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->url = $request->url;
        $concat = ($request->experience == 'SI') ? "tengo $contact->time de" : "no tengo";
        $contact->iadesc = "Soy " . ($contact->profession ? $contact->profession : "$contact->firts_name $contact->last_name") . " $concat experiencia en el campo." . ($contact->skills ? "He adquirido habilidades en $contact->skills" : ""). "Estoy altamente motivado a aplicar mis habilidades y conocimientos, buscando una oportunidad que me permita continuar creciendo en el sector. Mi objetivo es aportar valor a una organización a través de mi trabajo y desarrollarme profesionalmente.";
        $contact->save();

        return redirect()->route('contact')->with('success', 'Contacto creado correctamente');
    }
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->profession = $request->profession;
        $contact->skills = $request->skills;
        $contact->experience = $request->experience;
        $contact->time = $request->time;
        $contact->firts_name = $request->firts_name;
        $contact->last_name = $request->last_name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->url = $request->url;
        $concat = ($request->experience == 'SI') ? "tengo $contact->time de" : "no tengo";
        $contact->iadesc = "Soy $contact->profession, $concat experiencia en el campo. He adquirido habilidades en $contact->skills Estoy altamente motivado a aplicar mis habilidades y conocimientos, buscando una oportunidad que me permita continuar creciendo en el sector. Mi objetivo es aportar valor a una organización a través de mi trabajo y desarrollarme profesionalmente.";
        $contact->save();

        return redirect()->route('contact')->with('success', 'Contacto editado correctamente');
    }

    public function destroy($id)
    {
        $experience = Contact::findOrFail($id);
        $experience->delete();

        return redirect()->back()->with('success', 'El registro ha sido eliminado exitosamente.');
    }

}
