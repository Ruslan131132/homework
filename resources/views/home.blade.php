@include('layouts.header')
@include('layouts.main')
<body>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
        style="display: flex;justify-content: center; margin: 40px auto;">
    Создать заметку
</button>

<div class="container">
    <table class="table table-hover main-content">
        <thead id="body_titles">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Текст</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Статус</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody id="body_content">
        @foreach($data as $item)
            <tr>
                <th scope="row">{{$item['id']}}</th>
                <td>{{$item['title']}}</td>
                <td>{{$item['description']}}</td>
                <td>{{$item['created_at']}}</td>
                <td>{{$item['status']}}</td>
                <td>
                    <form method="POST" action="{{ route('home.delete') }}"
                          class="auth_form admin_login justify-content-center">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('home.create') }}"
                      class="auth_form admin_login justify-content-center">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="text" class="form-control @error('login') is-invalid @enderror" id="title"
                               name="title" aria-describedby="emailHelp" value="">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Описание</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="description"></textarea>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Статус</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="Напоминание" selected>Напоминание</option>
                            <option value="Срочно">Срочно</option>
                            <option value="Информация">Информация</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
