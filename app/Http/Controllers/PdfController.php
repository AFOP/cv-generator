<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Contact;

class PdfController extends Controller
{
    public function pdf()
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

        $pdf = PDF::loadView('cv-pdf', ['general' => $general]);
        $pdf->set_base_path("public/assets/css/bootstrap.min.css");
        //return $pdf->download('archivo.pdf');
        return $pdf->stream();
    }
}
