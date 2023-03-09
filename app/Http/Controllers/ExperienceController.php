<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Carbon\Carbon;


class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('/items.experience')->with('experiences', $experiences);
    }
    public function show()
    {
        return view('/items.experience');
    }
    public function store(Request $request)
    {
        $state = $request->has('state') ? 1 : 0;
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'Description',
            'Achievements',
            'address',
            'state',
            'start'=> 'required',
            'finish'
        ], [
            'title.required' => 'titulo es obligatorio',
            'company.required' => 'Nombre de la compañia es obligatoria',
            'start.required' => 'Fecha de inicio es obligatoria'
        ]);

        $experiences = new Experience;
        $experiences->title = $request->title;
        $experiences->company = $request->company;
        $experiences->Description = $request->Description;
        $experiences->Achievements = $request->Achievements;
        $experiences->address = $request->address;
        $experiences->state = $state;
        $experiences->start = Carbon::parse($request->start)->format('Y-m-d');
        $experiences->finish = $request->finish ? Carbon::parse($request->finish)->format('Y-m-d') : null;
        $experiences->save();

        return redirect()->route('experience')->with('success', 'Experiencia creada correctamente');
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->back()->with('success', 'El registro ha sido eliminado exitosamente.');
    }
}
