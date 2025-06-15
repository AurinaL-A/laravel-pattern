<x-app-layout>
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
</x-app-layout>

