@extends('layouts.app')

@section('title')
    <p>Kontaktanfrage</p>
@endsection

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Nachricht</th>
            <th>Aktion</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($contact_requests as $contact_request)
            <tr>
                <td>{{ $contact_request->id }}</td>
                <td>{{ $contact_request->name }}</td>
                <td>{{ $contact_request->email }}</td>
                <td>{{ $contact_request->message }}</td>
                <td>
                    <a href="{{ route('admin.contactDone', ['contact_request' => $contact_request->id]) }}" class="btn btn-success">Fertig</a>
                    <form action="{{ route('admin.contactDelete', ['contact_request' => $contact_request->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Löschen</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contact_requests->links() }}
@endsection
