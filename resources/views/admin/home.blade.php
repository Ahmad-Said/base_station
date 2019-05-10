<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    //https://stackoverflow.com/questions/48862489/creating-an-edit-modal-in-laravel-5
    $(document).ready(function () {
        // on modal show
        $('#EditDemo').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('userid');
            var name = button.data('name');// Extract info from data-* attributes
            var email = button.data('email');// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #user_id').val(id);
        });
    });

    $(document).ready(function () {
    $('#ConfirmDelete').on('show.bs.modal', function (event) {
            console.log('Modal Opened');
            var button = $(event.relatedTarget)
            var id = button.data('userid');
            var modal = $(this);
            modal.find('.modal-body #user_id').val(id);
        });
    });
</script>


<div class="card text-center table-responsive">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        @if(count($allusers) > 0)
        <table id="dtBasicExample" class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
            cellspacing="0" width="100%">
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
                <tr class="table-warning" class="data-row">
                    @endif
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td><a href="mailto:{{ $user->email }}?Subject=Hello%20again" target="_top">{{ $user->email }}</a>
                    </td>
                    <td>@if ($user->is_activated) Enabled @else Disabled @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info btn-sm waves-effect  btn-outline-info"
                                data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                data-userid="{{ $user->id }}" data-toggle="modal" data-target="#EditDemo">
                                <span class="fas fa-user-edit"></span>
                            </button>
                            <a href="/profile/{{ $user->id }}/edit" role="button"
                                class="btn btn-warning btn-sm waves-effect  btn-outline-warning">
                                <span class="fas fa-user-slash"></span>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm waves-effect  btn-outline-danger"
                                data-userid="{{ $user->id }}" data-toggle="modal" data-target="#ConfirmDelete">
                                <span class="fas fa-user-edit"></span>
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

<!-- Attachment Modal for Edit -->
<div class="modal fade" id="EditDemo" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="edit-modal-label">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form method="POST" action="{{ route('profile.update','prof') }}" id="edit-form"
                    class="form-horizontal">
                    {{ method_field('patch') }}
                    <!-- used for update function -->
                    {{ csrf_field() }}
                    <!-- because of pages expired error -->
                    <div class="card text-white bg-dark mb-0">
                        <div class="card-header">
                            <h2 class="m-0">Edit</h2>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="userid" class="form-control" id="user_id" value="">
                            <div class="form-group">
                                <label class="col-form-label" for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Save Changes"></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <p class="heading">Are you sure?</p>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <i class="fas fa-times fa-4x animated rotateIn"></i>
                    <input type="hidden" name="userid" class="form-control" id="user_id" value="" >
                </div>
                <div class="modal-footer flex-center">
                    <button type="submit" class="btn  btn-danger waves-effect" >Yes</button>
                    <button type="button" class="btn  btn-warning waves-effect" data-dismiss="modal">No</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </form>
</div>
<!--Modal: modalConfirmDelete-->
