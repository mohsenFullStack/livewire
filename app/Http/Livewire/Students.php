<?php

namespace App\Http\Livewire;



use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
class Students extends Component
{
    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $image;
    public $searchTerm;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',

        ]);
    }

    public function submitform()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',

        ]);
    }

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
        $this->image = '';
    }
    use WithFileUploads;
    public function store()
    {
        $validateData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        Student::create($validateData);
        session()->flash('message', 'add successfully');
        $this->resetInputFields();
        $this->emit('StudentAdded');
    }

    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        $this->ids = $student->id;
        $this->firstname = $student->firstname;
        $this->lastname = $student->lastname;
        $this->email = $student->email;
        $this->phone = $student->phone;
    }

    public function update()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        if ($this->ids) {
            $students = Student::find($this->ids);
            $students->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
            session()->flash('update', 'update successfully');
            $this->resetInputFields();
            $this->emit('StudentUpdated');
        }
    }

    public function delete($id)
    {
        if ($id) {
            Student::where('id', $id)->delete();
            session()->flash('delete', 'delete successfully');
        }
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $students = Student::where('firstname', 'like', $searchTerm)
            ->orWhere('lastname', 'like', $searchTerm)
            ->orWhere('email', 'like', $searchTerm)
            ->orWhere('phone', 'like', $searchTerm)
            ->orderBy('id', 'desc')->paginate(5);
        return view('livewire.students', compact('students'));
    }
}
