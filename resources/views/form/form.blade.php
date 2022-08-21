<div class="wrapper middle">

    <h1>Add Your Task</h1>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <a href="{{ route('show-tasks') }}" style="display: block;">View Tasks</a>
            </div>
        @endif
        
        <form action='@yield('action')' method="POST">
            @csrf

            @error('task')
                <div class="alert alert-danger"> {{ $message}} </div>
            @enderror

            <textarea name="task" id="task" cols="80" rows="15" placeholder="Write Your Task">{{  old('task')  }}</textarea>

            <input type="submit" value="Add Task" class="add">


            @error('type')
                <div class="alert alert-danger" style="margin-top:10px"> {{ $message}} </div>
            @enderror

            <select name="type" class='type' id ='type'> 
                <option value="">Choose type</option>
                <option value="must" {{   old('type') === 'must' ? 'selected' : ''  }}>Must</option>
                <option value="should" {{   old('type') === 'should' ? 'selected' : ''  }}>Should</option>
                <option value="if i have time" {{   old('type') === 'if i have time' ? 'selected' : ''  }}>If I have time</option>
            </select>
            
        </form>
    </div>

</div>



