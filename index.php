<?php
/*
 * index.php — Landing page kursus mengemudi (placeholder untuk latihan)
 *
 * Isi yang gampang berubah (nama, nomor WhatsApp, paket, materi, FAQ) ada di
 * bagian atas ini dalam bentuk array PHP. Ubah datanya di sini, HTML di bawah
 * akan menyesuaikan sendiri lewat perulangan foreach.
 *
 * PENTING: repositori GitHub ini publik. Jangan isi nomor telepon asli,
 * password, atau data pribadi apa pun di file ini.
 */

$namaBrand = 'Laju Mengemudi';
$nomorWa   = '6280000000000'; // placeholder; format 62..., tanpa tanda + atau spasi
$pesanUmum = 'Halo, saya ingin bertanya tentang kursus mengemudi.';

$paket = [
    [
        'nama'      => 'Matic Pemula',
        'deskripsi' => 'Untuk yang belum pernah memegang setir. Belajar dari nol dengan mobil matic.',
        'pertemuan' => 8,
        'menit'     => 90,
        'harga'     => 1600000,
    ],
    [
        'nama'      => 'Matic dan Manual',
        'deskripsi' => 'Belajar dua jenis transmisi, lengkap dengan tanjakan dan parkir.',
        'pertemuan' => 12,
        'menit'     => 90,
        'harga'     => 2400000,
        'utama'     => true,
    ],
    [
        'nama'      => 'Persiapan SIM A',
        'deskripsi' => 'Sudah bisa menyetir, tinggal berlatih materi dan praktik ujian.',
        'pertemuan' => 4,
        'menit'     => 90,
        'harga'     => 900000,
    ],
];

$materi = [
    ['judul' => 'Kenali mobil',          'isi' => 'Posisi duduk, kaca spion, pedal, dan tuas-tuas di dasbor.'],
    ['judul' => 'Jalan dan berhenti',    'isi' => 'Menjalankan mobil, mengerem halus, dan menjaga jalur lurus di area latihan.'],
    ['judul' => 'Belok, mundur, parkir', 'isi' => 'Belok tanpa melebar, mundur lurus, parkir paralel dan tegak lurus.'],
    ['judul' => 'Jalan raya',            'isi' => 'Pindah lajur, menyalip, menaiki tanjakan, dan berkendara di lalu lintas ramai.'],
    ['judul' => 'Simulasi ujian SIM',    'isi' => 'Latihan praktik dan soal teori seperti ujian yang sebenarnya.'],
];

$faq = [
    [
        'tanya' => 'Saya belum pernah menyetir sama sekali. Boleh ikut?',
        'jawab' => 'Boleh. Paket Matic Pemula dirancang dari nol, dimulai dengan mengenal bagian-bagian mobil.',
    ],
    [
        'tanya' => 'Bisakah belajar memakai mobil sendiri?',
        'jawab' => 'Bisa, asalkan mobilnya layak jalan. Instruktur akan memeriksanya dulu sebelum sesi pertama.',
    ],
    [
        'tanya' => 'Bagaimana jadwal belajarnya?',
        'jawab' => 'Kamu yang memilih hari dan jam. Satu pertemuan berlangsung 90 menit dan bisa dijadwalkan ulang paling lambat sehari sebelumnya.',
    ],
    [
        'tanya' => 'Apakah biaya ujian SIM sudah termasuk?',
        'jawab' => 'Belum. Biaya resmi ujian SIM dibayar terpisah kepada pihak berwenang. Kami membantu persiapan latihannya.',
    ],
];

// Mengamankan teks sebelum dicetak ke HTML (mencegah karakter seperti < dan > merusak halaman)
function e($teks)
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

