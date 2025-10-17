<?php

namespace App\Http\Controllers;

use App\Models\AllergeenModel;
use Illuminate\Http\Request;

class AllergeenController extends Controller
{
    private $allergeenModel;

    public function __construct()
    {
        $this->allergeenModel = new AllergeenModel();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allergenen = $this->allergeenModel->sp_GetAllAllergenen();

        // var_dump($allergenen);

        return view('allergeen.index', [
            'title' => 'Allergenen',
            'allergenen' => $allergenen,
            'message' => 'Hier is een overzicht van alle allergenen in het systeem.'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('allergeen.create', [
            'title' => 'Voeg een nieuwe allergeen toe',
            'message' => 'Vul het formulier in om een nieuwe allergeen toe te voegen.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        
      
        $newId = $this->allergeenModel->sp_CreateAllergeen(
                    $request->all()['name'],
                    $request->all()['description']
                );

        return redirect()->route('allergeen.index')
                         ->with('success', "Allergeen is succesvol toegevoegd");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(AllergeenModel $allergeenModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $allergeen = $this->allergeenModel->sp_GetAllergeenById($id);

        // Als er geen allergeen bekent met het meegegeven id dan is $allergeen false en wordt er
        // doorverwezen naar de 404 pagina
        abort_if(!$allergeen, 404);

        return view('allergeen.edit', [
            'title' => 'Allergeen wijzigen',
            'allergeen' => $allergeen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         //dd($request->all());
        $validated = $request->validate([
            'naam' => ['required', 'string', 'max:50'],
            'omschrijving' => ['required', 'string', 'max:255']
        ]);

        // dd($validated);

        $affected = $this->allergeenModel->sp_UpdateAllergeen(
            $id,
            $validated['naam'],
            $validated['omschrijving']
        );

        if ($affected === 0){
            return back()->with('error', 'Er is niets gewijzigd of error bestaat niet');
        }

        return redirect()->route('allergeen.index')
                         ->with('success', 'Allergeen succesvol bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $result = $this->allergeenModel->sp_DeleteAllergeen($id);

        if ($result > 0) {
            return redirect()->route('allergeen.index')
                             ->with('success', 'De allergeen is succesvol verwijderd.');
        } else {
            return redirect()->route('allergeen.index')
                             ->with('error', 'Er is een fout opgetreden bij het verwijderen van de allergeen.');
        }
    }
}