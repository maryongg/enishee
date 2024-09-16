@include('layouts.header')            

         
          <section class="flex flex-col justify-between gap-6 sm:gap-10 md:gap-16 lg:flex-row">
                 <!-- image - start -->
                 <div class="h-48 overflow-hidden rounded-lg bg-gray-100 shadow-lg lg:h-auto xl:w-5/12">
                    <img src="https://images.unsplash.com/photo-1618004912476-29818d81ae2e?auto=format&q=75&fit=crop&w=1000" loading="lazy" alt="Photo by Fakurian Design" class="h-full w-full object-cover object-center" />
                  </div>
                  <!-- image - end -->
            <!-- content - start -->
            <div class="flex flex-col justify-center sm:text-center lg:py-12 lg:text-left xl:w-5/12 xl:py-24">
      
              <h1 class="mb-8 text-4xl font-bold text-black sm:text-5xl md:mb-12 md:text-6xl">Enishee</h1>
      
              <p class="mb-8 leading-relaxed text-gray-500 md:mb-12 lg:w-4/5 xl:text-lg">婚活で出会ったお相手を管理・整理できるお助けアプリです。</p>
      
              <div class="flex flex-col gap-2.5 sm:flex-row sm:justify-center lg:justify-start">
              @if (Route::has('login'))
              @auth
              <a href="{{ url('/dashboard') }}" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">ダッシュボード</a>
              @else
                <a href="{{ route('login') }}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">ログイン</a>

                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">新規登録</a>
                                        
                                    @endif
                                @endauth
                            </nav>
                        @endif  
            </div>
            </div>
            <!-- content - end -->
      
       
          </section>
          @include('layouts.footer')