// Membuat link WhatsApp lengkap dengan pesan awal
function linkWa($nomor, $pesan)
{
    return 'https://wa.me/' . $nomor . '?text=' . rawurlencode($pesan);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kursus Mengemudi Mobil | <?= e($namaBrand) ?></title>
<meta name="description" content="Belajar mengemudi dari nol dengan instruktur sabar, mobil berpedal ganda, dan jadwal yang kamu tentukan sendiri.">
<meta name="theme-color" content="#1E2429">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Barlow:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --aspal: #1E2429;
    --aspal-2: #2C343B;
    --marka: #F5C518;
    --rambu: #0F6B4F;
    --bg: #F2F4F5;
    --putih: #FFFFFF;
    --teks: #1E2429;
    --teks-lembut: #56616B;
    --teks-pudar: #C7CED4;
    --garis: #D5DADE;
    --font-judul: 'Barlow Condensed', 'Arial Narrow', 'Roboto Condensed', sans-serif;
    --font-isi: 'Barlow', system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif;
  }

  *, *::before, *::after { box-sizing: border-box; }
  html { scroll-behavior: smooth; }

  body {
    margin: 0;
    font-family: var(--font-isi);
    font-size: 1.0625rem;
    line-height: 1.6;
    color: var(--teks);
    background: var(--bg);
  }

  h1, h2, h3 { font-family: var(--font-judul); line-height: 1.05; margin: 0; }
  h2 { font-size: clamp(2rem, 6vw, 2.75rem); font-weight: 700; margin-bottom: 12px; }
  h3 { font-size: 1.5rem; font-weight: 600; }
  p { margin: 0; }
  a { color: inherit; }

  :focus-visible { outline: 3px solid #005FCC; outline-offset: 3px; }
  .gelap :focus-visible { outline-color: var(--marka); }
  .ajakan :focus-visible { outline-color: var(--aspal); }

  .wadah { max-width: 1040px; margin: 0 auto; padding: 0 20px; }
  .bagian { padding: 56px 0; }
  .gelap { background: var(--aspal); color: var(--putih); }

  /* ---------- Tombol ---------- */
  .tombol {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 48px;
    padding: 0 24px;
    border: 2px solid transparent;
    border-radius: 6px;
    font: 600 1rem/1 var(--font-isi);
    text-align: center;
    text-decoration: none;
    transition: background-color 0.15s;
  }
  .tombol-utama { background: var(--marka); color: var(--aspal); }
  .tombol-utama:hover { background: #FFD84D; }
  .tombol-garis { border-color: rgba(255, 255, 255, 0.55); color: var(--putih); }
  .tombol-garis:hover { background: rgba(255, 255, 255, 0.08); }
  .tombol-rambu { background: var(--rambu); color: var(--putih); }
  .tombol-rambu:hover { background: #0B5840; }
  .tombol-gelap { background: var(--aspal); color: var(--putih); }
  .tombol-gelap:hover { background: var(--aspal-2); }

  /* ---------- Hero ---------- */
  .hero { padding: 20px 0 28px; }
  .topbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; }
  .brand { font-family: var(--font-judul); font-weight: 700; font-size: 1.6rem; text-decoration: none; color: var(--putih); }
  .topbar .tombol { display: none; }
  .hero-isi { padding: 56px 0 64px; }
  .hero h1 { font-size: clamp(2.75rem, 10vw, 5.5rem); font-weight: 700; letter-spacing: -0.01em; max-width: 12em; }
  .hero-sub { margin-top: 20px; max-width: 34rem; font-size: 1.2rem; color: var(--teks-pudar); }
  .aksi { margin-top: 32px; display: flex; flex-wrap: wrap; gap: 12px; }
  .aksi .tombol { flex: 1 1 220px; }

  /* Marka jalan putus-putus: satu-satunya gerakan otomatis di halaman */
  .marka {
    height: 10px;
    background: repeating-linear-gradient(90deg, var(--marka) 0 36px, transparent 36px 72px);
    background-size: 72px 100%;
    animation: jalan 1.4s linear infinite;
  }
  @keyframes jalan { to { background-position-x: 72px; } }

  /* ---------- Paket ---------- */
  .catatan { color: var(--teks-lembut); }
  .daftar-paket { list-style: none; margin: 32px 0 0; padding: 0; border-bottom: 1px solid var(--garis); }
  .paket { display: grid; gap: 16px; padding: 24px 16px; border-top: 1px solid var(--garis); }
  .paket-utama { padding-left: 24px; background: var(--putih); box-shadow: inset 6px 0 0 var(--marka); }
  .paket h3 { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; }
  .lencana { font: 600 0.8rem/1.4 var(--font-isi); padding: 2px 10px; border-radius: 99px; background: var(--marka); color: var(--aspal); }
  .paket-info p { max-width: 52ch; color: var(--teks-lembut); }
  .paket-info .paket-meta { margin-top: 6px; font-size: 0.95rem; }
  .paket-aksi { display: grid; gap: 12px; align-content: start; }
  .paket-aksi .harga { font-family: var(--font-judul); font-weight: 700; font-size: 2rem; line-height: 1; color: var(--teks); }

  /* ---------- Materi (jalan bertahap) ---------- */
  .jalan { list-style: none; margin: 40px 0 0; padding: 0; position: relative; }
  .jalan::before {
    content: "";
    position: absolute;
    left: 20px;
    top: 22px;
    bottom: 22px;
    width: 4px;
    background: repeating-linear-gradient(180deg, var(--marka) 0 14px, transparent 14px 28px);
  }
  .jalan li { position: relative; display: grid; grid-template-columns: 44px 1fr; gap: 20px; padding-bottom: 32px; }
  .jalan li:last-child { padding-bottom: 0; }
  .titik {
    position: relative;
    z-index: 1;
    display: grid;
    place-items: center;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--marka);
    color: var(--aspal);
    font-family: var(--font-judul);
    font-weight: 700;
    font-size: 1.4rem;
  }
  .jalan h3 { font-size: 1.4rem; margin-bottom: 4px; }
  .jalan p { max-width: 52ch; color: var(--teks-pudar); }

  /* ---------- FAQ ---------- */
  .faq { margin-top: 28px; border-bottom: 1px solid var(--garis); }
  .faq details { border-top: 1px solid var(--garis); }
  .faq summary {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 20px 0;
    list-style: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 1.1rem;
  }
  .faq summary::-webkit-details-marker { display: none; }
  .faq summary::after { content: "+"; font-family: var(--font-judul); font-size: 1.8rem; line-height: 1; color: var(--rambu); }
  .faq details[open] summary::after { content: "\2212"; }
  .faq details p { max-width: 60ch; padding: 0 0 20px; color: var(--teks-lembut); }

  /* ---------- Ajakan akhir ---------- */
  .ajakan { background: var(--marka); color: var(--aspal); }
  .ajakan p { margin-top: 8px; max-width: 44ch; }
  .ajakan .tombol { margin-top: 24px; }

  /* ---------- Footer ---------- */
  .kaki { padding: 32px 0 calc(96px + env(safe-area-inset-bottom, 0px)); font-size: 0.9rem; color: var(--teks-pudar); }
  .kaki p + p { margin-top: 4px; }

  /* ---------- Bar tombol tetap di bawah (khusus HP) ---------- */
  .bar-bawah {
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 20;
    padding: 10px 20px calc(10px + env(safe-area-inset-bottom, 0px));
    border-top: 1px solid var(--aspal-2);
  }
  .bar-bawah .tombol { width: 100%; }

  /* ---------- Layar lebih lebar (tablet dan desktop) ---------- */
  @media (min-width: 720px) {
    .bagian { padding: 88px 0; }
    .topbar .tombol { display: inline-flex; }
    .hero-isi { padding: 96px 0 88px; }
    .aksi .tombol { flex: 0 0 auto; }
    .paket { grid-template-columns: 1fr auto; align-items: center; padding: 28px 24px; }
    .paket-utama { padding-left: 32px; }
    .paket-aksi { justify-items: end; text-align: right; }
    .kaki { padding-bottom: 32px; }
    .bar-bawah { display: none; }
  }

  @media (prefers-reduced-motion: reduce) {
    html { scroll-behavior: auto; }
    .marka { animation: none; }
    .tombol { transition: none; }
  }
</style>
</head>
<body>

<header class="hero gelap">
  <div class="wadah">
    <div class="topbar">
      <a class="brand" href="#"><?= e($namaBrand) ?></a>
      <a class="tombol tombol-utama" href="<?= e(linkWa($nomorWa, $pesanUmum)) ?>">Chat lewat WhatsApp</a>
    </div>
    <div class="hero-isi">
      <h1>Belajar mengemudi dari nol sampai berani jalan sendiri</h1>
      <p class="hero-sub">Instruktur sabar, mobil berpedal ganda, dan jadwal yang kamu tentukan sendiri.</p>
      <div class="aksi">
        <a class="tombol tombol-utama" href="<?= e(linkWa($nomorWa, $pesanUmum)) ?>">Tanya jadwal lewat WhatsApp</a>
        <a class="tombol tombol-garis" href="#paket">Lihat paket</a>
      </div>
    </div>
  </div>
  <div class="marka" aria-hidden="true"></div>
</header>

<main>

  <section class="bagian" id="paket">
    <div class="wadah">
      <h2>Pilih paket belajar</h2>
      <p class="catatan">Harga dan jumlah pertemuan di bawah hanya contoh.</p>

      <ul class="daftar-paket">
        <?php foreach ($paket as $p): ?>
        <li class="paket<?= !empty($p['utama']) ? ' paket-utama' : '' ?>">
          <div class="paket-info">
            <h3>
              <?= e($p['nama']) ?>
              <?php if (!empty($p['utama'])): ?><span class="lencana">Paling dipilih</span><?php endif; ?>
            </h3>
            <p><?= e($p['deskripsi']) ?></p>
            <p class="paket-meta"><?= (int)$p['pertemuan'] ?> pertemuan, masing-masing <?= (int)$p['menit'] ?> menit</p>
          </div>
          <div class="paket-aksi">
            <p class="harga">Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
            <a class="tombol tombol-rambu" href="<?= e(linkWa($nomorWa, 'Halo, saya tertarik dengan paket ' . $p['nama'] . '.')) ?>">Pilih lewat WhatsApp</a>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <section class="bagian gelap" id="materi">
    <div class="wadah">
      <h2>Lima tahap dari kursi pengemudi sampai ujian SIM</h2>
      <ol class="jalan">
        <?php foreach ($materi as $i => $langkah): ?>
        <li>
          <span class="titik"><?= $i + 1 ?></span>
          <div>
            <h3><?= e($langkah['judul']) ?></h3>
            <p><?= e($langkah['isi']) ?></p>
          </div>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <section class="bagian" id="faq">
    <div class="wadah">
      <h2>Pertanyaan yang sering diajukan</h2>
      <div class="faq">
        <?php foreach ($faq as $item): ?>
        <details>
          <summary><?= e($item['tanya']) ?></summary>
          <p><?= e($item['jawab']) ?></p>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bagian ajakan">
    <div class="wadah">
      <h2>Masih ragu memilih paket?</h2>
      <p>Ceritakan pengalaman menyetirmu lewat WhatsApp, kami bantu pilihkan yang paling pas.</p>
      <a class="tombol tombol-gelap" href="<?= e(linkWa($nomorWa, $pesanUmum)) ?>">Chat lewat WhatsApp</a>
    </div>
  </section>

</main>

<footer class="kaki gelap">
  <div class="wadah">
    <p>&copy; <?= date('Y') ?> <?= e($namaBrand) ?></p>
    <p>Halaman contoh untuk latihan. Semua isinya hanya placeholder.</p>
  </div>
</footer>

<div class="bar-bawah gelap">
  <a class="tombol tombol-utama" href="<?= e(linkWa($nomorWa, $pesanUmum)) ?>">Chat lewat WhatsApp</a>
</div>

</body>
</html>