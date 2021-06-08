@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список новостей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent

        <hr>

        <a href="{{route('article.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать новость</a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->published}}</td>
                    <td class = "text-right">
                        <form action="{{route('article.destroy', $article)}}" onsubmit="if(confirm('Delete?')) { return true }else {return false}" method="post">
                            {{method_field('DELETE')}}
                            @csrf

                            <a class = "btn btn-default" href="{{route('article.edit', $article)}}"><i class="fa fa-edit"></i></a>

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
                    {{$articles->links()}}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection

