<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Запуск проекта

Для запуска проекта на Laravel и автоматического развертывания базы данных необходимо воспользоваться утилитой (файл в корневой директории) `./run.sh`, используя терминал Git Bash.

### <a name='project-run-docker-compose'></a>Запуск проекта в docker compose с помощью ./run.sh

Для запуска проекта в docker-compose через `./run.sh`, откройте терминал Git Bash в директории проекта и выполните команду:

```sh
# Чтобы вставить в GitBash - Shift + Insert
./run.sh
```

Данная команда выполняет автоматическую настройку `.env` файла (сделает копию `.env.example` и переименует в `.env`, установит `APP_KEY`, если его нет), устанавливает зависимости для `Laravel` и все `npm` зависимости, а также запускает проект и базу данных в docker'e, выполняет миграцию.

### Запуск проекта локально с помощью ./run.sh --local

Для запуска проекта и базы данных локально (не в docker-контейнерах), используйте команду:

```sh
./run.sh  --local
```

### Запуск проекта без утилиты ./run.sh, напрямую с помощью docker compose

Используйте эти команды, когда хотите запустить проект в docker-compose, или в случае, когда у вас не работает composer/npm/php

Все файлы базы данных будут храниться в папке `db_data` в корне проекта. Чтобы очистить БД, можно просто удалить эту папку.

- Запуск проекта Laravel в связке с автоматически развертываемой базой данных MySQL:

```sh
docker compose up -d
```

- Остановка проекта Laravel без остановки базы данных:

```sh
docker compose down laravel
```

При любом изменении файлов необходимо пересобирать Laravel-проект и запускать его заново:
```sh
docker compose down laravel
docker compose build laravel
docker compose up -d

```

## Публикация проекта на удаленный хост

Для публикации проекта на удаленном хосте, необходимо скопировать файлы проекта с вашего компьютера на сервер.

### Подключение к удаленному хосту и работа с файловой системой сервера

Для подключения к удаленному хосту, используйте команду:

```sh
ssh <имя_пользователя>@<удаленный_хост>
```

- имя_пользователя - имя подключающегося к удаленному хосту пользователя. По стандарту - `root`.

- удаленный_хост - ip-адрес сервера, на который вы хотите подключиться.

### <a name='file-system-navigation'></a> Переход по папкам, просмотр и удаление файлов

Для перехода по папкам, используйте команду:

```sh
cd <путь_к_папке>
```

- путь_к_папке - путь до директории, в которую необходимо перейти. Например, `/usr/src`.

Для того, чтобы определить текущую директорию, обратите внимание на командную строку:

```sh
# слева, после пользователя и хоста указана текущая директория
[root@127.0.0.1 /usr/src]$ 
```

Для того, чтобы узнать полный путь до текущей директории, используйте команду:

```sh
pwd
```

Для просмотра списка файлов в текущей директории, используйте команду:

```sh
ls -a
```

Для удаления файлов, используйте следующую команду:

```sh
# удаление всех файлов из папки
rm -rf /usr/src/ # /usr/src/ - это пример директории, в которой нужно удалить файлы. ВАЖНО! В данном случае, если не указать "/" после "src", будет удалена вся папка src, и её придется создавать заново.

# удаление конкретного файла
rm -rf .dockerignore
```

Для создания папки, используйте следующую команду:

```sh
mkdir /usr/src/ # эта команда создаст папку src/ в папке usr/
```
### Стили для регистрации
```sh
<div class="w-full max-w-md  p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Регистрация на платформе</h5>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Почта</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
        </div>
        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="login" :value="__('Логин')" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tel" :value="__('Телефон')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Подтвердить пароль')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Запомнить меня</label>
            </div>
        </div>
        <x-primary-button  class="flex justify-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Зарегистрироваться</x-primary-button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Уже зарегистрированы? <a href="{{ route('login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Войти в аккаунт</a>
        </div>
    </form>
</div>
```

### Стили для логина
```sh
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form method="POST" action="{{ route('login') }}" class="space-y-6" >
    @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
        <div>
        <x-input-label for="login" :value="__('Логин')" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
            </div>
        </div>
        <x-primary-button  class="flex justify-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</x-primary-button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Not registered? <a href="{{ route('register') }}" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
        </div>
    </form>
</div>
</x-guest-layout>
```

