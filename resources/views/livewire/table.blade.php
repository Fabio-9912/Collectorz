<div class="row annUser">
    <table class="table align-middle mb-0 bg-white text-center @if ($announcements->where('user_id', Auth::user()->id)->count() == 0) d-none @endif">
        <thead class="bg-light">
            <tr>
                <th>{{ __('ui.announcementTitle') }}</th>
                <th>{{ __('ui.category') }}</th>
                <th>{{ __('ui.priceAnn') }}</th>
                <th>{{ __('ui.status') }}</th>
                <th>{{ __('ui.inserted') }}</th>
                <th>{{ __('ui.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements->sortBy('is_accepted', false) as $announcement)
                @if ($announcement->user_id == Auth::user()->id)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 350) : '\storage\images\Collectorz_test.png'}}"
                                    alt="preview announcement img" style="width: 45px; height: 45px"
                                    class="rounded-circle" />
                                <div class="ms-3">
                                    <span class="fw-semibold">{{ $announcement->title }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="bagde-flag-category rounded-pill catProfile mx-auto"
                                @if ($announcement->category->name == 'Numistica') style="background:#FFDB58;" @elseif ($announcement->category->name == 'Strumenti Musicali') style="background:#B0C4DE;"  @elseif ($announcement->category->name == 'Gioielli') style="background:#856518;" @elseif ($announcement->category->name == 'Mobili Antichi') style="background:#E97451;" @elseif ($announcement->category->name == 'Vini e Liquori') style="background:#6C192B;" @elseif ($announcement->category->name == 'Carte Collezionabili') style="background:#8F9779;" @elseif ($announcement->category->name == 'Dischi e Vinili') style="background:#FFFFF0; color:black;" @elseif ($announcement->category->name == 'Oggetti da Guerra') style="background:#708090;" @elseif ($announcement->category->name == 'Motori') style="background:#F4C2C2;" @elseif ($announcement->category->name == 'Orologi') style="background:#AFEEEE;" @endif>
                                {{ $announcement->category->name }}
                            </span>
                        </td>
                        <td>
                            <div id="price" class="pt-1 mt-1 @if (App::isLocale('en')) d-none @endif ">€
                                {{ number_format($announcement->price, 2) }}</div>


                            <div id="price"
                                class="pt-1 mt-1 @if (App::isLocale('it')) d-none @elseif (App::isLocale('es')) d-none @endif ">
                                £
                                {{ number_format($announcement->price * $result, 2) }}</div>
                        </td>
                        <td>
                            <div class="mt-1">
                                <span class="rounded-pill d-inline">
                                    @if ($announcement->is_accepted === null)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.94em" height="2em"
                                            viewBox="0 0 496 512">
                                            <path fill="#EAD94E"
                                                d="M0 256c0 137 111 248 248 248s248-111 248-248S385 8 248 8S0 119 0 256m200-48c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32m158.5 16.5c-14.8-13.2-46.2-13.2-61 0L288 233c-8.3 7.4-21.6.4-19.8-10.8c4-25.2 34.2-42.1 59.9-42.1S384 197 388 222.2c1.7 11.1-11.4 18.3-19.8 10.8zM157.8 325.8C180.2 352.7 213 368 248 368s67.8-15.4 90.2-42.2c13.6-16.2 38.1 4.2 24.6 20.5C334.3 380.4 292.5 400 248 400s-86.3-19.6-114.8-53.8c-13.5-16.3 11.2-36.7 24.6-20.4" />
                                        </svg>
                                    @endif
                                    @if ($announcement->is_accepted === 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.94em" height="2em"
                                            viewBox="0 0 496 512">
                                            <path fill="#556B2F"
                                                d="M248 8C111 8 0 119 0 256s111 248 248 248s248-111 248-248S385 8 248 8M112 223.4c3.3-42.1 32.2-71.4 56-71.4s52.7 29.3 56 71.4c.7 8.6-10.8 11.9-14.9 4.5l-9.5-17c-7.7-13.7-19.2-21.6-31.5-21.6s-23.8 7.9-31.5 21.6l-9.5 17c-4.3 7.4-15.8 4-15.1-4.5m250.8 122.8C334.3 380.4 292.5 400 248 400s-86.3-19.6-114.8-53.8c-13.5-16.3 11-36.7 24.6-20.5c22.4 26.9 55.2 42.2 90.2 42.2s67.8-15.4 90.2-42.2c13.6-16.2 38.1 4.3 24.6 20.5m6.2-118.3l-9.5-17c-7.7-13.7-19.2-21.6-31.5-21.6s-23.8 7.9-31.5 21.6l-9.5 17c-4.1 7.3-15.6 4-14.9-4.5c3.3-42.1 32.2-71.4 56-71.4s52.7 29.3 56 71.4c.6 8.6-11 11.9-15.1 4.5" />
                                        </svg>
                                    @endif
                                    @if ($announcement->is_accepted === 0)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                            viewBox="0 0 14 14">
                                            <path fill="#A85751" fill-rule="evenodd"
                                                d="M14 7A7 7 0 1 0 0 7a7 7 0 0 0 14 0M4.994 3.826a2.143 2.143 0 0 0-.617.081a2.823 2.823 0 0 0-.68.275c-.224.13-.422.295-.578.451c-.148.15-.292.326-.378.495a.625.625 0 1 0 1.112.57a1.432 1.432 0 0 1 .153-.185c.095-.095.207-.185.316-.248a1.579 1.579 0 0 1 .54-.184c.046-.006.069-.006.071-.006a.625.625 0 1 0 .061-1.249M4.67 9.694a.625.625 0 1 1-1.21-.324a3.665 3.665 0 0 1 7.078 0a.625.625 0 0 1-1.208.325a2.415 2.415 0 0 0-4.662 0Zm4.468-4.613c-.045-.006-.068-.006-.07-.006a.625.625 0 0 1-.062-1.249c.19-.009.414.027.618.081c.213.056.455.146.68.275c.224.13.422.295.577.451c.15.15.292.326.38.495a.625.625 0 1 1-1.113.57a1.454 1.454 0 0 0-.153-.185a1.578 1.578 0 0 0-.317-.248a1.579 1.579 0 0 0-.54-.184"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif

                                </span>
                            </div>


                        </td>
                        <td>
                            <div class="mt-1">
                                {{ $announcement->created_at->diffForHumans() }}
                            </div>
                        </td>
                        <td class="d-flex justify-content-center" style="border-bottom: none;">
                            <span>
                                <a href="{{ route('announcements.show', $announcement) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" class="anchor"
                                        viewBox="0 0 24 24">
                                        <path fill="#4b6c8b"
                                            d="M15.85 12.425q.225-.15.225-.425t-.225-.425L10.275 8q-.25-.175-.513-.025t-.262.45v7.15q0 .3.263.45t.512-.025zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                                    </svg>
                                </a>
                            </span>
                            <!-- Button trigger modal -->

                            <span class="@if ($announcement->is_accepted === null || $announcement->is_accepted === 1) d-none @endif">
                                <button wire:click="edit({{ $announcement }})" class="editForm" type="button"
                                    onclick="document.getElementById('editForm').scrollIntoView();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                        viewBox="0 0 20 26" class="anchor">
                                        <path fill="#EAD94E"
                                            d="M16.698 21.996h-11.6a3.06 3.06 0 0 1-2.2-.92a3.09 3.09 0 0 1-.9-2.21V7.276a3 3 0 0 1 .91-2.19a3 3 0 0 1 1-.67a3.06 3.06 0 0 1 1.2-.24h4.44a.75.75 0 0 1 0 1.5h-4.44a2 2 0 0 0-.63.12a1.62 1.62 0 0 0-.99 1.5v11.59a1.62 1.62 0 0 0 .47 1.16a1.62 1.62 0 0 0 1.15.47h11.6c.213 0 .423-.04.62-.12a1.54 1.54 0 0 0 .52-.35a1.49 1.49 0 0 0 .35-.52a1.51 1.51 0 0 0 .13-.63v-4.44a.75.75 0 1 1 1.5 0v4.47a3.06 3.06 0 0 1-.92 2.2a3.16 3.16 0 0 1-1 .68c-.387.14-.798.205-1.21.19" />
                                        <path fill="#EAD94E"
                                            d="M21.808 5.456a1.86 1.86 0 0 0-.46-.68l-2.15-2.15a1.86 1.86 0 0 0-.68-.46a2.1 2.1 0 0 0-2.31.46l-1.71 1.71v.05l-7.74 7.73a2.11 2.11 0 0 0-.61 1.48v2.17a2.12 2.12 0 0 0 2.11 2.11h2.17a2.07 2.07 0 0 0 1.48-.62l7.74-7.74l1.72-1.72c.202-.19.36-.422.46-.68a2 2 0 0 0 0-1.63zm-1.38 1.05a.56.56 0 0 1-.14.2l-1.22 1.22l-3-3l1.23-1.23a.64.64 0 0 1 .44-.18a.59.59 0 0 1 .23.05c.076.032.145.08.2.14l2.16 2.15a.69.69 0 0 1 .13.2a.59.59 0 0 1 0 .23a.6.6 0 0 1-.03.22" />
                                    </svg>
                                </button>
                            </span>
                            <button wire:click="delete({{ $announcement }})" class="btnDelete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                    viewBox="0 0 1100 1180" class="anchor">
                                    <path fill="#a87e62"
                                        d="M352 192V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64H96a32 32 0 0 1 0-64zm64 0h192v-64H416zM192 960a32 32 0 0 1-32-32V256h704v672a32 32 0 0 1-32 32zm224-192a32 32 0 0 0 32-32V416a32 32 0 0 0-64 0v320a32 32 0 0 0 32 32m192 0a32 32 0 0 0 32-32V416a32 32 0 0 0-64 0v320a32 32 0 0 0 32 32" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div class="col-12 mx-auto fs-1 text-center fw-bolder @if ($announcements->where('user_id', Auth::user()->id)->count() != 0) d-none @endif">{{__('ui.notInsertedYet')}}</div>
</div>
