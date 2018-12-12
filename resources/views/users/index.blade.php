@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>
                <table class="table">
                    <!--<caption>User List</caption>-->
                    <thead>
                        <tr>
                            <th class="text-nowrap">Display Order</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->display_order }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="3">
                                <table class="table table-condensed">
                                    <caption>Posts</caption>
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Display Order</th>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->posts as $post)
                                        <tr>
                                            <td>{{ $post->display_order }}</td>
                                            <td>{{ $post->id }}</td>
                                            <td>
                                                <span class="post-text">
                                                    {{ $post->title }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="post-text">
                                                    {{ $post->content }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @empty($users)
                    <p>No user</p>
                @endempty
            </div><!--panel-->
            <div>
                {{ $users->links() }}
            </div>
        </div><!--col-->
    </div><!--row-->
</div><!--container-->
@endsection
