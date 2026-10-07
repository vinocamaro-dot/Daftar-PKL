<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Pendaftaran PKL</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-200">
    <h2 class="text-2xl font-bold mb-6 text-center text-slate-800">Form Pendaftaran Peserta PKL</h2>

    <?php
    
    if (isset($_POST['btn_submit'])) {
        
        $nama       = $_POST['nama_lengkap'];
        $nis        = $_POST['nis'];
        $email      = $_POST['email'];
        $jurusan    = $_POST['jurusan'] ?? '-';
        $perusahaan = $_POST['perusahaan'];
        $tech_stack = $_POST['tech_stack'] ?? [];
        $alasan     = $_POST['alasan'];

        
        if (empty($nama) || empty($nis)) {
            
            echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">';
            echo '<p class="font-bold">Error!</p>';
            echo '<p>Field <b>Nama Lengkap</b> dan <b>NIS</b> wajib diisi.</p>';
            echo '</div>';
        } else {
            
            echo '<div class="bg-green-50 border-l-4 border-green-500 p-5 mb-6 rounded shadow-sm">';
            echo '<h3 class="font-bold text-lg text-green-800 border-b pb-2 mb-3">Data Pendaftaran Berhasil Diterima:</h3>';
            echo '<ul class="list-disc pl-5 space-y-1 text-gray-700">';
            echo "<li><strong>Nama Lengkap:</strong> " . htmlspecialchars($nama) . "</li>";
            echo "<li><strong>NIS:</strong> " . htmlspecialchars($nis) . "</li>";
            echo "<li><strong>Email Siswa:</strong> " . htmlspecialchars($email) . "</li>";
            echo "<li><strong>Kompetensi Keahlian:</strong> " . htmlspecialchars($jurusan) . "</li>";
            echo "<li><strong>Pilihan Perusahaan:</strong> " . htmlspecialchars($perusahaan) . "</li>";
            
            
            $tech_stack_list = !empty($tech_stack) ? implode(", ", $tech_stack) : "Belum ada yang dipilih";
            echo "<li><strong>Tech Stack yang Dikuasai:</strong> " . htmlspecialchars($tech_stack_list) . "</li>";
            
            echo "<li><strong>Alasan Memilih Perusahaan:</strong><br/> <span class='italic'>" . nl2br(htmlspecialchars($alasan)) . "</span></li>";
            echo '</ul>';
            echo '</div>';
        }
    }
    ?>

    
    <form action="" method="post" class="space-y-5 text-gray-700">
        
        <div>
            <label class="block font-semibold mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
            <input type="text" name="nama_lengkap" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama lengkap">
        </div>

        
        <div>
            <label class="block font-semibold mb-1">NIS <span class="text-red-500">*</span></label>
            <input type="number" name="nis" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nomor Induk Siswa">
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Email Siswa</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="contoh@sekolah.com">
        </div>

        
        
        <div>
            <label class="block font-semibold mb-2">Kompetensi Keahlian / Jurusan</label>
        
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2">
                    <input type="radio" name="jurusan" value="Software Developer" class="w-4 h-4 text-blue-600"> 
                    Software Developer
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="jurusan" value="Teknik Komputer Jaringan" class="w-4 h-4 text-blue-600"> 
                    Teknik Komputer Jaringan
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="jurusan" value="DKV" class="w-4 h-4 text-blue-600"> 
                    DKV
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="jurusan" value="Digital Marketing" class="w-4 h-4 text-blue-600"> 
                    Digital Marketing
                </label>
            </div>
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Pilihan Perusahaan PKL</label>
            <select name="perusahaan" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Perusahaan Target --</option>
                <option value="PT Telkom Indonesia">PT Telkom Indonesia</option>
                <option value="Tech Startup Sidoarjo">Tech Startup Sidoarjo</option>
                <option value="Software House Surabaya">Software House Surabaya</option>
            </select>
        </div>

        
        <div>
            <label class="block font-semibold mb-2">Kompetensi / Tech Stack yang Dikuasai</label>
            <div class="grid grid-cols-2 gap-2">
                
                <label class="flex items-center gap-2"><input type="checkbox" name="tech_stack[]" value="HTML & CSS"> HTML & CSS</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="tech_stack[]" value="Tailwind CSS"> Tailwind CSS</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="tech_stack[]" value="JavaScript"> JavaScript</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="tech_stack[]" value="PHP & MySQL"> PHP & MySQL</label>
            </div>
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Alasan Memilih Perusahaan</label>
            <textarea name="alasan" rows="3" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tuliskan motivasi dan alasanmu memilih perusahaan tersebut..."></textarea>
        </div>

        
        <div class="pt-4">
            <button type="submit" name="btn_submit" class="w-full bg-slate-800 text-white font-bold py-3 px-4 rounded hover:bg-slate-700 transition duration-200">
                Kirim Data Pendaftaran
            </button>
        </div>

    </form>
</div>

</body>
</html>