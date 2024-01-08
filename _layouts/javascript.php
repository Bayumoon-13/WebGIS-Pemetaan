
    <!-- jQuery 3 -->
<script src="<?=templates()?>AdminLTE-2.4.17/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=templates()?>AdminLTE-2.4.17/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.js"></script>

<script src="<?=templates()?>AdminLTE-2.4.17/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=templates()?>AdminLTE-2.4.17/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=templates()?>AdminLTE-2.4.17/dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
 	$('table.table').DataTable();
  })
</script>

<script>
    $(document).ready(function() {
        function updateClock() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            // Menambahkan angka 0 di depan jika angka < 10
            hours = (hours < 10 ? "0" : "") + hours;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            // Mendapatkan hari dan tanggal
            var day = days[currentTime.getDay()];
            var date = currentTime.getDate();
            var month = months[currentTime.getMonth()];
            var year = currentTime.getFullYear();

            // Memperbarui waktu, hari, dan tanggal pada elemen dengan id "clock"
            $('#clock').text(hours + ":" + minutes + ":" + seconds);
            $('#date').text(day + ', ' + date + ' ' + month + ' ' + year);
        }

        // Memanggil fungsi updateClock() setiap 1 detik
        setInterval(updateClock, 1000);
    });
</script>

