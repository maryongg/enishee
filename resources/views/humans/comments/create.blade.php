<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('コメント作成') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-full">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form method="POST" action="{{ route('humans.comments.store', $human) }}">
            @csrf
            <div class="mb-4">
              <label for="comment" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">コメント(会話内容、お相手の印象など)

              </label>
              <input type="text" name="comment" id="comment" class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              <br><br>
              
              @error('comment')
              <span class="text-red-500 text-xs italic">{{ $message }}</span>
              @enderror
            </div>
            <a href="{{ route('login') }}" class="inline-block rounded-full bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-slate-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">
            コメントする</button>
          </form>
          <a href="{{ route('humans.show', $human) }}" class="text-blue-500 hover:text-blue-700 mr-2">プロフィール詳細に戻る</a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
