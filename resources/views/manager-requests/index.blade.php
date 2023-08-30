@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список заявок</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Тема</th>
                <th>Сообщение</th>
                <th>Имя клиента</th>
                <th>Почта клиента</th>
                <th>Ссылка на прикрепленный файл</th>
                <th>Время создания</th>
                <th>Ответил</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->subject }}</td>
                    <td>{{ $request->message }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->user->email }}</td>
                    <td>
                        @if($request->attachment_link)
                            <a href="{{ $request->attachment_link }}" target="_blank">Ссылка</a>
                        @else
                            Нет файла
                        @endif
                    </td>
                    <td>{{ $request->created_at }}</td>
                    <td>
                        @if($request->is_responded)
                            Да
                        @else
                            Нет
                        @endif
                    </td>
                    <td>
                        @if($request->is_responded)
                            Да
                        @else
                            <form action="{{ route('manager-requests.mark-responded', $request) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-link">Отметить как отвеченную</button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