### Роуты
```sh
Route::get('/', [ReportController::class, 'welcome'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ReportController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/store', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/create', [ReportController::class, 'create'])->name('reports.create');
});

Route::middleware((Admin::class))->group(function(){
    Route::get('/admin', [AdminController::class, 'index']) -> name('admin.index');
    Route::put('/update', [ReportController::class, 'update'])->name('reports.update');
});
```


### AdminController и все что связано с админом


- AdminController
```sh
 public function index(){
        $reports = Report::all();
        return view('admin.index', compact('reports'));
    }
```

- Страница админа
```sh
 <div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <a class="mb-4 inline-flex items-center px-4 py-2 bg-coffee-medium border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-coffee-dark focus:bg-coffee-medium active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('dashboard') }}">
        {{ __('Вернуться к моим заявкам') }}
      </a>
      <div class='cards flex flex-wrap gap-4'>
        @foreach($reports as $report)
        <div class='block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700'>
          <p class="text-xl text-black font-semibold">{{$report->user->fullName()}}</p>
          <p class="text-sm text-gray-500">{{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y')}}</p>
          <span class='text-coffee-dark text-xl font-semibold	'>{{$report->title}}</span>
          <p class='text-black'>{{$report->description}}</p>
          @isset($report->path_img)
          <img src="/images/{{$report->path_img}}" alt="" class='rounded-lg mt-2'>
          @endisset
          @if($report->status=="Новая")
          <form id="form-update-{{$report->id}}" action="{{route('reports.update')}}" method="POST">
            <div>
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{$report->id}}">
              <select name="status" onchange="document.getElementById('form-update-{{$report->id}}').submit()" class=" border-none rounded-xl bg-green-300 mt-3 font-medium">
                <option value='Новая'>Новая</option>
                <option value='Одобрена'>Одобрена</option>
                <option value='Отменена'>Отменена</option>
              </select>
            </div>
          </form>
          @else
          <p id="statusColor" class='statusColor font-medium text-white text-s bg-coffee-dark pt-2 pb-2 pl-5 pr-5 rounded-xl	mt-3 w-min border-none'>{{$report->status}}</p>
          @endif
        </div>
        @endforeach
      </div>
    </div>
```
- в модели User
```sh
  const ADMIN_ROLE='admin';

    public function isAdmin(){
        return $this->role===self::ADMIN_ROLE;
    }
```


### ReportController

```sh
class ReportController extends Controller
{
    public function index() {
        $problems = Problem::where('user_id', Auth::user()->id)->get();
        $userId = Auth::id();
        return view('reports.index', compact('problems', 'userId'));
    }

    public function welcome() {

        return view('welcome');
    }

    public function create() {
        $reports = Problem::all();
        return view('reports.create', compact('reports'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'path_img' => 'image|mimes:png,jpg,jpeg,gif|max:800',
        ]);

        $imageName = time() . '.' . $request['path_img']->extension();
        $request['path_img']->move(public_path('images'), $imageName);

        Problem::create([
            'title' => $request->title,
            'description' => $request->description,
            'path_img' => $imageName,
            "user_id" => Auth::user()->id,
            "status" => "Новая",
        ]);

        return redirect()->route('dashboard');
    }

    public function update(Request $request) {
        $request->validate([
            'status' => ['required'],
            'id' => ['required']
        ]);

        Problem::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
}
```

### Связи
```sh
public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
```
```sh
public function reports(): HasMany{
        return $this->hasMany(Report::class);
    }
```

### Страница с выводом

```sh
<x-app-layout>
  <div class="py-12">
    <div class=" max-w-7xl mx-auto px-6 lg:px-8">
      <a class="mb-4 inline-flex items-center px-4 py-2 bg-coffee-medium border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-coffee-dark focus:bg-coffee-dark active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('reports.create') }}">
        {{ __('СОЗДАТЬ ЗАЯВКУ') }}
      </a>
      @if((auth()->user()->isAdmin()===true))
      <a class="bg-coffee-medium mb-4 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-coffee-dark focus:bg-coffee-dark active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('admin.index') }}">
        {{ __('Перейти в панель администратора') }}
      </a>
      @endif
      <div class='cards flex flex-wrap gap-4'>
        @foreach($problems as $report)
        <div class='block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"'>
          <p class="text-sm text-gray-500">{{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y')}}</p>
          <span class='text-xl font-semibold	text-coffee-dark'>{{$report->title}}</span>
          <p class='text-black'>{{$report->description}}</p>
          @isset($report->path_img)
          <img src="/images/{{$report->path_img}}" alt="" class='rounded-lg mt-2'>
          @endisset
          <p id="statusColor" class='bg-coffee-dark text-white font-medium text-s bg-gray-300 pt-2 pb-2 pl-5 pr-5 rounded-xl	mt-3 w-min border-none'>{{$report->status}}</p>
        </div>
        @endforeach
      </div>

    </div>
    @if(count($problems)===0)
    <div class="flex place-content-center pt-48">
      <span class='font-semibold text-4xl uppercase tracking-widest text-gray-300'>Пока тут ничего нет</span>
    </div>
    @endif
  </div>
  </div>
</x-app-layout>
```

