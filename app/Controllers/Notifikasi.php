<?php

namespace App\Controllers;

use App\Models\DosenModel;
use CodeIgniter\Controller;

class Notifikasi extends Controller
{
    private $telegramBotToken;
    private $telegramChatId;

    public function __construct()
    {
        // Mengambil konfigurasi dari environment
        $this->telegramBotToken = getenv('TELEGRAM_BOT_TOKEN');
        $this->telegramChatId = getenv('TELEGRAM_CHAT_ID');
    }

    public function index()
    {
        // Fungsi ini untuk mengetes pengiriman notifikasi
        $this->kirimNotifikasi("Perhatian: Dosen tidak masuk hari ini.");
        return view('notifikasi_view', ['message' => 'Notifikasi telah dikirim.']);
    }

    public function dosenTidakMasuk($dosen_id)
    {
        return $this->kirimPesanDosen($dosen_id, "tidak masuk");
    }

    public function dosenMasuk($dosen_id)
    {
        return $this->kirimPesanDosen($dosen_id, "masuk");
    }

    private function kirimPesanDosen($dosen_id, $status)
    {
        $dosenModel = new DosenModel();
        $dosen = $dosenModel->find($dosen_id);

        if (!$dosen) {
            return view('notifikasi_view', ['message' => 'Dosen tidak ditemukan.']);
        }

        $message = "Perhatian: Dosen  " . $dosen['nama'] . " " . $status . " hari ini.";
        $this->kirimNotifikasi($message);

        return view('notifikasi_view', ['message' => 'Notifikasi telah dikirim.']);
    }

    private function kirimNotifikasi($message)
    {
        $telegramBotToken = $this->telegramBotToken;
        $telegramChatId = $this->telegramChatId;

        // URL untuk mengirim pesan ke API Telegram
        $url = "https://api.telegram.org/bot$telegramBotToken/sendMessage";

        // Data yang akan dikirim dalam body POST request
        $data = [
            'chat_id' => $telegramChatId,
            'text' => $message
        ];

        // Konfigurasi request
        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            ]
        ];

        // Buat context stream
        $context  = stream_context_create($options);

        // Kirim request ke API Telegram
        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return "Gagal mengirim pesan.";
        } else {
            return "Notifikasi telah dikirim.";
        }
    }
}