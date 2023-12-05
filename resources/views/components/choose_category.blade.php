<div class="col-span-3 flex justify-between items-center w-full bg-white shadow rounded-lg">
    @forelse ($categories as $category)
        <button type="button" data-id="{{ $category->id }}"  
        class="button-choose-category text-black w-full whitespace-nowrap hover:text-white hover:bg-red-500 focus:font-bold focus:outline-none focus:bg-red-500 focus:text-white font-bold text-xl py-3 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
            {{ $category->name }}
        </button>   
    @empty
        <div class="text-base text-red-500 w-full text-center">Trống</div>
    @endforelse    
</div>