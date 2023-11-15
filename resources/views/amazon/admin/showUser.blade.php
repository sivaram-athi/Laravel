@extends('amazon.admin.adminNav')

@section('content')
    @include('amazon.admin.nav')
    <div class=" p-5 container rounded mt-3"style="background: #F08804;">
        <table class="table table-dark   table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Entry Path</th>
                    <th scope="col">Register Path</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="p-3">{{ $user->name }}</td>
                        @if ($user->entry_path != null)
                            <td>{{ $user->entry_path }}</td>
                        @else
                            <td>-</td>
                        @endif
                        @if ($user->register_path != null)
                            <td>{{ $user->register_path }}</td>
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
