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
                    <h1 class="font-bold text-center">BUAT PESANAN BARU</h1>
                </div>
                <div class="form mt-4">
                    <form action="{{ url('admin/rsdh/pesanan/barang/update/' . $pesanan->no_pesanan) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col text-sm">
                            <label for="title" class="font-bold mb-2">Nama Barang</label>

                            <select name="kode_barang"
                                class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
                                <option value="select" disabled selected>Nama Barang - Kode Barang - Harga Satuan
                                </option>
                                @foreach ($barang as $data)
                                    <option {{ $pesanan->kode_barang == $data->kode_barang ? 'selected' : '' }} value=" {{ $data->kode_barang }}
                                        "> {{ $data->nama_barang }} - {{ $data->kode_barang }} -
                                        {{ $data->harga_satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col text-sm mt-4">
                            <label for="title" class="font-bold mb-2">Jumlah Pembelian</label>
                            <input name="jumlah_beli"
                                class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                                type="number" placeholder="Jumlah Pembelian" value="{{ $pesanan->jumlah_beli }}">
                        </div>
                        <div class="flex flex-col text-sm mt-4">
                            <label for="title" class="font-bold mb-2">Tanggal Pesan</label>
                            <input name="tanggal_pesan"
                                class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                                type="date" placeholder="Tanggal Pesan" value="{{ $pesanan->tanggal_pesan }}">
                        </div>
                </div>
                <div class=" submit">
                    <button type="submit"
                        class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Ubah
                        Pesanan</button>
                </div>
                </form>
                <div class="mt-4">
                    <a href="{{ route('admin/rsdh/dashboard/pesanan/barang') }}"
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
