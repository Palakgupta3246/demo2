 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a  href="{{route('post.create') }}">
                        Add Post
                    </a>
                    <table>
                        <tr>
                            <th>S.No.</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>description</th>
                            <th>button</th>
                        </tr>

                        <?php
                        $index = 0;
                        ?>
                        @foreach($posts as $post)
                        <?php
                        $index += 1;
                        ?>
                        <tr>
                            <td><?= $index ?></td>
                            <td>{{$post->title}}</td>
                            <td><img src="{{$post->image}}"></td>
                            <td>{{$post->description}}</td>
                            <td>
                                <form action="{{route('post.edit',$post->id)}}" method="post">
                                    @method('GET')
                                    @csrf
                                    <input type="submit" value="Edit">
                                </form>
                            </td>
                            <td>
                                <form action="{{route('post.destroy',$post->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <div class="col-sm-12">
                            {{$posts->links()}}
                        </div>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

