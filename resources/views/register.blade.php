
@include('layouts.main')
<div class="container d-flex align-items-center justify-content-center w-100 h-100" style="margin-top: 100px">
    <form method="POST" action="{{ route('register') }}" class="auth_form admin_login justify-content-center">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Логин</label>
            <input type="text" class="form-control @error('login') is-invalid @enderror" id="exampleInputEmail1" name="login" aria-describedby="emailHelp"
                   value="">
            @error('login')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Имя</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" name="name" aria-describedby="emailHelp" value="">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" value="">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Войти</button>
        <div class="text-secondary text-center mt-4">Есть аккаунт?&nbsp;<a href="/login" style="font-size: 20px">Войти.</a>
        </div>
    </form>
</div>
