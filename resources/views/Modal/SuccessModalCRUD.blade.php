<div>
    <div id="MainModal" class="transition-all duration-150 ease-in-out absolute top-0 right-0 left-0 bottom-0 bg-black z-50 bg-opacity-40 flex flex-col justify-center items-center">
        <div class="w-1/4 py-[30px] bg-white rounded-md flex flex-col justify-center items-center">
            <div class="w-full h-fit flex flex-col items-center justify-center mb-[20px]">
                <i class="w-[80px] h-[80px] text-green-500" data-feather="check-circle"></i>
                <p class="text-[30px] font-semibold text-green-500">Success!</p>
                <p class="text-[12px]">{{ Session('Success') }}</p>
            </div>
            <button id="CloseModal" class="px-[25px] py-[5px] rounded bg-green-500 text-white font-medium">Oke</button>
        </div>
    </div>
</div>
