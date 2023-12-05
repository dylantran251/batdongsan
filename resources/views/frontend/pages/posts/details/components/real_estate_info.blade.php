<div class="mb-20">
    <h1 class="my-8 font-bold text-[18px] text-[#2c2c2c]">Thông tin mô tả</h1>
    <div>
        <p class="text-14px text-[#2c2c2c]">{!! $post['description'] !!}</p>
        <p class="mt-4">Liên hệ tư vấn và xem thực tế: 
            <span class="p-3 rounded bg-[#d9d9d9]">
                <span class="masked-phone-number">
                    {{ $post->user->getHideLast3DigitsPhoneNumberAttribute() }}
                </span>
                <button type="button" class="text-sm text-white fomt-bold rounded p-1 ml-1 bg-[#DC2D27]">Hiện số</button>
            </span>
        </p>
    </div>
</div>
<div class="mb-16">
    <h1 class="mb-5 font-bold text-[18px] text-[#2c2c2c]">Đặc điểm bất động sản</h1>
    <div class="grid grid-cols-1 gap-0 sm:grid-cols-2 sm:gap-10 text-base text-[#2c2c2c]">
        <div class="col-span-1 flex flex-col ">
            <hr>
            <div class="grid grid-cols-2 item-center p-3">
                <div class="col-span-1 flex items-center text-base font-bold">
                    <span class="mr-5">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53106 5.49994L12.9355 1.09546" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.05911 12.9714L5.46875 8.56177" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.06152 8.90906C0.900567 10.5297 0.900475 11.4198 1.06152 12.9696C2.61137 13.1307 3.50149 13.1306 5.1221 12.9696" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.9385 5.15259C13.0994 3.53197 13.0995 2.64185 12.9385 1.09201C11.3886 0.930959 10.4985 0.93105 8.8779 1.09201" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                                    
                    </span>
                    Diện tích
                </div>
                <div class="col-span-1 text-center">
                    {{ $post->formatArea() }} m&#178;
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-2 item-center p-3">
                <div class="col-span-1 flex items-center text-base font-bold">
                    <span class="mr-5">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 6.5885C3 5.52763 3.42143 4.51022 4.17157 3.76007C4.92172 3.00993 5.93913 2.5885 7 2.5885C8.06087 2.5885 9.07828 3.00993 9.82843 3.76007C10.5786 4.51022 11 5.52763 11 6.5885H3Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 9.0885V10.0885" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.5 12.0885V13.0885" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 12.0885V13.0885" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 12.0885V13.0885" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 9.0885V10.0885" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 2.58851L7 0.911621" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                                                                     
                    </span>
                    Số tầng
                </div>
                <div class="col-span-1 text-center">
                    {{ $post['floors'] }} tầng
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-2 item-center p-3">
                <div class="col-span-1 flex items-center text-base font-bold whitespace-nowrap">
                    <span class="mr-5">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.90475 4.50004C1.21324 6.22881 1.21909 11.0085 1.34103 13.3495C1.36775 13.8625 1.79599 14.25 2.30974 14.25H8.49971C9.01346 14.25 9.4417 13.8625 9.46842 13.3495C9.59036 11.0085 9.59621 6.22881 8.9047 4.50004C8.49695 3.95637 7.49068 2.83633 6.2655 2.00768C5.74405 1.65499 5.06539 1.65499 4.54395 2.00768C3.31877 2.83633 2.31249 3.95637 1.90475 4.50004Z" fill="white" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.4029 7.25H11.6614C12.4571 7.25 13.1416 7.63817 13.2894 8.41997C13.5161 9.61939 13.6637 11.6539 13.404 14.25H8.49902C9.01277 14.25 9.44101 13.8625 9.46773 13.3495C9.54637 11.8398 9.57673 9.31582 9.4029 7.25Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.9043 9H5.9043" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.4043 14.2527V12" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.9043 6H5.9043" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                                                                            
                    </span>
                    Phòng vệ sinh
                </div>
                <div class="col-span-1 text-center">
                    {{ $post['toilet'] }} phòng
                </div>
            </div>
            <hr class="hidden sm:block">
        </div>
        <div class="col-span-1 flex flex-col ">
            <hr>
            <div class="grid grid-cols-2 item-center p-3">
                <div class="col-span-1 flex items-center text-base font-bold">
                    <span class="mr-5">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53106 5.49994L12.9355 1.09546" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.05911 12.9714L5.46875 8.56177" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.06152 8.90906C0.900567 10.5297 0.900475 11.4198 1.06152 12.9696C2.61137 13.1307 3.50149 13.1306 5.1221 12.9696" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.9385 5.15259C13.0994 3.53197 13.0995 2.64185 12.9385 1.09201C11.3886 0.930959 10.4985 0.93105 8.8779 1.09201" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                                    
                    </span>
                    Mức giá
                </div>
                <div class="col-span-1 text-center">
                    {{ $post->currency_format }}
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-2 item-center p-3">
                <div class="col-span-1 flex items-center text-base font-bold">
                    <span class="mr-5">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.2481 12.0367C2.282 12.5182 2.6607 12.9034 3.14169 12.9437C5.78943 13.1657 8.21057 13.1657 10.8583 12.9437C11.3393 12.9034 11.718 12.5182 11.7519 12.0367C11.9577 9.11339 11.9577 6.35152 11.7519 3.42818C11.718 2.94669 11.3394 2.56268 10.8603 2.50382C9.62298 2.35181 8.33015 2.15625 7 2.15625C5.66985 2.15625 4.37702 2.35181 3.13967 2.50382C2.66059 2.56268 2.28199 2.94669 2.2481 3.42818C2.0423 6.35152 2.0423 9.11338 2.2481 12.0367Z" fill="white"/>
                            <path d="M2.2481 12.0367C2.282 12.5182 2.6607 12.9034 3.14169 12.9437C5.78943 13.1657 8.21057 13.1657 10.8583 12.9437C11.3393 12.9034 11.718 12.5182 11.7519 12.0367C11.9577 9.11339 11.9577 6.35152 11.7519 3.42818C11.718 2.94669 11.3394 2.56268 10.8603 2.50382C9.62298 2.35181 8.33015 2.15625 7 2.15625C5.66985 2.15625 4.37702 2.35181 3.13967 2.50382C2.66059 2.56268 2.28199 2.94669 2.2481 3.42818C2.0423 6.35152 2.0423 9.11338 2.2481 12.0367Z" stroke="#333333" stroke-width="1.5"/>
                            <path d="M5.09375 6.51562H8.90625" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M5.09375 9.42188H7.3944" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                            <rect x="4.17188" y="0.75" width="5.65625" height="2.96875" rx="1.48438" fill="#D7E0FF" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>                                                                    
                    </span>
                    Phòng ngủ
                </div>
                <div class="col-span-1 text-center">
                    {{ $post['bedroom'] }} phòng
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-2 item-center p-3">
                <div class="col-span-1 flex items-center text-base font-bold">
                    <span class="mr-5">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.02283 12.8108C4.29824 12.979 5.63014 13.1925 7.00016 13.1925C8.37018 13.1925 9.70208 12.979 10.9775 12.8108C11.4845 12.744 11.8704 12.3147 11.8704 11.8033V2.19684C11.8704 1.68539 11.4845 1.25613 10.9775 1.18927C9.70208 1.02111 8.37018 0.807617 7.00016 0.807617C5.63014 0.807617 4.29824 1.02111 3.02283 1.18927C2.51578 1.25613 2.12988 1.68539 2.12988 2.19684V11.8033C2.12988 12.3147 2.51578 12.744 3.02283 12.8108Z" fill="white" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M3.58814 12.8869C3.39853 12.8611 3.21007 12.8354 3.02283 12.8107C2.51578 12.7439 2.12988 12.3146 2.12988 11.8032V6.2019H11.8704V11.8032C11.8704 12.3146 11.4845 12.7439 10.9775 12.8107C10.7902 12.8354 10.6018 12.8611 10.4122 12.8869C9.31019 13.037 8.16905 13.1924 7.00016 13.1924C5.83127 13.1924 4.69012 13.037 3.58814 12.8869Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.95923 2.98659C5.0183 3.46309 5.42066 3.83384 5.89913 3.87391C6.25569 3.90378 6.62183 3.92946 6.99514 3.92946C7.36845 3.92946 7.73459 3.90378 8.09115 3.87391C8.56962 3.83384 8.97198 3.46309 9.03105 2.98659C9.05615 2.78409 9.07426 2.57782 9.07426 2.36854C9.07426 2.15926 9.05615 1.95299 9.03105 1.75049C8.97198 1.27399 8.56962 0.903239 8.09115 0.863168C7.73459 0.833307 7.36845 0.807617 6.99514 0.807617C6.62183 0.807617 6.25569 0.833307 5.89913 0.863168C5.42066 0.903239 5.0183 1.27399 4.95923 1.75049C4.93413 1.95299 4.91602 2.15926 4.91602 2.36854C4.91602 2.57782 4.93413 2.78409 4.95923 2.98659Z" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                                                                                                       
                    </span>
                    Pháp lý
                </div>
                <div class="col-span-1 whitespace-nowrap text-center">
                    {{ $post['legal_documents'] }}
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>