### Смена статуса c общей таблицы

```sh
@if($report->status=="Новая")
          <form id="form-update-{{$report->id}}" action="{{route('reports.update')}}" method="POST">
            <div>
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{$report->id}}">
              <select name="status" onchange="document.getElementById('form-update-{{$report->id}}').submit()" class=" border-none rounded-xl bg-green-300 mt-3 font-medium">
                <option value='Новая'>Новая</option>
                <option value='Одобрена'>Одобрена</option>
                <option value='Отменена'>Отменена</option>
              </select>
            </div>
          </form>
          @else
          <p id="statusColor" class='statusColor font-medium text-white text-s bg-coffee-dark pt-2 pb-2 pl-5 pr-5 rounded-xl	mt-3 w-min border-none'>{{$report->status}}</p>
@endif
```

```sh
public function update(Request $request) {
        $request->validate([
            'status' => ['required'],
            'id' => ['required']
        ]);

        Problem::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
```

### Смена статуса из отд таблицы

```sh

@if ($report->status_id == 1)
<form id="form-update-{{$report->id}}" action="{{route('report.update')}}" method="POST">
  @csrf
  @method('PATCH')
  <input type="hidden" name="id" value="{{$report->id}}">
  <select class="cursor-pointer hover:bg-slate-200" name="status_id" onchange="document.getElementById('form-update-{{$report->id}}').submit()">
    @foreach ($statuses as $status)
    <option value="{{$status->id}}">{{$status->name}}</option>
    @endforeach
  </select>
</form>
@else
<span class="font-bold statusText" id="statusText">{{ $report->status->name }}</span>
@endif

```

```sh
  public function update(Request $request)
    {
        $request->validate([
            'status_id' => ['required'],
            'id' => ['required']
        ]);

        Report::where('id', $request->id)->update([
            'status_id' => $request->status_id,
        ]);
        return redirect()->back();
    }

    public function show(Report $report)
    {
        $statuses = Status::all();
        return view('report.show', compact('report', 'statuses'));
    }
```
- В роуте

```sh
Route::patch('/update',[ReportController::class,'update'])->name('report.update');
```

### Картинка

```sh
    <div>
        <x-input-label for="path_img" :value="__('Время')" />
        <input type='file' id="path_img" class=" block mt-1" name="path_img" required />
        <x-input-error :messages="$errors->get('path_img')" class="mt-2" />
    </div>
```

```sh
        $imageName = time() . '.' . $request['path_img']->extension();
        $request['path_img']->move(public_path('images'), $imageName);
```

### Сообщения flash

```sh
        @session('info')
<div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
  <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Информационное сообщение.</span>
  <div class="ms-3 text-sm font-medium">
  {{ $value }}
  </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
  </button>
</div>
@endsession
```
в своем файле пишем @include('layouts.flash-messages')
и в репорт контроллере  return redirect()->route('dashboard')->with('info','Заявление отправлено');

### Фильтрация

```sh
class AdminController extends Controller
{
    public function index(Request $request){

        $selectedSectionId = $request->input('section_id');

        $query = Report::query();

        // Фильтрация по секции (применяем до получения отчетов)
        if ($selectedSectionId) {
            $query->where('section_id', $selectedSectionId);
        }

        $reports = $query->with(['user', 'section'])->get();

        $sections = Section::all();

        return view('admin.index', compact('reports', 'sections', 'selectedSectionId'));
    }
}
```

```sh
    <form method="GET" action="{{ route('admin.index') }}" class="mb-4"> 
        <label for="section_id" class="mr-2">Фильтр по секции:</label>
        <select name="section_id" id="section_id" onchange="this.form.submit()" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          <option value="">Все секции</option>
          @foreach ($sections as $section)
            <option value="{{ $section->id }}" {{ $selectedSectionId == $section->id ? 'selected' : '' }}> 
              {{ $section->name }}
            </option>
          @endforeach
        </select>
      </form>
```