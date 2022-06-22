@extends('layouts.app')

@section('title', 'Mijn feed')

@section('content')
    <div class="container mt-32">
        <div class="flex flex-col justify-center">

            <div class="rounded-full bg-white m-10 mt-0">
                <ul class="flex" id="tabs" data-tabs-toggle="#tab-content" role="tablist">
                    <li class="basis-1/2 text-center" role="presentation">
                        <button class="p-1 font-bold border-2 w-full rounded-full" id="events-tab" data-tabs-target="#events" type="button" role="tab" aria-controls="events" aria-selected="false">Evenementen</button>
                    </li>
                    <li class="basis-1/2 text-center" role="presentation">
                        <button class="p-1 font-bold border-2 w-full rounded-full" id="feed-tab" data-tabs-target="#feed" type="button" role="tab" aria-controls="feed" aria-selected="false">Feed</button>
                    </li>
                </ul>
            </div>

            <div class="feed-scroll">
                <div class="scrollable" id="tab-content">
                    <div class="hidden flex flex-col justify-center" id="events" role="tabpanel" aria-labelledby="events-tab">
                        @forelse($events as $event)
                            <div class="bg-white rounded-2xl m-10 mb-0 {{ $loop->first ? 'mt-0' : 'mt-4' }} {{ $loop->last ? 'mb-96' : null }}">
                                @include('partials.event', ['event' => $event])
                            </div>
                        @empty
                            <div class="bg-white rounded-2xl m-10 mt-0 mb-0 p-4">
                                <p class="font-bold">Er zijn geen evenementen beschikbaar op dit moment.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="hidden flex flex-col justify-center" id="feed" role="tabpanel" aria-labelledby="feed-tab">
                        @foreach($articles as $article)
                            <a href="{{ route('news.show', [ 'article' => $article->id, 'slug' => str()->snake(str()->lower($article->title)) ]) }}"
                            class="rounded-3xl flex flex-col m-10 mt-0 mb-0 relative h-36 shadow-inner object-fit bg-center bg-cover"
                            style="background-image: url('{{ $article->image }}'); box-shadow: inset 0px -44px 60px 0px rgb(0 0 0);">
                                <div class="absolute flex w-full justify-between px-4 py-4 bottom-0 text-white items-end">
                                    <div class="flex flex-col">
                                        <span>{{ $article->title }}</span>
                                        <span class="text-xs mt-1">Lees meer...</span>
                                    </div>
                                    <div>
                                        <img src="/images/icons/pin-article.svg" height="32" width="32" alt="pinned" />
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @if($articles->count() > 0)
                            <hr class="mx-10 mt-5 h-1 bg-white rounded-full" />
                        @endif
                        @foreach($joinedEvents as $event)
                            <div class="bg-white rounded-2xl mx-10 mt-4">
                                @include('partials.event', ['event' => $event, 'withoutJoin' => true])
                            </div>
                        @endforeach
                        @if($joinedEvents->count() > 0)
                            <hr class="mx-10 mt-5 h-1 bg-white rounded-full" />
                        @endif
                        @foreach($activities as $activity)
                            <div class="bg-white rounded-lg flex flex-col mx-10 mt-5 p-4 {{ $loop->last ? 'mb-96' : null }}">
                                <div class="text-left">
                                    <span class="wcd-blue">{{ $activity->causer?->name ?: '<naam>' }}</span>
                                </div>
                                <div class="mt-4 flex w-96">
                                    <div>
                                        <img src="{{ $activity->causer?->profile_picture ?: '/images/profile-picture.png' }}"
                                             class="rounded-full border-2 border-black {{ $activity->causer?->picture ? null : 'bg-slate-400' }} w-32 h-20"
                                             alt="profile picture" />
                                    </div>
                                    <div class="ml-5">
                                        <p>{!! $activity->description !!}</p>
                                    </div>
                                    <div>
                                        <img src="/images/icons/trophy-active.svg" height="90" width="90" alt="">
                                    </div>
                                </div>
                                <div class="text-right text-gray-500 m-4">
                                    <span>{{ $activity->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const tabElements = [
            {
                id: 'events',
                triggerEl: document.querySelector('#events-tab'),
                targetEl: document.querySelector('#events')
            },
            {
                id: 'feed',
                triggerEl: document.querySelector('#feed-tab'),
                targetEl: document.querySelector('#feed')
            },
        ];

        const options = {
            defaultTabId: 'events',
            activeClasses: 'text-white border-white wcd-background-blue',
            inactiveClasses: 'text-black border-white hover:border-white hover:text-black',
            onShow: (index) => {
                index._activeTab.triggerEl.classList = ''
                index._activeTab.triggerEl.classList = 'p-1 font-bold border-2 w-full rounded-full text-white border-white wcd-background-blue'

                index._activeTab.targetEl.classList.add('fade-in')
            }
        };

        const tabs = new Tabs(tabElements, options);
    </script>
@endpush
