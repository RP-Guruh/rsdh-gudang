{{-- START HEADER --}}
@include('Layouts.supplier.Header')
{{--  --}}

{{-- START NAVIGATION BAR --}}
@include('Layouts.supplier.Nav')
{{-- END --}}

{{-- START ISI CONTENT --}}

<div class="flex bg-gray-100 py-24 justify-center">
    <div class="p-12 text-center max-w-2xl">
        <div class="md:text-3xl text-3xl font-bold">{{ $pesan }}</div>
        <hr class="border-b-2 border-gray-400 my-8 mx-4" />

        @if ($x == 0)
            <div class="mt-6 flex justify-center h-12 relative">
                <a href="{{ route('supplier/tambah/penawaran') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-green-100
        cursor-pointer bg-red-600 rounded text-lg tr-mt  svelte-jqwywd">Ulangi Pengajuan Harga</a>
            </div>
            <div class="mt-6 flex justify-center h-12 relative">
                <a href="{{ url('/supplier/add/penawaran') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-green-100
        cursor-pointer bg-green-600 rounded text-lg tr-mt  svelte-jqwywd"> Simpan dan Lanjutkan </a>
            </div>
    </div>

@else
    <div class="mt-6 flex justify-center h-12 relative">
        <a href="{{ route('supplier/tambah/penawaran') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-green-100
                cursor-pointer bg-red-600 rounded text-lg tr-mt  svelte-jqwywd">Ulangi Pengajuan Harga</a>
    </div>
    @endif
</div>
</div>
</div>
{{-- END CONTENT --}}

{{-- START FOOTER --}}
@include('Layouts.supplier.Footer')
{{-- END --}}
