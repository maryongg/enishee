@include('layouts.header')            

         
          <section class="gap-6 sm:gap-10 md:gap-16 lg:flex-row">
                 <!-- image - start -->
                 <div class="overflow-hidden rounded-lg">
                 <img src="{{ asset('images/enishee_black_logo.png') }}" alt="enishee" class="h-full w-full object-cover object-center" >   
                  </div>
                  <!-- image - end -->
            <!-- content - start -->
            <div class="text-center">
      
              <!-- <h1 class="mb-8 text-4xl font-bold text-black sm:text-5xl md:mb-12 md:text-6xl">良縁祈願！</h1> -->
      
              <p class="mb-8 leading-relaxed text-gray-500 md:mb-12 xl:text-lg">婚活で出会ったお相手を管理・整理できるお助けアプリです。</p>
      
              <div class="flex flex-col gap-2.5 sm:flex-row sm:justify-center lg:justify-start">
              @if (Route::has('login'))
              @auth
              <a href="{{ url('/dashboard') }}" class="inline-block m-auto rounded-lg bg-slate-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-slate-300 transition duration-100 hover:bg-slate-600 focus-visible:ring active:bg-slate-700 md:text-base">ダッシュボード</a>
              @else
                <a href="{{ route('login') }}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-slate-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">ログイン</a>

                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-slate-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">新規登録</a>
                                        
                                    @endif
                                @endauth
                            </nav>
                        @endif  
            </div>
            </div>
            <!-- content - end -->
      
       
          </section>
          @include('layouts.footer')