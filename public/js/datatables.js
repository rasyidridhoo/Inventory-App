$(document).ready(function () {
    $("#dataTable").DataTable({
        search: {
            caseInsensitive: true, // Sesuaikan dengan preferensi Anda
            regex: true,
            smart: false,
        },
        language: {
            searchPlaceholder: "Cari data disini...", // Teks untuk placeholder kotak pencarian
        },
    });
});
