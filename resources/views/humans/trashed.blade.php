@include('layouts.header')  
 <!-- text - start -->
 <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">お見切り一覧</h2>
      
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">お見切り済みの方々</p>
          </div>
          <!-- text - end -->
      
          <div class="grid grid-cols-2 gap-x-4 gap-y-8 md:grid-cols-4 lg:gap-x-8 lg:gap-y-12">
            <!-- person - start -->
            @foreach ($trashedHumans as $human)
        
            <div class="flex flex-col items-center">
              <div class="mb-2 h-40 w-40 overflow-hidden rounded-full bg-gray-100 shadow-lg md:mb-4 md:h-32 md:w-32">
                @if($human->img)
                    <img src="{{ asset($human->img) }}" loading="lazy" alt="{{ $human->name ?? 'Human image' }}" class="h-full w-full object-cover object-center" />
                  @else
                    <img src="https://ogre.natalie.mu/artist/7146/20220228/nakayamakinnikun_art202202.jpg" loading="lazy" alt="Default human image" class="h-full w-full object-cover object-center" />
                  @endif
              </div>
      
              <div>
                <div class="text-center font-bold text-indigo-500 md:text-lg h-6">
                  {{ $human->name ?: '名無しさん' }}
                </div>
                <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">{{ $human->age }}歳</p>
                <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">お見切り日時<br>{{ $human->deleted_at->format('Y-m-d H:i') }}</p>
                <form action="{{ route('humans.restore', $human->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-block gap-1 rounded-lg bg-red-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-red-300 transition duration-100 hover:bg-red-600 focus-visible:ring active:bg-slate-700 md:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-skull"><path d="m12.5 17-.5-1-.5 1h1z"/><path d="M15 22a1 1 0 0 0 1-1v-1a2 2 0 0 0 1.56-3.25 8 8 0 1 0-11.12 0A2 2 0 0 0 8 20v1a1 1 0 0 0 1 1z"/><circle cx="15" cy="12" r="1"/><circle cx="9" cy="12" r="1"/></svg>  
                            復活！</button>
                        </form>

              </div>
            </div>
            @endforeach
            <!-- person - end -->
      

          </div>
        </div>
      </div>
@include('layouts.footer')  