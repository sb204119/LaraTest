@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                        <div class="container">
                            <div class="row justify-content-center">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{ __('Форма обратной связи клиента') }}</div>
                                        <div class="card-body">
                                            <form action="{{ route('client-feedback.submit') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="subject">{{ __('Тема') }}</label>
                                                    <input type="text" name="subject" id="subject" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message">{{ __('Сообщение') }}</label>
                                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="attachment">{{ __('Прикрепить файл') }}</label>
                                                    <input type="file" name="attachment" id="attachment" class="form-control-file">
                                                </div>
                                                <button type="submit" class="btn btn-primary">{{ __('Отправить') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
