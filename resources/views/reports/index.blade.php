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