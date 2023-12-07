@foreach ($posts as $post)
    <div class="flex flex-col shadow">
        <div class="">
            <div class="flex w-full rounded-t h-[300px] sm:h-[450px]">
                <div class="relative w-2/3 h-full">
                    <img class="h-[300px] sm:h-[450px] w-full object-cover border" src="{{ (!empty($post->getAvatar(0))) ? asset('uploads/'.$post->getAvatar(0)) : asset('dist/images/preview-1.jpg')}}" alt="">
                    <span class="absolute" style="top: 5%; left: -1%;">
                        <svg class="relative" width="125" height="32" viewBox="0 0 125 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 0C2.23858 0 0 2.23858 0 5V20C0 21.1275 0.373217 22.1679 1.00285 23.0043L7 32V25H120C122.761 25 125 22.7614 125 20V5C125 2.23858 122.761 0 120 0H5Z" fill="#DC2D27"/>
                            <text x="55%" y="45%" text-anchor="middle" alignment-baseline="middle" font-size="16" fill="white" style="text-transform: uppercase;">{{ $post->getVip() }}</text>
                        </svg>
                    </span>
                </div>
                <div class="w-full md:w-1/3 flex flex-col">
                    <img class="w-full h-1/2 md:w-auto object-cover border" src="{{ (!empty($post->getAvatar(1))) ? asset('uploads/'.$post->getAvatar(1)) : asset('dist/images/preview-1.jpg')}}" alt="">
                    <div class="flex h-1/2">
                        <img src="{{ (($post->getAvatar(2))) ? asset('uploads/'.$post->getAvatar(2)) : asset('dist/images/preview-1.jpg')}}" class="w-1/2 border object-cover" alt="">
                        <img src="{{ (($post->getAvatar(3))) ? asset('uploads/'.$post->getAvatar(3)) : asset('dist/images/preview-1.jpg')}}" class="w-1/2 border object-cover" alt="">
                    </div>
                </div>
            </div>
            {{-- Post info --}}
            <div class="p-4 text-black border">
                <a href="{{ route('posts.details', $post['title']) }}" href="javascript:void(0)" class="link-post-details">
                    <h1 class="title  uppercase text-base color-fiery-red font-bold text-[#DC2D27]">{{ $post['title'] }}</h1>
                    <div class="flex items-center my-5 gap-5 flex-wrap gap-10 justify-between lg:justify-start">
                        <p class="text-base  flex items-center text-[#DC2D27] font-bold" style="">
                            <span class="pr-1">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.99999 3.64C5.52488 3.64 3.98293 3.64 2.69032 3.87101C2.07073 3.98175 1.58263 4.4549 1.4496 5.07009C1.23999 6.03945 1.23999 6.94366 1.23999 8.32C1.23999 9.69634 1.23999 10.6005 1.4496 11.5699C1.58263 12.1851 2.07073 12.6583 2.69032 12.769C3.98293 13 5.52488 13 6.99999 13C8.4751 13 10.0171 13 11.3097 12.769C11.9293 12.6583 12.4174 12.1851 12.5504 11.5699C12.76 10.6005 12.76 9.69634 12.76 8.32C12.76 6.94366 12.76 6.03945 12.5504 5.07009C12.4174 4.4549 11.9293 3.98175 11.3097 3.87101C10.0171 3.64 8.4751 3.64 6.99999 3.64Z" stroke="#333333" stroke-width="1.5"/>
                                    <path d="M4.59998 3.4V3C4.59998 1.89543 5.49541 1 6.59998 1H7.39998C8.50455 1 9.39998 1.89543 9.39998 3V3.4" stroke="#333333" stroke-width="1.5"/>
                                    <path d="M8.31279 6.88864C8.31279 6.88864 7.81924 6.33847 7.01874 6.40722C6.21824 6.47598 5.83237 6.96778 5.83237 7.46094C5.83237 8.89928 8.31279 7.90249 8.31279 9.37747C8.31279 10.1379 6.66743 10.6746 5.68713 9.78004" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.11682 5.44L7.11682 6.40127" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M7.11682 10.2387L7.11682 11.2" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            {{ $post['crency_format'] }}
                        </p>
                        <p class="text-base  flex items-center text-[#DC2D27] font-bold" style="">
                            <span class="pr-1">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.53082 5.49999L12.9353 1.0955" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1.05948 12.9714L5.46912 8.56175" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1.06116 8.9091C0.900201 10.5297 0.900109 11.4198 1.06116 12.9697C2.611 13.1307 3.50112 13.1306 5.12174 12.9697" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.9388 5.15262C13.0998 3.532 13.0999 2.64188 12.9388 1.09204C11.389 0.930989 10.4989 0.931081 8.87826 1.09204" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            {{ round($post['area']) }} m&#178;
                        </p>
                        <p class="text-base flex items-center" >
                            <span class="pr-1">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.02259 12.8108C4.29799 12.9789 5.6299 13.1924 6.99992 13.1924C8.36994 13.1924 9.70184 12.9789 10.9772 12.8108C11.4843 12.7439 11.8702 12.3146 11.8702 11.8032V2.19678C11.8702 1.68533 11.4843 1.25607 10.9772 1.18921C9.70184 1.02104 8.36994 0.807556 6.99992 0.807556C5.6299 0.807556 4.298 1.02104 3.02259 1.18921C2.51554 1.25607 2.12964 1.68533 2.12964 2.19678V11.8032C2.12964 12.3146 2.51554 12.7439 3.02259 12.8108Z" fill="white" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                                    <path d="M3.58814 12.8869C3.39853 12.8611 3.21007 12.8355 3.02283 12.8108C2.51578 12.7439 2.12988 12.3147 2.12988 11.8032V6.20193H11.8704V11.8032C11.8704 12.3147 11.4845 12.7439 10.9775 12.8108C10.7902 12.8355 10.6018 12.8611 10.4122 12.887C9.31019 13.037 8.16905 13.1924 7.00016 13.1924C5.83127 13.1924 4.69012 13.037 3.58814 12.8869Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.95948 2.98653C5.01854 3.46303 5.4209 3.83378 5.89937 3.87385C6.25594 3.90371 6.62207 3.9294 6.99538 3.9294C7.3687 3.9294 7.73483 3.90371 8.0914 3.87385C8.56987 3.83378 8.97222 3.46303 9.03129 2.98653C9.0564 2.78403 9.07451 2.57776 9.07451 2.36848C9.07451 2.1592 9.0564 1.95293 9.03129 1.75043C8.97222 1.27393 8.56987 0.903178 8.0914 0.863107C7.73483 0.833246 7.3687 0.807556 6.99538 0.807556C6.62207 0.807556 6.25594 0.833246 5.89937 0.863107C5.4209 0.903178 5.01854 1.27393 4.95948 1.75043C4.93437 1.95293 4.91626 2.1592 4.91626 2.36848C4.91626 2.57776 4.93437 2.78403 4.95948 2.98653Z" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            {{ $post['bedroom'] }}
                        </p>
                        <p class="text-base flex items-center" >
                            <span class="pr-1">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.75 5.25L7.75 5.25" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1.25 1.75C1.25 1.19772 1.69772 0.75 2.25 0.75H4.00642C4.44781 0.75 4.83976 1.03978 4.95499 1.46586C5.65486 4.0536 5.55571 5.51917 4.75 7.75H1.25V1.75Z" fill="white" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                                    <path d="M2.25 7.75V13.25H7.25C7.10041 12.5903 7.01902 12.0119 7.01531 11.4654C7.47437 11.649 7.97539 11.75 8.5 11.75C10.3675 11.75 11.9361 10.4702 12.3766 8.73988C12.5128 8.20467 12.0523 7.75 11.5 7.75H2.25Z" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            {{ $post['toilet'] }}
                        </p>
                        <p class="text-base flex items-center">
                            <span class="pr-1">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.2481 12.0367C2.282 12.5182 2.6607 12.9034 3.14169 12.9437C5.78943 13.1657 8.21057 13.1657 10.8583 12.9437C11.3393 12.9034 11.718 12.5182 11.7519 12.0367C11.9577 9.11339 11.9577 6.35152 11.7519 3.42818C11.718 2.94669 11.3394 2.56268 10.8603 2.50382C9.62298 2.35181 8.33015 2.15625 7 2.15625C5.66985 2.15625 4.37702 2.35181 3.13967 2.50382C2.66059 2.56268 2.28199 2.94669 2.2481 3.42818C2.0423 6.35152 2.0423 9.11338 2.2481 12.0367Z" fill="white"/>
                                    <path d="M2.2481 12.0367C2.282 12.5182 2.6607 12.9034 3.14169 12.9437C5.78943 13.1657 8.21057 13.1657 10.8583 12.9437C11.3393 12.9034 11.718 12.5182 11.7519 12.0367C11.9577 9.11339 11.9577 6.35152 11.7519 3.42818C11.718 2.94669 11.3394 2.56268 10.8603 2.50382C9.62298 2.35181 8.33015 2.15625 7 2.15625C5.66985 2.15625 4.37702 2.35181 3.13967 2.50382C2.66059 2.56268 2.28199 2.94669 2.2481 3.42818C2.0423 6.35152 2.0423 9.11338 2.2481 12.0367Z" stroke="#333333" stroke-width="1.5"/>
                                    <path d="M5.09375 6.51562H8.90625" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M5.09375 9.42188H7.3944" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                                    <rect x="4.17188" y="0.75" width="5.65625" height="2.96875" rx="1.48438" fill="#D7E0FF" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            {{ $post['legal_documents'] }}
                        </p>
                        <p class="hidden text-base sm:flex items-center" >
                            <span class="pr-1">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.99992 11.2379C9.34047 11.2379 11.2379 9.34055 11.2379 6.99999C11.2379 4.65944 9.34047 2.76204 6.99992 2.76204C4.65936 2.76204 2.76196 4.65944 2.76196 6.99999C2.76196 9.34055 4.65936 11.2379 6.99992 11.2379Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7 2.76204V0.87851" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7 13.1215V11.238" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.238 7H13.1216" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M0.878418 7H2.76195" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            Cách bạn:<span class="text-[#DC2D27]">comming soon...</span>
                        </p>
                    </div>
                    <p class="text-[14px] overflow-hidden line-clamp-2">{{ $post['description'] }}</p>
                </a>
            </div>
            {{-- Author info --}}
            <div class="grid grid-cols-3 sm:flex items-center gap-2 sm:justify-between rounded-b border mt-[-1px] p-4">
                <a href="{{ route('posts.posts-by-user', $post->user['id']) }}" class="col-span-2 flex items-center">
                    <div class="col-span-2 flex items-center jusstify-between ">
                        <div class="h-10 w-10">
                            <img src="{{ ($post->user['avatar']) ? asset('uploads/'.$post->user['avatar']) : asset('dist/images/preview-1.jpg') }}" class="w-full h-full rounded-full object-cover" alt="">
                        </div>
                        <div class="flex flex-col text-base ml-3">
                            <h1 class="text-black font-bold">{{ $post->user['name'] }}</h1>
                            <p style="color: #9C9C9C;">Đăng {{ $post->dateDifference() }}</p>
                        </div>
                    </div>
                </a>

                <div class="col-span-3 flex items-center justify-between gap-3">
                    <button type="button" data-url = "{{ route('show-phone-number') }}" data-post-id = "{{ $post->id }}"
                    class="show-phone-number flex items-center justify-center gap-3 text-base px-5 py-2.5 border border-[#00C1C1] w-full sm:w-auto text-white text-base text-bold rounded-lg bg-[#00C1C1] hover:bg-[#00e0e0]">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.4999 6.5C15.2371 6.64382 15.9689 6.96892 16.4999 7.5C17.031 8.03108 17.3561 8.76284 17.4999 9.5M14.9999 3C16.5315 3.17014 17.9096 3.91107 18.9999 5C20.0902 6.08893 20.8279 7.46869 20.9999 9M20.9994 16.4767V19.1864C21.0036 20.2223 20.0722 21.0873 19.0264 20.9929C10 21 3 13.935 3.00706 4.96919C2.91287 3.92895 3.77358 3.00106 4.80811 3.00009H7.52325C7.96247 2.99577 8.38828 3.151 8.72131 3.43684C9.66813 4.24949 10.2771 7.00777 10.0428 8.10428C9.85987 8.96036 8.9969 9.55929 8.41019 10.1448C9.69858 12.4062 11.5746 14.2785 13.8405 15.5644C14.4272 14.9788 15.0273 14.1176 15.8851 13.935C16.9855 13.7008 19.7615 14.3106 20.5709 15.264C20.8579 15.6021 21.0104 16.0337 20.9994 16.4767Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="masked-phone-number-{{ $post->id }}">{{ $post->user->getHideLast3DigitsPhoneNumberAttribute()}}</span>
                        Hiện số
                    </button>
                    <button type="button" data-url="{{ route('posts.add-to-favorite') }}"  data-post-id="{{ $post->id }}"
                    class="add-to-favorite flex items-center rounded-lg border p-2.5 hover:bg-red-300" >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.3314 12.0474L12 20L19.6686 12.0474C20.5211 11.1633 21 9.96429 21 8.71405C21 6.11055 18.9648 4 16.4543 4C15.2487 4 14.0925 4.49666 13.24 5.38071L12 6.66667L10.76 5.38071C9.90749 4.49666 8.75128 4 7.54569 4C5.03517 4 3 6.11055 3 8.71405C3 9.96429 3.47892 11.1633 4.3314 12.0474Z" stroke="#001A72" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <div class="flex justify-center items-center">
        {{ $posts->links() }}
    </div>