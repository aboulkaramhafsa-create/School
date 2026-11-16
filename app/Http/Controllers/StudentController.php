<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // Afficher tous les étudiants
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('students.create');
    }

    // Enregistrer un nouvel étudiant
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits_between:1,11',
            'section' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['image'] = $request->file('image')
            ->store('students', 'public');

        Student::create($data);

        return redirect()->route('students.index')
            ->with('success', 'Etudiant ajouté avec succès.');
    }

    // Afficher les détails d'un étudiant
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        return view('students.show', compact('student'));
    }

    // Afficher le formulaire de modification
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    // Modifier un étudiant
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|digits_between:1,11',
            'section' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }

            $data['image'] = $request->file('image')
                ->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')
            ->with('success', 'Etudiant modifié avec succès.');
    }

    // Supprimer un étudiant
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Etudiant supprimé avec succès.');
    }
}
