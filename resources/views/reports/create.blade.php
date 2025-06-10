<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl text-coffee-dark font-bold py-5">{{ __('Новая заявка')}}</h2>
    </x-slot>
    
    <form class="mx-auto max-w-7xl p-4 md:p-5 space-y-4 flex flex-col gap-5" method="POST" action="{{route('reports.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-5">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="title" :value="__('Название')"/>
                <x-text-input id="title" class="bg-coffee-cream block py-2.5 px-0 w-full text-sm ps-3 text-coffee-medium bg-transparent border-0 border-b-2 border-coffee-dark appearance-none dark:text-white dark:border-gray-600 -blue-500 focus:outline-none focus:ring-0  peer" type="text" name="title" required/>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="description" :value="__('Описание')"/>
                <x-text-input id="description" class="bg-coffee-cream block py-2.5 px-0 w-full text-sm ps-3 text-coffee-medium bg-transparent border-0 border-b-2 border-coffee-dark appearance-none dark:text-white dark:border-gray-600  focus:outline-none focus:ring-0  peer" name="description" required/>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label  for="path_img" :value="__('Время')"/>
                <input type='file' id="path_img" class=" block mt-1" name="path_img" required/>
                <x-input-error :messages="$errors->get('path_img')" class="mt-2" />
            </div>
            
            <div>
                <x-primary-button class="">
                    {{__('Создать')}}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>