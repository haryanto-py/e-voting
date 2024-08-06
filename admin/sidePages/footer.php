                <footer class="py-4 bg-light mt-5">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="./assets/assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/datatables-simple-demo.js"></script>
        
        <script>
        var ctx = document.getElementById("myBarChart");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ["Sudah Memilih", "Belum Memilih"],
            datasets: [{
                label: "Jumlah Peserta",
                backgroundColor: ["rgba(2,117,216,1)", "rgba(255,0,0,1)"],
                borderColor: ["rgba(2,117,216,1)", "rgba(255,0,0,1)"],
                data: [<?php echo $jumlahSuaraMasuk; ?>, <?php echo $jumlahBelumMemilih; ?>],
            }],
            },
            options: {
            scales: {
                xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 2
                }
                }],
                yAxes: [{
                ticks: {
                    min: 0,
                    max: <?php echo max($jumlahSuaraMasuk, $jumlahBelumMemilih); ?>,
                    maxTicksLimit: 5
                },
                gridLines: {
                    display: true
                }
                }],
            },
            legend: {
                display: false
            }
            }
        });
        </script>
    </body>
</html>
