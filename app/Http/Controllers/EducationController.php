<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Carbon\Carbon;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('/items.education')->with('educations', $educations);
    }
    public function show()
    {
        return view('/items.education');
    }

    public function store(Request $request)
    {
        $state = $request->has('state') ? 1 : 0;
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'ie' => 'required',
            'address',
            'Achievements',
            'state',
            'start'=> 'required',
            'finish'
        ], [
            'title.required' => 'titulo es obligatorio',
            'type.required' => 'Tipo de estudio es obligatorio',
            'ie.required' => 'Nombre institución educativa es obligatoria',
            'start.required' => 'Fecha de inicio es obligatoria'
        ]);

        $educations = new Education;
        $educations->title = $request->title;
        $educations->type = $request->type;
        $educations->ie = $request->ie;
        $educations->address = $request->address;
        $educations->Achievements = $request->Achievements;
        $educations->state = $state;
        $educations->start = Carbon::parse($request->start)->format('Y-m-d');
        $educations->finish = $request->finish ? Carbon::parse($request->finish)->format('Y-m-d') : null;
        $educations->save();

        return redirect()->route('education')->with('success', 'Educación creada correctamente');
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->back()->with('success', 'El registro ha sido eliminado exitosamente.');
    }
}
