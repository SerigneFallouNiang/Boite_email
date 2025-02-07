<?php
namespace App\Http\Controllers;
use App\Models\Idee;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Mail\Mailable;
use App\Mail\Idee as IdeeMail;
use App\Mail\IdeaStatusChanged;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreIdeeRequest;
use App\Http\Requests\UpdateIdeeRequest;


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
        $commentaires = $idee->commentaires;
        return view('idees.show', compact('idee','commentaires'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idee $idee)
    {
        $categories=Categorie::all();
        return view('idees.update', compact('idee','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeeRequest $request, Idee $idee)
    {
        $idee->update($request->validated());
        return redirect('idees')->with('success', 'Idée mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idee $idee)
    {
        $idee->delete();
    return redirect('idees')->with('success', 'Idee supprimée avec succès.');
    }


    public function filtrerParCategorie($id)
    {
        $idees = Idee::where('categorie_id', $id)->get();
        $categories = Categorie::all();
        $categorieActuelle = Categorie::find($id);
        return view('idees.index', compact('idees', 'categories', 'categorieActuelle'));
    }



    public function accepter(Idee $idee)
    {
        $idee->update(['status' => 'acceptée']);
        $this->notifyUser($idee, 'acceptée');
        return redirect()->route('idees.show', $idee)->with('success', 'Idée acceptée avec succès.');
    }

    public function refuser(Idee $idee)
    {
        $idee->update(['status' => 'refusée']);
        $this->notifyUser($idee, 'refusée');
        return redirect()->route('idees.show', $idee)->with('success', 'Idée refusée avec succès.');
    }

    private function notifyUser(Idee $idee, string $status)
    {
        Mail::to($idee->email)->send(new IdeaStatusChanged($idee, $status));

    return view('emails.confirmeSubmetIdee');
        // return redirect('idees');
    }
    
}
