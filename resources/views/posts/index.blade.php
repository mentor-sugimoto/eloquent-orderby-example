@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <table class="table">
                    <!--<caption>Post List</caption>-->
                    <thead>
                        <tr>
                            <!--User-->
                            <th class="text-nowrap">User<br>Display Order</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!--Post-->
                            <th class="text-nowrap">Post<br>Display Order</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        @php
                            $user = $post->user;
                        @endphp
                        <tr>
                            <!--User-->
                            <td>{{ $user->display_order }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <!--Post-->
                            <td>{{ $post->display_order }}</td>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @empty($posts)
                    <p>No post</p>
                @endempty
            </div><!--panel-->
            <div>
                {{ $posts->links() }}
            </div>
        </div><!--col-->
    </div><!--row-->
</div><!--container-->
@endsection
