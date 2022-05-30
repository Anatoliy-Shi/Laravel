@extends('layouts.admin')
@section('title') Редактировать пользователя @endsection
@section('header')
    <h1 class="h2">Редактировать пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
@endsection

@section('content')

    <div>
        @include('inc.message')
        <form method="post" action="{{ route('admin.user.update', ['user' => $users]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')


            <div class="form-group">
                <label for="author">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <p class="form-control">{{ $users->email }} </p>
            </div>



            <div class="form-group">
                <label for="name">пометки</label>
                <p class="form-control">0 - пользователь, 1 - админ</p>
            </div>

            <div class="form-group">
            <label for="is_admin">Статус</label>

            <select class="form-control" id="is_admin" name="is_admin">
                <option class="is_admin_class"> 1 </option>
                <option class="is_admin_class"> 0  </option>
            </select>

                @error('is_admin') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>



            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
{{--    @once--}}
{{--        <script>--}}
{{--            let a = document.getElementsByClassName('is_admin_class')--}}
{{--            for(let value of a) {--}}
{{--                if(value.textContent == 0) {--}}
{{--                    value.textContent = 'пользователь'--}}
{{--                } else {--}}
{{--                    value.textContent = 'админ'--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endonce--}}

@endsection
