<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>Laravel CRUD</title>
    </head>
    <body>
      <div class="container mt-3">
        <h1>TASKS</h1>
        <hr>

        <h3>Add new task</h3>
        <form action="{{ url('/todos') }}" method="POST">
          @csrf
          <div class="row m-2">
            <div class="col">
              Title: <input type="text" class="form-control" placeholder="Enter title" name="title">
            </div>
            <div class="col">
              Deadline: <input type="date" class="form-control" placeholder="deadline" name="deadline">
            </div>
          </div>
          <div class="row m-2">
            <div class="col">
              Description: <input type="text" class="form-control" placeholder="Enter description" name="description">
            </div>
            <div class="col">
              Person: <input type="text" class="form-control" placeholder="Enter name" name="person">
            </div>
          </div>
          <div class="row m-2">
            <div class="col">
              Status:
              <select class="form-select" name="status">
                <option value="Prepare">Prepare</option>
                <option value="On progress">On progress</option>
                <option value="Testing">Testing</option>
                <option value="Done">Done</option>
              </select>
            </div>
            <div class="col text-center align-items-center">
              <br/>
              <button class="btn btn-primary w-100" type="submit">Add</button>
            </div>
          </div>
        </form>
        <hr>
        <div class="mt-3">
          <h3>Task List</h3>
          </div>
          <div class="p-3">
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th>Title</th>
                  <th>Deadline</th>
                  <th>Description</th>
                  <th>Person</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($todos as $todo)
                <tr>
                  <td>{{ $todo->title }}</td>
                  <td>{{ $todo->deadline }}</td>
                  <td>{{ $todo->description }}</td>
                  <td>{{ $todo->person }}</td>
                  <td>{{ $todo->status }}</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                      Edit
                    </button>
                    <form action="{{ url('todos/'.$todo->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                    <div class="modal" id="myModal">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Task</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form action="{{ url('todos/'.$todo->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              Title: <input type="text" class="form-control mb-2" value="{{ $todo->title }}" name="title">
                              Deadline: <input type="date" class="form-control mb-2" value="{{ $todo->deadline }}" name="deadline">
                              Description: <input type="text" class="form-control mb-2" value="{{ $todo->description }}" name="description">
                              Person: <input type="text" class="form-control mb-2" value="{{ $todo->person }}" name="person">
                              Status:
                              <select class="form-select mb-4" name="status">
                                <option value="Preapre"  {{ ( $todo->status == 'Prepare') ? 'selected' : '' }}>Prepare</option>
                                <option value="On progress" selected ="@if($todo->status=='On progress'){'selected'}else{''} @endif">On progress</option>
                                <option value="Testing" selected ="@if($todo->status=='Testing'){'selected'}else{''} @endif">Testing</option>
                                <option value="Done" selected ="@if($todo->status=='Done'){'selected'}else{''} @endif">Done</option>
                              </select>
                              <div style="text-align: right">
                                <button class="btn btn-secondary" type="submit">Update</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              <div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
