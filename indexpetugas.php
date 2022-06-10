<?php
SESSION_START();

require 'config/functions.php';

if(!isset($_SESSION['username'], $_SESSION['password']))
{
   echo "<script>alert('Anda harus login');</script>";
   echo "<script>location='login/loginpetugas.php';</script>";
}
else
{
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Data Keluhan Masyarakat</title>

        <link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="asset/css/local.css" />

        <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="asset/bootstrap/js/bootstrap.min.js"></script>

        <!-- you need to include the shieldui css and js assets in order for the charts to work -->
        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
        <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    </head>
    <body>
        <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?page=beranda&fitur=aktif">Petugas</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="?page=beranda&fitur=aktif"><i class="fa fa-bullseye"></i> Home</a></li>
                    <li><a href="?page=masyarakat&fitur=list"><i class="fa fa-user-circle"></i> Masyarakat</a></li>
                    <li><a href="?page=tanggapan&fitur=list"><i class="fa fa-server"></i> Tanggapan</a></li>
                    <li><a href="?page=pengaduan&fitur=list"><i class="fa fa-server"></i> Pengaduan</a></li>
                    <li><a href="logout/logoutpetugas.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> van </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Selamat datang di Home Petugas</h1>
                </div>
            </div>

            <?php
            $page = $_GET['page'];
            $fitur = $_GET['fitur'];

            if($page == "beranda"){
                if($fitur == "aktif"){
                    include "beranda/home2.php";
                }
            }else if ($page == "masyarakat"){
                if($fitur == "list"){
                    include'petugas/masyarakat/listmasyarakat.php';
                }else if ($fitur == "pesan"){
                    include'petugas/masyarakat/tambahmasyarakat.php';
                }else if ($fitur == "edit"){
                    include'petugas/masyarakat/ubahmasyarakat.php';
                }else if ($fitur == "hapus"){
                    include'petugas/masyarakat/hapusmasyarakat.php';
                }
            }else if ($page == "tanggapan"){
                if($fitur == "list"){
                    include'petugas/tanggapan/listtanggapan.php';
                }else if ($fitur == "pesan"){
                    include'petugas/tanggapan/tambahtanggapan.php';
                }else if ($fitur == "edit"){
                    include'petugas/tanggapan/ubahtanggapan.php';
                }else if ($fitur == "hapus"){
                    include'petugas/tanggapan/hapustanggapan.php';
                }
            }else if($page == "pengaduan"){
                if($fitur == "list"){
                    include'petugas/pengaduan/listpengaduan.php';
                }else if ($fitur == "pesan"){
                    include'petugas/pengaduan/tambahpengaduan.php';
                }else if ($fitur == "edit"){
                    include'petugas/pengaduan/ubahpengaduan.php';
                }else if ($fitur == "hapus"){
                    include'petugas/pengaduan/hapuspengaduan.php';
                }
            }else if($page == "detailpengaduan"){
                if($fitur == "list"){
                    include'petugas/detailpengaduan/listdetailpengaduan.php';
                }else if ($fitur == "pesan"){
                    include'petugas/detailpengaduan/tambahdetailpengaduan.php';
                }else if ($fitur == "ubah"){
                    include'petugas/detailpengaduan/ubahdetailpengaduan.php';
                }else if ($fitur == "hapus"){
                    include'petugas/detailpengaduan/hapusdetailpengaduan.php';
                }
            }else if($page == "detailpengaduan"){
                if($fitur == "pesan"){
                    include'Admin/detailpengaduanpetugas.php';
                }
            }
            ?>


            <script type="text/javascript">
                jQuery(function ($) {
                    var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                    visits = [123, 323, 443, 32],
                    traffic = [
                    {
                        Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
                    },
                    {
                        Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
                    },
                    {
                        Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
                    },
                    {
                        Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
                    },
                    {
                        Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
                    }];


                    $("#shieldui-chart1").shieldChart({
                        theme: "dark",

                        primaryHeader: {
                            text: "Visitors"
                        },
                        exportOptions: {
                            image: false,
                            print: false
                        },
                        dataSeries: [{
                            seriesType: "area",
                            collectionAlias: "Q Data",
                            data: performance
                        }]
                    });

                    $("#shieldui-chart2").shieldChart({
                        theme: "dark",
                        primaryHeader: {
                            text: "Traffic Per week"
                        },
                        exportOptions: {
                            image: false,
                            print: false
                        },
                        dataSeries: [{
                            seriesType: "pie",
                            collectionAlias: "traffic",
                            data: visits
                        }]
                    });

                    $("#shieldui-grid1").shieldGrid({
                        dataSource: {
                            data: traffic
                        },
                        sorting: {
                            multiple: true
                        },
                        rowHover: false,
                        paging: false,
                        columns: [
                        { field: "Source", width: "170px", title: "Source" },
                        { field: "Amount", title: "Amount" },                
                        { field: "Percent", title: "Percent", format: "{0} %" },
                        { field: "Target", title: "Target" },
                        ]
                    });            
                });        
            </script>

        </div>
    </div>
</body>
</html>
<?php 
}
?>