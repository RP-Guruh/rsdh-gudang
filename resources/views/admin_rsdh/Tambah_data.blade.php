{{-- START HEADER --}}
@include('Layouts.admin.Header')
{{--  --}}

{{-- START NAVIGATION BAR --}}
@include('Layouts.admin.Nav')
{{-- END --}}

{{-- START ISI CONTENT --}}
<div class="w-full grid place-content-center">
    <div class="container w-full mx-auto pt-20">
        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
            <div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8">
                <div class="title">
                    <h1 class="font-bold text-center">TAMBAH DATA BARANG</h1>
                </div>
                <div class="form mt-4">
                    <form action="{{ url('admin/rsdh/tambah/barang/add') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col text-sm">
                            <label for="title" class="font-bold mb-2">Nama Barang</label>
                            <input name="nama_barang"
                                class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                                type="text" placeholder="Nama Barang">
                        </div>
                        <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
                            <p class="w-1/2 mb-2 md:mb-0 font-bold">Kategori </p>
                            <select name="kategori"
                                class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
                                <option value="select" disabled selected>Kategori Barang</option>
                                <option value="Bahan Terolah">Bahan Terolah</option>
                                <option value="Bahan Segar">Bahan Segar</option>
                                <option value="Bahan Siap Saji">Bahan Siap Saji </option>
                            </select>
                        </div>

                        <div class="flex flex-col text-sm mt-4">
                            <label for="title" class="font-bold mb-2">Harga Minimum</label>
                            <input name="harga_min"
                                class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                                type="number" placeholder="Harga Minimum (Rupiah)">
                        </div>
                        <div class="flex flex-col text-sm mt-4">
                            <label for="title" class="font-bold mb-2">Harga Maximum</label>
                            <input name="harga_max"
                                class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                                type="number" placeholder="Harga Maximum (Rupiah)">
                        </div>
                        <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
                            <p class="w-1/2 mb-2 md:mb-0 font-bold">Satuan Hitung </p>
                            <select name="satuan_hitung"
                                class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
                                <option value="select" disabled selected>Satuan Hitung</option>
                                <option value="Per-Liter">Per-Liter</option>
                                <option value="Per-Kilogram">Per-Kilogram</option>
                                <option value="Per-Sachet">Per-Sachet </option>
                            </select>
                        </div>
                </div>
                <div class="flex flex-col text-sm mt-4">
                    <label for="title" class="font-bold mb-2">Expired Date</label>
                    <input name="exp_date"
                        class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="date">
                </div>
                <div class="submit">
                    <button type="submit"
                        class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Simpan</button>
                </div>
                </form>
                <div class="mt-4">
                    <a href="{{ route('admin/rsdh/dashboard') }}"
                        class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="mr-6 ml-4">Kembali</span>
                    </a>
                </div>
            </div>




        </div>
    </div>
</div>
{{-- END CONTENT --}}

{{-- START FOOTER --}}
@include('Layouts.admin.Footer')
{{-- END --}}
