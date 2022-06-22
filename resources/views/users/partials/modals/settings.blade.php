<!-- Edit picture and name -->

<div id="edit-settings" tabindex="-1" aria-hidden="@error('picture') false @else true @enderror" class="@error('picture') '' @else hidden @enderror overflow-y-auto overflow-x-hidden fixed bottom-24 right-0 left-0 z-40 w-max-500 mx-auto">
    <div class="relative w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="{{ route('user.profile.update') }}" method="post">
                @csrf
                <div class="px-6 space-y-6">
                    <div class="flex flex-col pt-2">
                        <div class="flex gap-3">
                            <div class="mt-3">
                                <div class="flex flex-col border-b @error('name') border-red-400 @else border-gray-800 @enderror">
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="wcd-blue font-bold">Naam</span>
                                    </div>
                                    <input type="text" class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" name="name" value="{{ old('name', auth()->user()->name) }}" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <div class="flex flex-col border-b @error('email') border-red-400 @else border-gray-800 @enderror">
                                    <div class="flex justify-between items-center">
                                        <span class="wcd-blue font-bold">Email</span>
                                        <a href="#" data-modal-toggle="edit-settings">
                                            <img src="/images/icons/plus-circle.svg" class="rotate-45" height="40" width="40" alt="back" />
                                        </a>
                                    </div>
                                    <input type="text" class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" name="email" value="{{ old('email', auth()->user()->email) }}" />
                                </div>
                                @error('email')
                                    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex gap-3 mt-5">
                            <div class="mt-3">
                                <div class="flex flex-col border-b @error('password') border-red-400 @else border-gray-800 @enderror">
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="wcd-blue font-bold">Wachtwoord</span>
                                    </div>
                                    <input type="password" class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" name="password" />
                                </div>
                                @error('password')
                                    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <div class="flex flex-col border-b @error('password_confirmation') border-red-400 @else border-gray-800 @enderror">
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="wcd-blue font-bold">Bevestig wachtwoord</span>
                                    </div>
                                    <input type="password" class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" name="password_confirmation" />
                                </div>
                                @error('password_confirmation')
                                    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <span class="font-bold">Upload profielfoto</span>
                            <input class="mt-1" type="file" name="picture" />

                            @error('picture')
                                <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 space-x-2 rounded-b border-t border-gray-200 mt-2">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Opslaan</button>
                    <button data-modal-toggle="edit-settings" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Annuleer</button>
                </div>
            </form>
        </div>
    </div>
</div>
