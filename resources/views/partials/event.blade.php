<div class="relative">
    <img class="object-cover rounded-t-2xl bg-center max-h-36 w-full" src="{{ $event->image ?: 'https://via.placeholder.com/500' }}" alt="{{ $event->name }}" />
    @if(auth()->id() == $event->user_id)
        <div class="absolute top-1 right-1">
            <div class="rounded-full bg-red-500 py-1 px-3">
                <span class="font-bold text-white text-sm">Van jou</span>
            </div>
        </div>
    @elseif($event->users()->where('user_id', auth()->id())->count() > 0)
        <div class="absolute top-1 right-1">
            <div class="rounded-full bg-green-500 py-1 px-3">
                <span class="font-bold text-white text-sm">Gejoined</span>
            </div>
        </div>
    @elseif((!isset($withoutJoin) || !$withoutJoin) && $event->user_id != auth()->id())
        <a href="{{ route('events.join', [ 'event' => $event->id ]) }}" class="absolute right-3 bottom--5">
            <div class="rounded-3xl px-4 py-2 flex flex-row items-center gap-4 bg-yellow-300">
                <div class="">
                    <img class="h-8 w-8" src="/images/icons/calender.svg" alt="" />
                </div>
                <div class="font-bold">
                    <span class="text-sm">Join</span>
                </div>
            </div>
        </a>
    @endif
</div>
<div class="flex flex-col p-2 gap-2 p-7 font-bold">
    <div>
        <span>{{ $event->formattedStartDate() }}</span>
        <span class="wcd-blue ml-1">{{ $event->from_date->format('H:i') }} - {{ $event->to_date->format('H:i') }}</span>
    </div>
    <div class="text-xl">
        <p>{!! $event->title !!}</p>
    </div>
    <div class="flex flex-row justify-between">
        <div class="flex flex-row items-center">
            <img class="rounded-full w-7 h-7" src="{{ $event->user->profile_picture }}" alt="{{ $event->user->name }}" />
            <span class="ml-1 text-xs">{{ $event->user->name }}</span>
        </div>
        <div class="flex flex-row items-center">
            <img class="w-6 h-6" src="/images/icons/friend.svg" />
            <span class="ml-2 text-sm tracking-wide">{{ $event->users->count() }}<span class="text-gray-300 font-normal">/{{ $event->total_spots }}</span></span>
        </div>
    </div>
</div>
