
@include('layouts.header')
<div class="bg-white">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16 center ">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">お相手編集</h2>

      <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">出会ったお相手を編集して整理しましょう！</p>
    </div>
    <!-- text - end -->

    <!-- form - start -->
    <form method="POST" action="{{ route('humans.update', $human) }}" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="sm:col-span-2 text-center">
        <label for="img" class="mb-2 inline-block text-sm text-gray-800 sm:text-base rounded-full">現在の画像</label>
        @if($human->img)
        <div class="mb-2 ">
            <img src="{{ asset($human->img) }}" alt="現在の画像" class="max-w-xs h-auto m-auto mb-6 overflow-hidden rounded-lg md:mb-8">
          
        </div>
        @endif
    
    <input type="file" name="img" id="img" class="w-full rounded-full border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
    <p class="mt-1 text-sm text-gray-500">新しい画像をアップロードする場合は選択してください。</p>


      </div>

      <div class="sm:col-span-2 text-center">
      <label id="name" for="name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">名前</label>
        <input type="text" name="name" value="{{ $human->name }}" class="w-full rounded-full border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
      </div>

     
      <div class="sm:col-span-2 text-center">
      <label for="age" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">年齢</label>
        <input name="age" value="{{ $human->age }}"class="w-full rounded-full border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
      </div>

      <div class="sm:col-span-2 text-center">
      <label for="job" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">職業</label>
        <input name="job" value="{{ $human->job }}"class="w-full rounded-full border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
      </div>

      <div class="sm:col-span-2 text-center">
      <label for="income" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">年収</label>
        <input name="income" value="{{ $human->income }}"class="w-full rounded-full border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
      </div>

      <div class="sm:col-span-2 text-center">
      <label for="meet" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">出会った手段・場所</label>
        <input name="meet" value="{{ $human->meet }}"class="w-full rounded-full border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
      </div>

      <div class="sm:col-span-2 text-center">
      <label for="cost" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">デート費用</label>
        <input name="cost" value="{{ $human->cost }}"class="w-full rounded-full border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
      </div>

      <div class="flex items-center justify-between sm:col-span-2">
      <button class="inline-block m-auto mt-6 rounded-full  bg-slate-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-slate-300 transition duration-100 hover:bg-slate-600 focus-visible:ring active:bg-slate-700 md:text-base">更新！</button>
      
      
      </div>

    </form>
    <p class="text-xs text-center mt-5 text-gray-400">enishee以外では個人情報は扱わないよ！</p>
    <!-- form - end -->
  </div>
</div>

@include('layouts.footer') 