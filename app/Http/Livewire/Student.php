<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Student extends Component
{
    public $name;
    public $email;
    public $course;

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

    public function render()
    {
        return view('livewire.student');
    }

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
        $this->dispatchBrowserEvent('close-modal');
    }
}