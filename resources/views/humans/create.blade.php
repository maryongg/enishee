
@include('layouts.header')
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">お相手登録</h2>

      <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">出会ったお相手をいったん登録して整理しましょう！</p>
    </div>
    <!-- text - end -->

    <!-- form - start -->
    <form method="POST" action="{{ route('humans.store') }}" class="mx-auto grid max-w-screen-md gap-4" enctype="multipart/form-data">
    @csrf

    <div class="sm:col-span-2 text-center">
        <label for="img" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">写真</label>
        <input type="file" name="img" class=" w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-slate-300 transition duration-100 focus:ring"></input>
      </div>

    <div class="sm:col-span-2 text-center">
        <label id="name" for="name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">名前</label>
        <input type="text" name="name" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-slate-300 transition duration-100 focus:ring" />
      </div>

     
      <div class="sm:col-span-2 text-center">
        <label for="age" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">年齢</label>
        <input name="age" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-slate-300 transition duration-100 focus:ring" />
      </div>

      <div class="sm:col-span-2 text-center">
        <label for="job" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">職業</label>
        <input name="job" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-slate-300 transition duration-100 focus:ring" />
      </div>

      <div class="sm:col-span-2 text-center">
        <label for="income" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">年収</label>
        <input name="income" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-slate-300 transition duration-100 focus:ring" />
      </div>

      <div class="sm:col-span-2 text-center">
        <label for="meet" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">出会った手段・場所</label>
        <input name="meet" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-slate-300 transition duration-100 focus:ring">
      </div>

      <div class="sm:col-span-2 text-center">
        <label for="cost" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">デート費用</label>
        <input name="cost" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-slate-300 transition duration-100 focus:ring">
      </div>

      <div class="flex items-center justify-between sm:col-span-2">
        <button class="inline-block m-auto mt-6 rounded-lg bg-slate-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-slate-300 transition duration-100 hover:bg-slate-600 focus-visible:ring active:bg-slate-700 md:text-base">登録！</button>
      </div>
    </form>
    <p class="text-xs text-center mt-5 text-gray-400">enishee以外では個人情報は扱わないよ！</p>
    <!-- form - end -->
  </div>
</div>

@include('layouts.footer') 