<x-app-layout>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Original Url</th>
                            <th scope="col" class="px-6 py-4">Shortener Url</th>
                            <th scope="col" class="px-6 py-4">Clicks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($urls as $key => $url)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$url->long_url}}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <a target="_blank" href="{{url('/')}}/{{$url->short_url}}">
                                        {{url('/')}}/{{$url->short_url}}
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">{{$url->clicks}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
