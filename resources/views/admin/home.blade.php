@extends('layouts.app')
@section('content')

<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    //https://stackoverflow.com/questions/48862489/creating-an-edit-modal-in-laravel-5
    $(document).ready(function () {
        // on modal show
        $('.EditBtn').on('click', function (event) {
            var button = $(this); // Button that triggered the modal
            var row = button.closest('tr');
            // get data row
            var id = row.children('td:first').text();
            var name = row.children('td:eq(1)').text();
            var email = row.find('td:eq(2)').text().trim();
            var type =row.find('td:eq(3)').text().trim();
            var organization = row.find('td:eq(4)').text().trim();

            // Update the modal's content. We'll use jQuery here,
            // but you could use a data binding library or other methods instead.
            var modal = $('#EditDemo');
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #user_id').val(id);
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #organization').val(organization);

        });
    });

    $(document).ready(function () {
    $('.delbtn').on('click', function (event) {
            console.log('Modal Opened');
            var button = $(this);
            var id = button.data('userid'); // Extract info from data-* attributes, we could do same as above too
            var modal = $('#ConfirmDelete');
            modal.find('.modal-body #user_id').val(id);
        });
    });
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center table-responsive" style="width: 60rem;">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <a href="/register" class="btn btn-primary"> Add New User</a>

                    @if(count($allUsers) > 0)
                    <table id="dtBasicExample"
                        class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>type</th>
                                <th>Organization</th>
                                <th>Status</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allUsers as $user) @if($user->is_activated)
                            <tr>
                                @else
                                {{-- check https://getbootstrap.com/docs/4.0/content/tables/#contextual-classes --}}
                            <tr class="table-warning" class="data-row">
                                @endif
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td><a href="mailto:{{ $user->email }}?Subject=Hello%20again"
                                        target="_top">{{ $user->email }}</a>
                                </td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->organization }}</td>
                                <td>@if ($user->is_activated) Enabled @else Disabled @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-info btn-sm waves-effect  btn-info EditBtn"
                                            data-toggle="modal" data-target="#EditDemo">
                                            Edit
                                            {{-- <span class="fas fa-user-edit"></span> --}}
                                        </button>
                                        @if ($user->is_activated)
                                        <a href="/profile/{{ $user->id }}/edit" role="button"
                                            class="btn btn-warning btn-sm waves-effect">
                                            Disable
                                        </a>
                                        @else
                                        <a href="/profile/{{ $user->id }}/edit" role="button"
                                            class="btn btn-success btn-sm waves-effect">
                                            Enable
                                        </a>
                                        @endif
                                        <button type="button"
                                            class="btn btn-danger btn-sm waves-effect  btn-danger delbtn"
                                            data-userid="{{ $user->id }}" data-toggle="modal"
                                            data-target="#ConfirmDelete">
                                            {{-- <span class="fas fa-user-edit"></span> --}}Delete
                                        </button>
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
            </div>
        </div>
    </div>
</div>


<!-- Attachment Modal for Edit -->
<div class="modal fade" id="EditDemo" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            {{-- <div class="modal-header ">
                <h5 class="modal-title" id="edit-modal-label">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body" id="attachment-body-content">
                {!! Form::open([
                'action' => ['ProfileController@update', 'prof'],
                'method' => 'POST',
                'id' => 'edit-form',
                'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data'
                ])
                !!}

                {{-- <form method="POST" action="{{ route('profile.update','prof') }}" id="edit-form"
                class="form-horizontal"> --}}
                {{ method_field('patch') }}
                <!-- used for update function -->
                {{ csrf_field() }}
                <!-- because of pages expired error -->
                <div class="card text-white bg-danger mb-0">
                    <div class="card-header">
                        <h2 class="m-0">Edit User</h2>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="userid" class="form-control" id="user_id" value="">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" required
                                title="example@domain.com">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="password">New Password</label>
                            <input type="text" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="organization">Organization</label>
                            <input type="text" name="organization" class="form-control" id="organization">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="type">Type</label>
                            <select id="type" class="custom-select form-control" name="type">
                                <option value="customer">Customer</option>
                                <option value="salesman">Salesman</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary float-right" value="Save Changes">
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /Attachment Modal -->




<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
    aria-hidden="true">
    <form method="POST" action="{{ route('profile.destroy','id') }}" id="delete-form" class="form-horizontal">
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <div class="modal-dialog modal-sm modal-notify modal-danger modal-confirm" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <div class="icon-box">
                        <i class="fas fa-skull-crossbones"> Are you sure?</i>
                    </div>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <i class="fas fa-times fa-4x animated rotateIn"></i>
                    <br>
                    <p>Do you really want to delete this account?<br> This process cannot be undone.</p>
                    <input type="hidden" name="userid" class="form-control" id="user_id" value="">
                </div>
                <div class="card-footer flex-center">
                    <button type="button" class="btn  btn-success waves-effect float-left"
                        data-dismiss="modal">No</button>
                    <button type="submit" class="btn  btn-danger waves-effect float-right">Yes</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </form>
</div>
<!-- /Modal: modalConfirmDelete -->
@endsection
