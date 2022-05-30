@extends('layouts.admin')
@section('title') Список пользователей @endsection
@section('header')
    <h1 class="h2">Список пользователей</h1>
@endsection
@section('content')
    <div class="table-responsive">
        @include('inc.message')

        <table class="table table-bordered">
            <thead>
               <tr>
                   <th>Имя</th>
                   <th>Email</th>
                   <th>Статус</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($users as $user)
                  <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td id = 'is_admin_class' class = 'is_admin_class'>{{ $user->is_admin }}</td>
                      <td>
                          <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">Ред.</a> &nbsp;
{{--                          <a href="javascript:;" style="color:red;">Уд.</a>--}}
                      </td>
                  </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>

{{--        {{ $users->links() }}--}}
    </div>

    @once
            <script>
                let a = document.getElementsByClassName('is_admin_class')
                for(let value of a) {
                    if(value.textContent.length > 0) {
                        value.textContent = 'админ'
                    } else {
                        value.textContent = 'пользователь'
                    }
                }
            </script>
    @endonce
@endsection

