@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Форма обратной связи для клиента') }}</div>
                    <div class="card-body">
                        <form action="{{ route('submit.feedback') }}" method="post">
                            @csrf
                            <label for="subject">Тема:</label>
                            <input type="text" name="subject" id="subject">
                            <label for="message">Сообщение:</label>
                            <textarea name="message" id="message" cols="30" rows="10"></textarea>
                            <label for="attachment_link">Ссылка на вложение:</label>
                            <input type="url" name="attachment_link" id="attachment_link">
                            <button type="submit">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
