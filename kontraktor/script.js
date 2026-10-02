// 1. Menu di layar HP: buka/tutup saat tombol "Menu" diklik
const menuBtn = document.getElementById("menuBtn");
const nav = document.getElementById("nav");

menuBtn.addEventListener("click", () => {
  const open = nav.classList.toggle("open");
  menuBtn.setAttribute("aria-expanded", String(open));
});
nav.addEventListener("click", (e) => {
  if (e.target.tagName === "A") {
    nav.classList.remove("open");
    menuBtn.setAttribute("aria-expanded", "false");
  }
});

// 2. Pilihan kebutuhan: klik chip untuk memilih/membatalkan
document.getElementById("chips").addEventListener("click", (e) => {
  const chip = e.target.closest(".chip");
  if (!chip) return;
  const on = chip.getAttribute("aria-pressed") === "true";
  chip.setAttribute("aria-pressed", String(!on));
});

// 3. Form: cek isian wajib, lalu tampilkan ringkasan (belum dikirim ke server)
const form = document.getElementById("quoteForm");
const status = document.getElementById("status");
const wajib = { nama: "Nama wajib diisi.", instansi: "Nama perusahaan atau instansi wajib diisi.", kontak: "Isi email atau nomor WhatsApp." };

form.addEventListener("submit", (e) => {
  e.preventDefault(); // cegah halaman reload
  let valid = true;

  for (const [name, pesan] of Object.entries(wajib)) {
    const input = form.elements[name];
    const err = form.querySelector(`.err[data-for="${name}"]`);
    const kosong = input.value.trim() === "";
    input.setAttribute("aria-invalid", String(kosong));
    err.textContent = kosong ? pesan : "";
    if (kosong) valid = false;
  }

  if (!valid) {
    status.textContent = "Lengkapi isian yang ditandai merah.";
    return;
  }

  const dipilih = [...document.querySelectorAll('.chip[aria-pressed="true"]')].map((c) => c.textContent);
  const kebutuhan = dipilih.length ? dipilih.join(", ") : "belum dipilih";
  status.textContent = `Terima kasih, ${form.elements.nama.value.trim()}. Permintaan (${kebutuhan}) tercatat. Ini contoh, belum dikirim ke server.`;
  form.reset();
  document.querySelectorAll(".chip").forEach((c) => c.setAttribute("aria-pressed", "false"));
});

// 4. Tahun otomatis di footer
document.getElementById("year").textContent = new Date().getFullYear();
