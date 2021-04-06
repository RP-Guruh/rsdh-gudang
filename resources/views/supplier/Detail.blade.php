{{-- START HEADER --}}
@include('Layouts.supplier.Header')
{{--  --}}

{{-- START NAVIGATION BAR --}}
@include('Layouts.supplier.Nav')
{{-- END --}}

{{-- START ISI CONTENT --}}
<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8">
            <div class="title">
                <h1 class="font-bold text-center">DETAIL DATA PENAWARAN</h1>
            </div>
            <div class="form mt-4">
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Kode Penawaran</label>
                    <input class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" disabled placeholder="Nama Barang" value="{{ $penawaran->kode_penawaran }}">
                </div>
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Nama Supplier</label>
                    <input class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" disabled placeholder="Nama Barang" value="{{ $penawaran->nama_supplier }}">
                </div>
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Nama Barang</label>
                    <input class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" disabled placeholder="Nama Barang" value="{{ $penawaran->nama_barang }}">
                </div>
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Harga Penawaran</label>
                    <input class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" disabled placeholder="Nama Barang" value="{{ $penawaran->harga_penawaran }}">
                </div>
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Tanggal Penawaran</label>
                    <input class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" disabled placeholder="Nama Barang" value="{{ $penawaran->tgl_penawaran }}">
                </div>
                <div class="flex flex-col text-sm mt-4">
                    <label for="title" class="font-bold mb-2">Created At</label>
                    <input disabled
                        class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" value="{{ $penawaran->created_at }}">
                </div>
                <div class="flex flex-col text-sm mt-4">
                    <label for="title" class="font-bold mb-2">Updated At</label>
                    <input name="harga_satuan" disabled
                        class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" value="{{ $penawaran->updated_at }}">
                </div>

                <div class="mt-4">
                    <a href="{{ route('supplier/dashboard') }}"
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
@include('Layouts.supplier.Footer')
{{-- END --}}
