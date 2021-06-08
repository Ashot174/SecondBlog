@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список пользователей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.user_management.user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать пользователя</a>
        <table class="table table-striped">
            <thead>
            <th>Имя</th>
            <th>Email</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class = "text-right">
                        <form action="{{route('admin.user_management.user.destroy', $user)}}" onsubmit="if(confirm('Delete?')) { return true }else {return false}" method="post">
                            {{method_field('DELETE')}}
                            @csrf

                            <a class = "btn btn-default" href="{{route('admin.user_management.user.edit', $user)}}"><i class="fa fa-edit"></i></a>

                            <button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right "></ul>
                    {{$users->links()}}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection

