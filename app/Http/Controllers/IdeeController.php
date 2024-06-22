<?php

namespace App\Http\Controllers;
use App\Models\Idee;
use App\Models\Categorie;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreIdeeRequest;
use App\Http\Requests\UpdateIdeeRequest;
use App\Mail\Idee as IdeeMail;
use Illuminate\Mail\Mailable;


class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $idees = dee::with('categorie', 'rayon')->get();

        $idees = Idee::all();
        $categories=Categorie::all();

        return view('idees.index', compact('idees','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idees = Idee::all();
        $categories=Categorie::all();
        return view('idees.create', compact('idees','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeeRequest $request)
    {
        Idee::create($request->all());

        Mail::to('fallouniang776@gmail.com')
        ->send(new IdeeMail($request->except('_token')));
    return view('emails.confirmeSubmetIdee');
        return redirect('idees');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idee $idee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idee $idee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeeRequest $request, Idee $idee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idee $idee)
    {
        //
    }


    public function filtrerParCategorie($id)
    {
        $idees = Idee::where('categorie_id', $id)->get();
        $categories = Categorie::all();
        $categorieActuelle = Categorie::find($id);
        return view('idees.index', compact('idees', 'categories', 'categorieActuelle'));
    }
    
}
