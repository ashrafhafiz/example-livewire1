<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $email;
    public $course;
    public $search = '';

    // protected function rules()
    // {
    //     return [
    //         'name' => 'required|string|min:6',
    //         'email' => ['required', 'email', 'unique:students'],
    //         'course' => 'required'
    //     ];
    // }

    protected $rules = [
        'name' => 'required|string|min:6',
        'email' => 'required|email|unique:students',
        'course' => 'required'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $this->validate();
        \App\Models\Student::create([
            'name' => $this->name,
            'email' => $this->email,
            'course' => $this->course,
        ]);
        $this->reset();
        session()->flash('success', 'Student record created successfuly');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        $students = \App\Models\Student::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(3);
        return view('livewire.student', ['students' => $students]);
    }
}