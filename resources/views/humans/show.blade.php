@include('layouts.header') 
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-md px-4 md:px-8">
    <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6">プロフィール詳細</h1>

    <div class="relative mb-6 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:mb-8">
      @if($human->img)
      <img src="{{ asset($human->img) }}" loading="lazy" alt="{{ $human->name ?? 'Human image' }}" class="h-full w-full object-cover object-center" />
                  @else
                    <img src="https://ogre.natalie.mu/artist/7146/20220228/nakayamakinnikun_art202202.jpg" loading="lazy" alt="Default human image" class="h-full w-full object-cover object-center" />
                  @endif
    </div>

    <!-- <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">About us</h2> -->
    <!-- <div class="lg:w-2/3 w-full mx-auto overflow-auto"> -->
      <table class="table-auto w-full text-left whitespace-no-wrap">

          
       
          <tr>
            <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">名前</th>
            <td class="px-4 py-3">{{ $human->name }}</td>
          </tr>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">年齢</th>
            <td class="px-4 py-3">{{ $human->age }}歳</td>
          </tr>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">職業</th>
            <td class="px-4 py-3">{{ $human->job }}</td>
          </tr>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">年収</th>
            <td class="px-4 py-3">{{ $human->income }}</td>
          </tr>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">出会った手段・場所</th>
            <td class="px-4 py-3">{{ $human->meet }}</td>
          </tr>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">デート費用</th>
            <td class="px-4 py-3">{{ $human->cost }}</td>
          </tr>
      </table>
      @if (auth()->id() == $human->user_id)
          <div class="flex mt-4 justify-center">
            <a href="{{ route('humans.edit', $human) }}" class=" inline-block rounded-lg bg-slate-500 px-8 py-3 mr-8 text-center text-sm font-semibold text-white outline-none ring-slate-300 transition duration-100 hover:bg-slate-600 focus-visible:ring active:bg-slate-700 md:text-base">
            <svg xmlns="http://www.w3.org/2000/svg" width="24 ml-12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-pen"><path d="M2 21a8 8 0 0 1 10.821-7.487"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="8" r="5"/></svg>
            プロフィール再編集
            </a>
            <form action="{{ route('humans.destroy', $human) }}" method="POST" onsubmit="return confirm('本当にお見切りしますか？');">
              @csrf
              @method('DELETE')
              <button type="submit" class="inline-block rounded-lg bg-red-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-red-300 transition duration-100 hover:bg-red-600 focus-visible:ring active:bg-slate-700 md:text-base">
              <svg xmlns="http://www.w3.org/2000/svg" width="24 ml-12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>  
              本当にお見切りする！</button>
            </form>
          </div>
          @endif

      <p class="text-center mt-6 text-gray-500 sm:text-lg md:mt-8">投稿者: {{ $human->user->name }}</p>
      <p class="text-center text-gray-500 sm:text-lg">作成日: {{ $human->created_at->format('Y-m-d') }}</p>
      <p class="text-center text-gray-500 sm:text-lg">更新日: {{ $human->updated_at->format('Y-m-d') }}</p>

  </div>
  <div class="mt-4">
            <a href="{{ route('humans.comments.create', $human) }}" class="">コメントする</a>
            <p class="text-gray-600 dark:text-gray-400">コメント {{ $human->comments->count() }}件</p>
            
          </div>
          <div class="mt-4">
            @foreach ($human->comments as $comment)
            <a href="{{ route('humans.comments.show', [$human, $comment]) }}">
            <p>{{ $comment->comment }} <span class="text-gray-600 dark:text-gray-400 text-sm">{{ $comment->user->name }} {{ $comment->created_at->format('Y-m-d H:i') }}</span></p>
            </a>
            @endforeach
          </div>

</div>
@include('layouts.footer') 