<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Repositories\AthleteRepository;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    protected $athleteRepository;

    public function __construct(AthleteRepository $athleteRepository)
    {
        $this->athleteRepository = $athleteRepository;
    }

    public function index()
    {
        $athletes = $this->athleteRepository->getAll();
        return view('admin.athletes.index', compact('athletes'));
    }

    public function indexgfetchall()
    {
        // Fetch all athletes from the database
        $athletes = Athlete::all();

        // Pass the athletes data to the view
        return view('athletes', compact('athletes'));
    }

    public function create()
    {
        return view('admin.athletes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'link_instagram_profile' => 'nullable|url',
        ]);

        $this->athleteRepository->create($request->all());

        return redirect()->route('athletes.index')->with('success', 'Athlete created successfully.');
    }

    public function edit($id)
    {
        $athlete = $this->athleteRepository->find($id);
        return view('admin.athletes.edit', compact('athlete'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'link_instagram_profile' => 'nullable|url',
        ]);

        $this->athleteRepository->update($id, $request->all());

        return redirect()->route('athletes.index')->with('success', 'Athlete updated successfully.');
    }

    public function destroy($id)
    {
        $this->athleteRepository->delete($id);
        return redirect()->route('athletes.index')->with('success', 'Athlete deleted successfully.');
    }
}
