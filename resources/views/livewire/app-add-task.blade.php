<div>


    <h3 class="text-center">Add New Task</h3>

<form enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" wire:model="title" class="form-control">

        <input type="file" wire:model="photo">
    </div>

    <div class="form-group">
        <button wire:click.prevent="addTask" class="btn btn-primary btn-block">Add</button>
    </div>
    @if (session()->has('message'))
    <div class="div alert alert-success">
        {{ session('message') }}
    </div>
    @endif

   @error('title')
        <div class="div alert alert-danger">
            {{ $message }}
        </div>
   @enderror

   @error('photo')
   <div class="div alert alert-danger">
       {{ $message }}
   </div>
@enderror
    </form>



</div>
