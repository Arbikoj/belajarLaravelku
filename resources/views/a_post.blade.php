<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Posts</title>
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
            rel="stylesheet">
        <style>
            .modal {
                transition: opacity 0.25s ease;
            }
            body.modal-active {
                overflow-x: hidden;
                overflow-y: visible !important;
            }
        </style>
    </head>
    <body>

        @extends('dashboard') @section('content')

        {{-- ini menampilkan tabel post --}}
        <!--Container-->
        <!--Card-->
        {{-- {{ view('addPostModal') }}
        --}}
        {{-- button modal --}}
        <button
            class="ml-8 mb-0 mt-3 transform hover:scale-110 motion-reduce:transform-none modal-open bg-green-500 text-gray-700 hover:bg-green-600 hover:text-white mb-5 px-4 py-2 rounded-full font-bold hover:border-indigo-500">
            <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>
            Add Post
        </button>
        
        @if (session('pesan'))
        {{ session('pesan') }} 
    
        @endif
        
        
        
        <div id='recipients' class="p-2 mt-2 lg:mt-0 rounded shadow-2xl bg-white">

            {{-- @include('a_addPost') --}}

            {{-- {{ view('a_addPost') }}
            --}}
            {{ view('style') }}

            <table
                id="tabel1"
                class="mt-6 mb-5 hover"
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
                    @php $no = 1; 
                    @endphp @foreach ($posts as $dataku)
                    <tr>

                        <td>{{ $no++ }}</td>
                        <td>
                            <img
                                class="w-20 rounded-t-lg"
                                src="{{ url('img-thumbnail/'.$dataku-> post_images) }}"
                                alt=""></td>
                        <td>{{ $dataku-> post_title }}</td>
                        <td>{{ $dataku-> post_date }}</td>
                        <td>{{ $dataku-> post_category }}</td>
                        <td>
                            <div class="flex items-center">
                                {{-- detail post --}}
                                <button
                                    class="mx-1 bg-blue-400 text-gray-700 hover:bg-blue-600 hover:shadow-2xl hover:text-white mb-5 px-2 py-1 rounded-full font-bold hover:border-indigo-500">
                                    <a href="/admin/post/detail/{{ $dataku->id }}">
                                        Detail</a>
                                </button>
                                {{-- edit post --}}
                                <button
                                    class="mx-1 bg-yellow-400 text-gray-700 hover:bg-yellow-600 hover:shadow-2xl hover:text-white mb-5 px-2 py-1 rounded-full font-bold hover:border-indigo-500">
                                    Edit</i>
                            </button>
                            {{-- delete post --}}
                            <button
                                class="mx-1 bg-red-400 text-gray-700 hover:bg-red-600 shadow-xl hover:text-white mb-5 px-2 py-1 rounded-full font-bold hover:border-indigo-500">
                                Delete</i>
                        </button>

                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>

</div>
<!--/Card-->
<!--/container-->

{{-- <label class="block mt-15">
    <input
        type="text"
        class="form-input mt-1 block w-full"
        placeholder="Judul Artikel">
    <textarea
        class="form-textarea mt-1 block w-full"
        rows="5"
        placeholder="Type the Aricle . . ."></textarea>
</label> --}}

{{-- ini adalah modal --}}
<body class="bg-gray-200 flex items-center justify-center h-screen">

    {{-- <button
        class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Open Modal</button> --}}

    <!--Modal-->
    <div
        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div
            class="modal-container bg-white w-11/12 h-4/5 mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg
                    class="fill-current text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewbox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <h2
                        slot="header"
                        class="mt-0 text-4xl text-center font-hairline md:leading-loose text-grey md:mt-8 mb-2">Add a Post</h2>

                    <div class="modal-close cursor-pointer z-50">
                        <svg
                            class="fill-current text-black"
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                {{view('a_addPost')}}

            </div>
        </div>
    </div>

    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function (event) {
                event.preventDefault()
                toggleModal()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function (evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };

        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal
                .classList
                .toggle('opacity-0')
            modal
                .classList
                .toggle('pointer-events-none')
            body
                .classList
                .toggle('modal-active')
        }
    </script>
</body>

{{-- end modal --}}
</body>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.ckeditor').ckeditor();
});
</script>
{{-- ckeditor script --}}
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.ckeditor').ckeditor();
});
</script>
{{-- ckeditor image upload --}}
{{-- sumber ckeditor https://www.positronx.io/how-to-install-integrate-ckeditor-in-laravel/ --}}
<script type="text/javascript">
CKEDITOR.replace('wysiwyg-editor', {
    filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>
var openmodal = document.querySelectorAll('.modal-open')
for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function (event) {
        event.preventDefault()
        toggleModal()
    })
}

const overlay = document.querySelector('.modal-overlay')
overlay.addEventListener('click', toggleModal)

var closemodal = document.querySelectorAll('.modal-close')
for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
}

document.onkeydown = function (evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
        isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
    }
};

function toggleModal() {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal
        .classList
        .toggle('opacity-0')
    modal
        .classList
        .toggle('pointer-events-none')
    body
        .classList
        .toggle('modal-active')
}
</script>

@endsection
