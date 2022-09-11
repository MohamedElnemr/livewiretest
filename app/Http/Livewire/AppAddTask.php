<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class AppAddTask extends Component
{
    use WithFileUploads;

    public $title;
    public $photo;



    protected $rules = [
        'title'=>'required|min:3',
        'photo'=>'required'
    ];

    public function render()
    {
        return view('livewire.app-add-task');
    }

    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function addTask()
    {

        $this->validate();

        if ($this->photo)
        {
            $file     = $this->photo;
            $filename = Str::random(5).$file->getClientOriginalName();
            $file->move(public_path("/public/images/"), $filename);

            $input['photo'] = $filename;
        }

        auth()->user()->tasks()->create([
            'title' => $this->title,
            'photo' =>$this->photo,
            'status' => True,
        ]);
        // $this->photo->store('photos');

        $this->title = "";

        $this->emit('taskAdded');
        session()->flash('message','Task was added succesfuly ');
    }


}
