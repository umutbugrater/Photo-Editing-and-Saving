<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php 
        if (isset($_POST["gonder"]))
        {
            $source = $_FILES["resim"]["tmp_name"];
            $destination =  "C:/xampp/htdocs/WEB_Görüntü_İşleme/".$_FILES["resim"]["name"];
            copy($source, $destination);

            if ($_POST["genislik"] !="" and $_POST["yükseklik"] !=""){
                $command = 'python boyutlandir.py '.$_FILES['resim']['name'].'  '.$_POST['genislik'].' '.$_POST['yükseklik'];
                $output = shell_exec($command);
                #echo "<img src='".$_FILES['resim']['name']."'>";
            }
            if(!empty($_POST['dondur'])) {
                $dondurmeAcisi = $_POST['dondur'];
                $command = 'python dondurme.py '.$_FILES['resim']['name'].'  '.$dondurmeAcisi;
                $output = shell_exec($command);
                #echo "<img src='".$_FILES['resim']['name']."'>";
            }
            if(!empty($_POST['cevir'])) {
                $cevirme = $_POST['cevir'];
                $command = 'python cevirme.py '.$_FILES['resim']['name'].'  '.$cevirme;
                $output = shell_exec($command);
                #echo "<img src='".$_FILES['resim']['name']."'>";
            }
            if ($_POST["x1"] !="" and $_POST["x2"] !="" and $_POST["y1"] !="" and $_POST["y2"] !="" ){
                $command = 'python kirpma.py '.$_FILES['resim']['name'].'  '.$_POST['x1'].' '.$_POST['x2'].'  '.$_POST['y1'].' '.$_POST['y2'];
                $output = shell_exec($command);
            }
            echo "<img src='".$_FILES['resim']['name']."'>";

        }
    ?>
    <form method="post" action="" enctype="multipart/form-data">
        <div>
            <hr />
            <div class="container">
                <div class="row">
                    <div class="md-8">
                        <label for="formFile" class="form-label">Resim Yükle</label>
                        <input class="form-control" type="file" name="resim">
                    </div>
                </div>

                <br>
                
                <h4>BOYUT</h4>
                <div class="row">
                    <div class="col-md-6">
                        <H6>Genişlik</H6>
                        <input type="number" class="form-control" name="genislik" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="col-md-6">
                        <h6>Yükseklik</h6>
                        <input type="number" class="form-control" name="yükseklik" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <br>
                <h4>DÖNDÜRME</h4>
                <label><h6>Saatin tersi yönde kaç derece döndürmek istersiniz</h6></label>
                <select class="form-select" name="dondur">
                        <option selected disabled>SEÇ...</option>
                        <option value="90" >90</option>
                        <option value="180" >180</option>
                        <option value="270" >270</option>
                </select>

                <br>
                <h4>ÇEVİRME</h4>
                <select class="form-select" name="cevir">
                        <option selected disabled>SEÇ...</option>
                        <option value="1" >Yatay Çevir</option>
                        <option value="2" >Dikey Çevir</option>
                        <option value="3" >Her İki Yönde Çevir</option>
                </select>

                <br>

                <h4>KIRPMA</h4>
                <div class="row">
                <img src="./Adsız.png" width="350" height="500">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <H6>X1</H6>
                        <input type="number" min=0 value=0 class="form-control" name="x1" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="col-md-3">
                        <h6>X2</h6>
                        <input type="number" min=0 value=0 class="form-control" name="x2" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="col-md-3">
                        <H6>Y1</H6>
                        <input type="number" min=0 value=0 class="form-control" name="y1" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="col-md-3">
                        <h6>Y2</h6>
                        <input type="number" min=0 value=0 class="form-control" name="y2" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>


                <br>

                <div>
                    <button type="submit" class="btn btn-outline-primary" name="gonder">Kaydet</button>
                </div>
            </div>
            <hr />
        </div>
    </form>
   
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>