<div class="mb-5">
    <p class="mb-5 text-[#7d7d7d] text-[14px]">{{ $post->category->name }}/ {{$post->realEstateType->name. ' '. $post->province->name }} <span class="text-[#2c2c2c]">/Nhà đất {{ $post->district->name }}</span> </p>
    <hr class="" style="height: 2px;">
    <div class="flex items-center gap-8 py-5 text-[14px]">
        <div class="flex flex-col ">
            <p style="color: #868686;">Ngày đăng</p>
            <p style="color: #2c2c2c;">{{ $post->getDate() }}</p>
        </div>
        <div class="flex flex-col ">
            <p style="color: #868686;">Ngày hết hạn</p>
            <p style="color: #2c2c2c;">cooming soon...</p>
        </div>
        <div class="flex flex-col ">
            <p style="color: #868686;">Loại tin</p>
            <p style="color: #2c2c2c;">{{ ($post->type == 1 ) ? 'Tin VIP' : 'Tin thường' }}</p>
        </div>
        <div class="flex flex-col ">
            <p style="color: #868686;">Mã tin</p>
            <p style="color: #2c2c2c;">{{ $post->id }}</p>
        </div>
    </div>
    <hr style="height: 2px;">
    <h1 class="mt-8 font-bold mb-4 text-[25px] text-[#2c2c2c]">{{ $post['title'] }}</h1>
    <p class=""> {{ $post->realEstateType->name }} - {{ $post->district->name }}</p>
</div>