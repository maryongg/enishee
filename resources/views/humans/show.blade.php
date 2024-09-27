@include('layouts.header') 
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-md px-4 md:px-8">
    <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6">プロフィール詳細</h1>

    <div class="relative mb-6 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:mb-8">
      @if($human->img)
                    <img src="{{ route('human.image', basename($human->img)) }}" alt="{{ $human->name }}" class="h-full w-full object-cover object-center">
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
          <div class="flex mt-4">
            <a href="{{ route('humans.edit', $human) }}" class=" m-auto inline-block rounded-lg bg-slate-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-slate-300 transition duration-100 hover:bg-slate-600 focus-visible:ring active:bg-slate-700 md:text-base">編集</a>
            <form action="{{ route('humans.destroy', $human) }}" method="POST" onsubmit="return confirm('本当にお見切りしますか？');">
              @csrf
              @method('DELETE')
              <button type="submit" class="inline-block rounded-lg bg-red-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-red-300 transition duration-100 hover:bg-red-600 focus-visible:ring active:bg-slate-700 md:text-base">本当にお見切りする！</button>
            </form>
          </div>
          @endif

      <p class="text-center mt-6 text-gray-500 sm:text-lg md:mt-8">投稿者: {{ $human->user->name }}</p>
      <p class="text-center text-gray-500 sm:text-lg">作成日: {{ $human->created_at->format('Y-m-d') }}</p>
      <p class="text-center text-gray-500 sm:text-lg">更新日: {{ $human->updated_at->format('Y-m-d') }}</p>

  </div>
  <div class="mt-4 text-center">
            <a href="{{ route('humans.comments.create', $human) }}" class="m-auto inline-block rounded-lg bg-slate-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-slate-300 transition duration-100 hover:bg-slate-600 focus-visible:ring active:bg-slate-700 md:text-base">コメントする</a>
            <p class="mt-4 text-gray-600 dark:text-gray-400">コメント {{ $human->comments->count() }}件</p>
            
          </div>
          <div class="mt-4 text-center">
            @foreach ($human->comments as $comment)
            <a href="{{ route('humans.comments.show', [$human, $comment]) }}">
            <p>{{ $comment->comment }} <span class="text-gray-600 dark:text-gray-400 text-sm">{{ $comment->user->name }} {{ $comment->created_at->format('Y-m-d H:i') }}</span></p>
            </a>
            @endforeach
          </div>

</div>
@include('layouts.footer') 