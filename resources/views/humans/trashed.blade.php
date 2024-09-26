@include('layouts.header')  
 <!-- text - start -->
 <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">お見切り一覧</h2>
      
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">お見切り済み</p>
          </div>
          <!-- text - end -->
      
          <div class="grid grid-cols-2 gap-x-4 gap-y-8 md:grid-cols-4 lg:gap-x-8 lg:gap-y-12">
            <!-- person - start -->
            @foreach ($trashedHumans as $human)
        
            <div class="flex flex-col items-center">
              <div class="mb-2 h-24 w-24 overflow-hidden rounded-full bg-gray-100 shadow-lg md:mb-4 md:h-32 md:w-32">
                @if($human->img)
                    <img src="{{ asset($human->img) }}" loading="lazy" alt="{{ $human->name ?? 'Human image' }}" class="h-full w-full object-cover object-center" />
                  @else
                    <img src="https://ogre.natalie.mu/artist/7146/20220228/nakayamakinnikun_art202202.jpg" loading="lazy" alt="Default human image" class="h-full w-full object-cover object-center" />
                  @endif
              </div>
      
              <div>
                <div class="text-center font-bold text-indigo-500 md:text-lg">{{ $human->name }}</div>
                <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">{{ $human->age }}歳</p>
                <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">お見切り日{{ $human->deleted_at->format('Y-m-d H:i:s') }}</p>
                <form action="{{ route('humans.restore', $human->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">復活！</button>
                        </form>

              </div>
            </div>
            @endforeach
            <!-- person - end -->
      

          </div>
        </div>
      </div>
@include('layouts.footer')  