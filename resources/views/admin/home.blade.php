<div class="card text-center">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        @if(count($allusers) > 0)
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allusers as $user) @if($user->is_activated)
                <tr>
                    @else {{-- check https://getbootstrap.com/docs/4.0/content/tables/#contextual-classes --}}
                    <tr class="table-warning">
                        @endif
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="mailto:{{ $user->email }}?Subject=Hello%20again" target="_top">{{ $user->email }}</a></td>
                        <td>@if ($user->is_activated) Enabled @else Disabled @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/profile/{{ $user->id }}" role="button" class="btn btn-info btn-sm waves-effect  btn-outline-info">
                                     <span class="fas fa-user-edit"></span>
                                    </a>
                                <a href="/profile/{{ $user->id }}/edit" role="button" class="btn btn-warning btn-sm waves-effect  btn-outline-warning">
                                      <span class="fas fa-user-slash"></span>
                                    </a>
                                <a href="/profile/{{ $user->id }}" role="button" class="btn btn-danger btn-sm waves-effect  btn-outline-danger ">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                            </div>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Control</th>
                </tr>
            </tfoot>
        </table>
        @else
        <p>There is not registred users yet.</p>
        @endif
    </div>


    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
          });
    </script>
</div>
