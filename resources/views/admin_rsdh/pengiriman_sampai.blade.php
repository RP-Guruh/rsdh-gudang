{{-- START HEADER --}}
@include('Layouts.admin.Header')
{{--  --}}

{{-- START NAVIGATION BAR --}}
@include('Layouts.admin.Nav')
{{-- END --}}

{{-- START ISI CONTENT --}}
<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8">
            <div class="title">
                <h1 class="font-bold text-center">DETAIL DATA BARANG TIBA</h1>
            </div>
            <form action="{{ url('admin/konfirmasi/pengiriman') }}" method="POST">
                @csrf
                <div class="form mt-4">
                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Kode Pengiriman</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" readonly="readonly" placeholder="Nama Barang" name="kode"
                            value="{{ $pengiriman->kode_pengiriman }}">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Nama Supplier</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" readonly="readonly" placeholder="Nama Supplier" name="supplier"
                            value="{{ $pengiriman->nama_supplier }}">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Kode Barang</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" readonly="readonly" placeholder="Kode Barang" name="kode_barang"
                            value="{{ $pengiriman->kode_barang }}">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Nama Barang</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" readonly="readonly" placeholder="Kode Barang" name="barang"
                            value="{{ $pengiriman->nama_barang }}">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Tanggal Kirim</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" readonly="readonly" name="tgl_kirim" value="{{ $pengiriman->tgl_kirim }}">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Tanggal Terima</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="date" value="{{ $pengiriman->kode_barang }}" name="tgl_terima">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Jumlah Dikirim</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" value="{{ $pengiriman->jumlah_kirim }}" name="jum_kirim">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Jumlah Barang Diterima</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="number" name="jum_terima">
                    </div>

                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Jumlah Barang Minus</label>
                        <input
                            class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="number" name="jum_minus">
                    </div>
                    <div class="mt-4">
                        <div class="submit">
                            <button type="submit"
                                class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Konfirmasi
                                Kedatangan Barang</button>
                        </div>
                    </div>
            </form>
        </div>

    </div>
</div>
</div>
{{-- END CONTENT --}}

{{-- START FOOTER --}}
@include('Layouts.admin.Footer')
{{-- END --}}
