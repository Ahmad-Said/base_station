<div class="card text-center" >
        <div class="card-header">Dashboard</div>
        <div class="card-body">
                @if(count($allusers) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Control</th>
                            </tr>
                            @foreach($allusers as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->type}}</td>
                                    <th>
                                        <button type="button" class="btn btn-primary btn-sm"><span class="fas fa-user-edit"></span></button>
                                        <button type="button" class="btn btn-warning btn-sm"><span class="fas fa-user-slash"></span></button>
                                        <button type="button" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                        
                                    </th>
                                </tr>
                            @endforeach
                            {{$allusers->links()}}
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
        </div>
    </div>
