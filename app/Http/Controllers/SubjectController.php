<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Ctet;
use DB;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function SubList()
    {
     return view ("subject-list");
    } 
    
    public function create()
    {
        return view('bed-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'status' => 'required|in:Beginning,Average,Complete',
            'date' => 'required|date',
        ]);

        Subject::create($request->all());

        return redirect()->intended('bed-list')->with('success', 'Subject added successfully!');
    }

    public function BedList()
    {
        $subjects = Subject::all();
        return view('bed-list', compact('subjects'));
    }

    public function destroy($id)
    {
        // Find the subject by ID
        $subject = Subject::find($id);

        // Check if the subject exists
        if (!$subject) {
            return redirect()->back()->with('error', 'Subject not found.');
        }

        // Delete the subject
        $subject->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Subject deleted successfully.');
    }



    public function createStore()
    {
        return view('ctet-add');
    }

    public function storeCreate(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'status' => 'required|in:Beginning,Average,Complete',
            'date' => 'required|date',
        ]);

        Ctet::create($request->all());

        return redirect()->intended('ctet-list')->with('success', 'Subject added successfully!');
    }

    public function CtetList()
    {
        $ctets = Ctet::all();
        return view('ctet-list', compact('ctets'));
    }

    public function destroyid($id)
    {
        // Find the subject by ID
        $ctet = Ctet::find($id);

        // Check if the subject exists
        if (!$ctet) {
            return redirect()->back()->with('error', 'Subject not found.');
        }

        // Delete the subject
        $ctet->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Subject deleted successfully.');
    }

}
