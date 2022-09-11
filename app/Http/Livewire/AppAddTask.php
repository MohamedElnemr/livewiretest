<?php

namespace App\Http\Livewire;

use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AppAddTask extends Component {
	use WithFileUploads;

	public $title;
	public $photo;
	protected $rules = [
		'title' => 'required|min:3',
		'photo' => 'required',
	];

	public function updated($title) {
		$this->validateOnly($title);
	}

	public function addTask() {
		$data  = $this->validate();
		$image = $this->photo;

		$filename = time().'.'.$image->getClientOriginalExtension();
		Image::make($image)->save('images/posts/'.$filename);
		$data['photo'] = $filename;
		$data['status'] = TRUE;

		auth()->user()->tasks()->create($data);

		$this->title = "";
		$this->emit('taskAdded');
		session()->flash('message', 'Task was added succesfuly ');
	}

	public function render() {
		return view('livewire.app-add-task');
	}
}
