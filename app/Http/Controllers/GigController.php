<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class GigController extends Controller
{
    // show all gigs
    public function index()
    {
        return view('gigs.index', [
            'gigs' => Gig::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // detail gigs

    public function show(Gig $gig)
    {
        return view('gigs.show', [
            'gig' => $gig
        ]);
    }

    // create form

    public function create()
    {
        return view('gigs.create');
    }

    // store form data

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('gigs', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Gig::create($formFields);


        return redirect('/')->with('message', 'Gig created successfully');
    }

    // edit form
    public function edit(Gig $gig)
    {
        return view('gigs.edit', ['gig' => $gig]);
    }


    // update gig
    public function update(Request $request, Gig $gig)
    {
        // check if logged in user is owner
        if ($gig->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }


        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $gig->update($formFields);


        return back()->with('message', 'Gig updated successfully');
    }


    // delete gig

    public function destroy(Gig $gig)
    {
        if ($gig->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }


        $gig->delete();
        return redirect('/')->with('message', 'Gig deleted successfully');
    }

    // manage gigs

    public function manage()
    {
        return view('gigs.manage', ['gigs' => auth()->user()->gigs()->get()]);
    }

}
