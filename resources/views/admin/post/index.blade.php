@extends('layouts.admin_layout')

@section('title', 'Все статьи')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все статьи</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" area-hidden="true">
                        <i class="fas fa-times"></i>
                    </button>
                    <h4><i class="icon fa fa-check">{{ session('success') }}</i></h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 3%">
                                ID
                            </th>
                            <th>
                                Название
                            </th>
                            <th style="width: 30%">
                            </th>
                            <th style="width: 3%">
                                Изображение
                            </th>
                            <th>
                                Содержание
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    {{ $post['id'] }}
                                </td>
                                <td>
                                    {{ $post['title'] }}
                                </td>
                                <td>
                                    {{ $post['img'] }}
                                </td>
                                <td>
                                    {{ $post['text'] }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('post.edit', $posty['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </a>
                                    <form action="{{ route('post.destroy', $post['id']) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
