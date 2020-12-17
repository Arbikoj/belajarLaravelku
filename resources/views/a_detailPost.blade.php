<div class="mt-10">
    {{ view('style') }}
    @extends('dashboard')
    @section('title','detil posts')
    @section('content')

    <!--Container-->
<!--Card-->
<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow-2xl bg-white">


    <table
        id="example"
        class="stripe hover"
        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead class="bg-green-600 text-white">
            <tr>
                <th data-priority="1" class="w-1">No</th>
                <th data-priority="2">Thumbnail</th>
                <th data-priority="3">Judul</th>
                <th data-priority="4">Tanggal</th>
                <th data-priority="5">Kategori</th>
                <th data-priority="6">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            <tr>

                <td>{{ $no++ }}</td>
                <td>
                    <img
                        class="w-20 rounded-t-lg"
                        src="{{ url('img-thumbnail/'.$posts-> post_images) }}"
                        alt=""></td>
                    <td>{{ $posts-> post_title }}</td>
                    <td>{{ $posts-> post_date }}</td>
                    <td>{{ $posts-> post_category }}</td>
                    <td>
                        <div class="flex items-center">
                            {{-- detail post --}}
                            <button
                                class="mx-1 modal-open bg-blue-400 text-gray-700 hover:bg-blue-600 hover:shadow-2xl hover:text-white mb-5 px-2 py-1 rounded-full font-bold hover:border-indigo-500">
                                Detail</i>
                        </button>
                        {{-- edit post --}}
                        <button
                            class="mx-1 modal-open bg-yellow-400 text-gray-700 hover:bg-yellow-600 hover:shadow-2xl hover:text-white mb-5 px-2 py-1 rounded-full font-bold hover:border-indigo-500">
                            Edit</i>
                    </button>
                    {{-- delete post --}}
                    <button
                        class="mx-1 modal-open bg-red-400 text-gray-700 hover:bg-red-600 shadow-xl hover:text-white mb-5 px-2 py-1 rounded-full font-bold hover:border-indigo-500">
                        Delete</i>
                </button>

            </div>
        </td>
    </tr>

</tbody>

</table>
<div class="mt-4 w-1/4 mx-auto">
<img
                        class="w-full rounded-t-lg"
                        src="{{ url('img-thumbnail/'.$posts-> post_images) }}"
                        alt="">
                        <h1>{{ $posts-> post_title }}</h1>
                        <p>{{ $posts-> post_article }}</p>
                        </div>

</div>
<!--/Card-->
<!--/container-->
    @endsection
