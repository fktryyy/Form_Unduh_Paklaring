<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class FileDownloadController extends Controller
{
    public function download($encodedUrl)
    {
        // Decode URL karena dikirim sebagai path
        $url = urldecode($encodedUrl);

        // Ambil nama file dari URL
        $filename = basename(parse_url($url, PHP_URL_PATH));

        // Ambil konten dari URL
        $fileContents = @file_get_contents($url);
        if ($fileContents === false) {
            abort(404, 'Gagal mengunduh file dari URL eksternal.');
        }

        // Coba deteksi mime type dari ekstensi (atau pakai default)
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $mime = match (strtolower($extension)) {
            'pdf' => 'application/pdf',
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            default => 'application/octet-stream',
        };

        return response($fileContents, 200, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
