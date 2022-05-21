<nav class="fixed bottom-0 left-0 right-0 flex justify-center mx-auto" style="max-width: 500px;">
    <div class="rounded-t-3xl w-full bg-gray-200">
        <div class="p-4">
            <div class="flex flex-column justify-center items-center relative">
                <div class="mx-10">
                    <div class="rounded-full bg-white p-3">
                        <img src="images/icons/pin-yellow.svg" width="40" height="40" alt="">
                    </div>
                </div>
                <div class="mx-10 {{ \Request::route()->getName() == 'home' ? 'relative bottom-10' : null }}">
                    <div class="rounded-full bg-white p-3">
                        <img src="images/icons/house-active.svg" width="40" height="40" alt="">
                    </div>
                </div>
                <div class="mx-10">
                    <div class="rounded-full bg-white p-3">
                        	<img src="images/icons/news-active.svg" width="40" height="40" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
