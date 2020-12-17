{{-- title --}}
<form method="POST" action="{{route('admin.post.add')}}" enctype="multipart/form-data">
    @csrf
    <input
        type="text"
        name="post_title"
        for="post_title"
        class="form-input mt-1 block w-full @error('post_title') is-invalid @enderror"
        placeholder="Judul Artikel">

    {{-- CKEditor --}}

    <div class="card-body">

        @csrf
        <div class="form-group">
            <textarea class="ckeditor form-control @error('post_article') is-invalid @enderror" name="post_article" for="post_article"></textarea>
        </div>

    </div>
    {{-- kategori --}}
    <h3 class="text-gray-600 mt-3 mb-1">Kategori</h3>
    <select
    for="post_category"
        name="post_category"
        class="@error('post_category') is-invalid @enderror block appearance-none w-1/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <option>uncategorized</option>
        <option>Tech</option>
        <option>Robot</option>
    </select>
    {{-- upload thumbnail --}}
    <h3 class="text-gray-600 mt-3 mb-1">Thumbnail</h3>
    <label
        for="file-upload"
        name="post_images"
        class="@error('post_images') is-invalid @enderror py-1 px-3 bg-blue-500 hover:bg-blue-600 relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-gray-100 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
        <span>Upload a file</span>
        <input id="file-upload" name="file-upload" type="file" class="sr-only">
    </label>
    {{-- tanggal --}}
    <h3 class="text-gray-600 mt-3 mb-1">Date</h3>
    <input name="post_date" type="date" class="@error('post_date') is-invalid @enderror form-input mt-1 block w-1/4 ">

    <button
        type="submit"
        class="mx-2 my-2 px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">add</button>
</form>
<!--Footer-->
<div class="flex justify-end pt-2">
    <button
        class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button>
    <button
        class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
</div>