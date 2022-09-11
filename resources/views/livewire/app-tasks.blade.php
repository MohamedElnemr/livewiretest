<div>
    <h3 class="text-center">My Task ({{$totalTasks}})</h3>





    <table class="table bg-white ">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td scope="row">{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status == true ? 'Completed' : 'Pending' }}</td>
                {{-- <td>{{ $task->photo }}</td> --}}
                <td><img src="{{ $task->photo }}" /></td>
                {{-- <td>{{ $task->photo }}</td> --}}
            </tr>

            @endforeach



        </tbody>


    </table>
    {{ $tasks->links() }}

</div>
