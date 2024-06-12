
<div class="min-h-screen bg-gray-100 flex justify-center ">
    <div class="md:relative w-fit flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
        
        <div class="md:absolute w-full h-fit md:top-50 md:left-full  sm:max-w-md my-6 mx-6 px-6 py-4 sm:rounded-lg">
            {{ $socials }}
        </div>

    </div>
</div>
