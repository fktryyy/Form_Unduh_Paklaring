<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>FORM DOWNLOAD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white shadow-xl rounded-3xl w-full max-w-xl p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img 
                src="https://karir.batangkab.go.id/storage/company_logo/y6142rA3HosAbuLBDiYWzHieqKdltoNXtr5VoFKO.png" 
                alt="Logo" 
                class="h-24 w-24 rounded-full shadow-md border-2 border-gray-300"
            />
        </div>

        <!-- Judul -->
        <h1 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8">
            📄 Letter Karyawan
        </h1>

        <!-- Konten -->
        <div class="bg-gray-50 rounded-xl p-6 shadow-inner text-gray-700">
            <div class="grid grid-cols-3 gap-y-4">
                <div class="font-semibold">ID</span><span class="ml-8">:</span></div>
                <div class="col-span-2 text-left">{{ $data['id'] }}</div>
        
                <div class="font-semibold">Nama</span><span class="ml-1">:</span></div>
                <div class="col-span-2 text-left">{{ $data['name'] }}</div>
        
                <div class="font-semibold">NIP</span><span class="ml-5">:</span></div>
                <div class="col-span-2 text-left">{{ $data['barcode'] }}</div>
        
                <div class="font-semibold">Link</span><span class="ml-4">:</span></div>
                <div class="flex items-center space-x-1">
                    @if($data['file_url'])  
                    <a 
                    href="{{ route('download.file', ['encodedUrl' => urlencode($data['file_url'])]) }}" 
                    class="text-blue-600 hover:underline"
                     >
                     {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828L18 9.828a4 4 0 00-5.656-5.656L6.343 10.172a6 6 0 108.485 8.485L20 13" />
                     </svg>  --}}
                      Unduh Dokumen
                    </a>
                @else
                        <span class="text-red-500 italic">Tidak tersedia</span>
                    @endif
                </div>
            </div>
        
        

        <!-- Tombol -->
        
    </div>

</body>
</html>
