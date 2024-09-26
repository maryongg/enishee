@include('layouts.header')  
 <!-- text - start -->
 <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">進行中一覧</h2>
      
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">お見切りチャーンス！</p>
          </div>
          <!-- text - end -->
      
          <div class="grid grid-cols-2 gap-x-4 gap-y-8 md:grid-cols-4 lg:gap-x-8 lg:gap-y-12">
            <!-- person - start -->
            @foreach ($humans as $human)
            <a href="{{ route('humans.show', $human) }}">
            <div class="flex flex-col items-center">
              <div class="mb-2 h-24 w-24 overflow-hidden rounded-full bg-gray-100 shadow-lg md:mb-4 md:h-32 md:w-32">
                <img src="https://images.unsplash.com/photo-1567515004624-219c11d31f2e??auto=format&q=75&fit=crop&w=256" loading="lazy" alt="Photo by Radu Florin" class="h-full w-full object-cover object-center" />
              </div>
      
              <div>
                <div class="text-center font-bold text-indigo-500 md:text-lg">{{ $human->name }}</div>
                <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">{{ $human->age }}</p>
      

              </div>
            </div>
            </a>
            @endforeach
            <!-- person - end -->
      

          </div>
        </div>
      </div>
@include('layouts.footer')  