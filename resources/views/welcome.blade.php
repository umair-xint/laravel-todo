<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Laravel Todo</title>
</head>
<body>

    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Laravel Todo</h1>
            </div>
            <div class="col-12 col-md-4 mx-auto">
                <div class="card">
                    <h3 class="card-header">My Todos</h3>
                    <div class="card-body">
                        <form action="#" class="form-row" id="todo-form">
                            <div class="col-10 form-group">
                                <input type="text" id="txt-task" class="form-control form-control-sm" placeholder="Enter new task">
                            </div>
                            <div class="col-2 form-group">
                                <input type="submit" value="Add" class="btn btn-primary btn-block btn-sm">
                            </div>
                        </form>
                        <ul class="list-group">
                            @forelse ($tasks as $task)
                            <li class="list-group-item">
                                {{ $task->content }}
                                <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="" class="btn btn-danger btn-sm float-right">Del</button>
                                </form>
                            </li>
                            @empty

                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>

    <script>

        $(document).ready(function(){
            $("#todo-form").on('submit', function(e){
                e.preventDefault();

                var task = $("#txt-task").val();
                console.log(task);

                axios.post('/api/tasks/store', {
                    task :task
                }).then(function(response){
                    // console.log(response.data.message);
                    window.location.reload();
                }).catch(function(error){
                    console.log(error)
                })
            })
        });

    </script>
</body>
</html>
