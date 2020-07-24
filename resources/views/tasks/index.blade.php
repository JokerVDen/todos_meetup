@extends('layouts.main')
@section('page-title', $pageTitle)
@section('content')
        <div class="container">
                <div class="row justify-content-center">
                        <div class="col-md-12">
                                <div class="card">
                                        <div class="card-body">
                                                <h2>Создание задачи</h2>
                                                <br>
                                                <form action="{{route('tasks.store')}}" method="post" class="form-new-task">
                                                        @csrf
                                                        <div class="form-group">
                                                                <label for="name">Имя пользователя</label>
                                                                <input type="text" class="form-control "
                                                                       id="name" name="name"
                                                                       placeholder="Введите ваше имя" value="{{ old('name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control "
                                                                       id="email" name="email" value="{{ old('email') }}"
                                                                       placeholder="Введите ваш e-mail">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="text">Задача</label>
                                                                <textarea class="form-control " id="text"
                                                                          name="text" rows="3">{{ old('text') }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Создать</button>
                                                </form>
                                        </div>
                                </div>
                                <br><br>
                                <h3>Список задач</h3>
                                <div class="card">
                                        <div class="card-body">
                                                <form action="{{ route('tasks.index') }}" method="GET">
                                                        <div class="row">
{{--                                                                <div class="col">--}}
{{--                                                                        <select class="form-control" name="orderBy" id="orderBy">--}}
{{--                                                                                @foreach($ordersForSelect as $value => $title)--}}
{{--                                                                                        <option value="{{ $value }}"--}}
{{--                                                                                                @if($value == $order['orderBy']) selected @endif>{{ $title }}</option>--}}
{{--                                                                                @endforeach--}}
{{--                                                                        </select>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col">--}}
{{--                                                                        <select class="form-control" name="direction" id="direction">--}}
{{--                                                                                <option value="asc" @if ($order['direction'] == 'asc') selected @endif>По--}}
{{--                                                                                        возрастанию--}}
{{--                                                                                </option>--}}
{{--                                                                                <option value="desc" @if ($order['direction'] == 'desc') selected @endif>По--}}
{{--                                                                                        убыванию--}}
{{--                                                                                </option>--}}
{{--                                                                        </select>--}}
{{--                                                                </div>--}}
                                                        </div>

                                                </form>
                                        </div>
                                </div>

                                @forelse($tasks as $task)
                                        <div class="card">
                                                <div class="card-header">
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                        Задача № {{$task->id}}&nbsp;&nbsp;
                                                                        @if ($task->status)
                                                                                <span class="badge badge-success">Выполнено</span>
                                                                        @else
                                                                                <span class="badge badge-secondary">Не выполнено</span>
                                                                        @endif
                                                                </div>
                                                                @auth
                                                                        <div class="col-md-6 text-right">
                                                                                <a href="{{ route('tasks.edit') }}" class="btn btn-primary">Редактировать</a>
                                                                        </div>
                                                                @endauth
                                                        </div>
                                                </div>
                                                <div class="card-body">
                                                        <div class="form-group">
                                                                <strong>Имя пользователя:</strong>
                                                                {{ $task->name }}
                                                        </div>
                                                        <div class="form-group">
                                                                <strong>Email:</strong>
                                                                {{ $task->email }}
                                                        </div>
                                                        <div class="form-group">
                                                                <strong>Текст задачи:</strong><br>
                                                                {{ $task->text }}
                                                        </div>
                                                </div>
                                        </div>
                                @empty
                                        Пока нет задач
                                @endforelse
                                {{ $tasks->links() }}
{{--                                @if ($paginate['isPaginated'])--}}
{{--                                        <nav aria-label="Page pagination">--}}
{{--                                                <ul class="pagination justify-content-center">--}}
{{--                                                        @if($paginate['back'])--}}
{{--                                                                <li class="page-item">--}}
{{--                                                                        <a class="page-link"--}}
{{--                                                                           href="{{ url_for_paginate('/', $paginate['back'], $orderForPaginate) }}"--}}
{{--                                                                           aria-label="Назад">--}}
{{--                                                                                <span aria-hidden="true">&laquo;</span>--}}
{{--                                                                        </a>--}}
{{--                                                                </li>--}}
{{--                                                        @else--}}
{{--                                                                <li class="page-item  disabled ">--}}
{{--                                                                        <a class="page-link" href="" aria-label="Назад">--}}
{{--                                                                                <span aria-hidden="true">&laquo;</span>--}}
{{--                                                                        </a>--}}
{{--                                                                </li>--}}
{{--                                                        @endif--}}
{{--                                                        @for($i = 1; $i <= $paginate['countPages']; $i++)--}}
{{--                                                                <li class="page-item @if($i == $paginate['current']) active @endif">--}}
{{--                                                                        <a class="page-link"--}}
{{--                                                                           href="{{ url_for_paginate('/', $i, $orderForPaginate) }}">{{ $i }}</a>--}}
{{--                                                                </li>--}}
{{--                                                        @endfor--}}

{{--                                                        @if($paginate['next'])--}}
{{--                                                                <li class="page-item">--}}
{{--                                                                        <a class="page-link"--}}
{{--                                                                           href="{{ url_for_paginate('/', $paginate['next'], $orderForPaginate) }}"--}}
{{--                                                                           aria-label="Вперед">--}}
{{--                                                                                <span aria-hidden="true">&raquo;</span>--}}
{{--                                                                        </a>--}}
{{--                                                                </li>--}}
{{--                                                        @else--}}
{{--                                                                <li class="page-item  disabled ">--}}
{{--                                                                        <a class="page-link" href="" aria-label="Вперед">--}}
{{--                                                                                <span aria-hidden="true">&raquo;</span>--}}
{{--                                                                        </a>--}}
{{--                                                                </li>--}}
{{--                                                        @endif--}}

{{--                                                </ul>--}}
{{--                                        </nav>--}}
{{--                                @endif--}}
                        </div>
                </div>
        </div>
@endsection