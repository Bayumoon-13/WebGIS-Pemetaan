<script src="https://js.arcgis.com/4.21/"></script>
<script>
  require([
    "esri/Map",
    "esri/views/MapView",
    "esri/widgets/BasemapToggle",
    "esri/layers/ImageryLayer",
    "esri/widgets/Legend",
    "esri/widgets/Search",
    "esri/widgets/ScaleBar",
    "esri/widgets/Print",
    "esri/Graphic",
    "esri/symbols/PictureMarkerSymbol",
    "esri/widgets/Home",
    "esri/widgets/Fullscreen",
    "esri/widgets/Compass",
    "esri/widgets/Locate"
  ], function(Map, MapView, BasemapToggle, ImageryLayer, Legend, Search, ScaleBar, Print, Graphic, PictureMarkerSymbol, Home, Fullscreen, Compass, Locate) {
        var map = new Map({
            basemap: "osm" // Basemap default
        });

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "perum11_rck";
            $table_lokasi = "m_lokasi";
            $table_perumahan = "m_perumahan";
            $table_risiko = "m_risiko";

            // Buat koneksi ke database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        ?>

        var imageryLayer;

        function changeBasemap() {
            var selectedOption = document.getElementById("tampilan-peta").value;

            // Hapus lapisan peta sebelumnya
            if (imageryLayer) {
                map.remove(imageryLayer);
            }

            // Tambahkan lapisan peta baru berdasarkan pilihan
            if (selectedOption === "risiko_banjir") {
                imageryLayer = new ImageryLayer({
                url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir/ImageServer",
                opacity: 0.5
                });
            } else if (selectedOption === "risiko_banjir_bandang") {
                imageryLayer = new ImageryLayer({
                url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir_bandang/ImageServer",
                opacity: 0.5
                });
            } else if (selectedOption === "risiko_gempabumi") {
                imageryLayer = new ImageryLayer({
                url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_gempabumi/ImageServer",
                opacity: 0.5
                });
            } else if (selectedOption === "risiko_cuaca_ekstrim") {
                imageryLayer = new ImageryLayer({
                url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_cuaca_ekstrim/ImageServer",
                opacity: 0.5
                });
            } else if (selectedOption === "risiko_kekeringan") {
                imageryLayer = new ImageryLayer({
                url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_kekeringan/ImageServer",
                opacity: 0.5
                });
            }

            // Tambahkan lapisan peta baru ke dalam map
            if (imageryLayer) {
                map.add(imageryLayer);
            }
        }

        var view = new MapView({
            container: "viewDiv",
            map: map,
            center: [107.775467, -6.983360],
            zoom: 13
        });

        // Create a Search widget
        var searchWidget = new Search({
            view: view
        });

        // Add the Search widget to the top-right corner of the view
        view.ui.add(searchWidget, {
            position: "top-right"
        });

        var legend = new Legend({
        view: view
        });

        view.ui.add(legend, "bottom-right");

        // Buat BasemapToggle widget
        var basemapToggle = new BasemapToggle({
            view: view,
            nextBasemap: "satellite" // Basemap alternatif
        });

        // Tambahkan widget BasemapToggle ke dalam tampilan
        view.ui.add(basemapToggle, "bottom-left");

        // Buat ScaleBar widget
        var scaleBar = new ScaleBar({
            view: view,
            unit: "dual" 
        });

        // Tambahkan widget ScaleBar ke dalam tampilan
        view.ui.add(scaleBar, {
            position: "bottom-left"
        });

        var printWidget = new Print({
            view: view,
            printServiceUrl: "https://utility.arcgisonline.com/arcgis/rest/services/Utilities/PrintingTools/GPServer/Export%20Web%20Map%20Task"
        });

        view.ui.add(printWidget, "top-right");

        // Buat widget Home
        var homeButton = new Home({
            view: view
        });

        // Tambahkan widget Home ke dalam tampilan
        view.ui.add(homeButton, "top-left");

        // Buat widget Fullscreen
        var fullscreenButton = new Fullscreen({
            view: view
        });

        // Tambahkan widget Fullscreen ke dalam tampilan
        view.ui.add(fullscreenButton, "top-left");

        // Buat widget Locate
        var locateWidget = new Locate({
            view: view
        });

        // Tambahkan widget Locate ke dalam tampilan
        view.ui.add(locateWidget, {
            position: "top-left"
        });

        // Buat widget Compass
            var compassWidget = new Compass({
            view: view
        });

        // Tambahkan widget Compass ke dalam tampilan
        view.ui.add(compassWidget, "top-left");

        // Panggil fungsi changeBasemap saat pilihan pada menu berubah
        document.getElementById("tampilan-peta").addEventListener("change", function(event) {
            var selectedBasemap = event.target.value;
            changeBasemap(selectedBasemap);
        });

        // Panggil fungsi changeBasemap saat halaman web pertama kali dimuat
        changeBasemap("risk_banjir");


        // Panggil fungsi changeBasemap saat pilihan pada menu berubah

        <?php
        // Query untuk mengambil data lat dan lng dari tabel m_lokasi dan informasi perumahan dari tabel m_perumahan dan tabel m_risiko
        $sql = "SELECT l.id_lokasi, l.lat, l.lng, l.lokasi, p.id_perumahan, p.nm_perumahan, r.risiko_banjir, r.risiko_banjirbandang, r.risiko_gempabumi, r.risiko_cuacaekstrim, r.risiko_kekeringan  
        FROM $table_lokasi l 
        INNER JOIN $table_perumahan p ON l.id_perumahan = p.id_perumahan 
        INNER JOIN $table_risiko r ON p.id_perumahan = r.id_perumahan";

        // Query tigkatan resiko


        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "let locations = [";
            while ($row = $result->fetch_assoc()) {
                echo "{
                    id_lokasi: " . $row["id_lokasi"] . ",
                    id_perumahan: " . $row["id_perumahan"] . ",
                    lat: " . $row["lat"] . ",
                    lng: " . $row["lng"] . ",
                    lokasi: '" . $row["lokasi"] . "',
                    nm_perumahan: '" . $row["nm_perumahan"] . "',
                    risiko_banjir: '" . $row["risiko_banjir"] . "',
                    risiko_banjirbandang: '" . $row["risiko_banjirbandang"] . "',
                    risiko_gempabumi: '" . $row["risiko_gempabumi"] . "',
                    risiko_cuacaekstrim: '" . $row["risiko_cuacaekstrim"] . "',
                    risiko_kekeringan: '" . $row["risiko_kekeringan"] . "'
                },";
            }
            echo "];";
        }
        ?>
        // var marker = new Graphic({
        //     geometry: {
        //         type: "point",
        //         longitude: 107.757622,
        //         latitude: -6.964420
        //     },
        //     attributes: location,
        //     symbol: new PictureMarkerSymbol({
        //         url: "assets/images/marker/marker.png", 
        //         width: "40px", // Adjust as needed
        //         height: "40px" // Adjust as needed
        //     })
            
        // });
        // view.graphics.add(marker);
        // function removeMarker() {
        //     view.graphics.remove(marker);
        // }
        //     // Menambahkan event listener untuk tombol "Remove Marker"
        //     var removeButton = document.getElementById("removeButton");
        //     removeButton.addEventListener("click", removeMarker);


        // Fungsi untuk menambahkan marker perumahan ke peta
        function addPerumahanMarkers() {

            const markers = ({id_perum = null, is_reload = true, risiko = null})=>{  
                let tampilanPeta = document.getElementById("tampilan-peta").value;
                console.log(tampilanPeta    )
                let selectedOptionRisiko = document.getElementById("tingkatan-resiko").value;
                if(id_perum === null && is_reload === false){
                    for (var i = 0; i < locations.length; i++) {
                    var location = locations[i];
                    var marker = new Graphic({
                        geometry: {
                            type: "point",
                            longitude: location.lng,
                            latitude: location.lat
                        },
                        attributes: location,
                        symbol: new PictureMarkerSymbol({
                            url: "assets/images/marker/marker.png", 
                            width: "40px", // Adjust as needed
                            height: "40px" // Adjust as needed
                        })
                    });
                    view.graphics.add(marker)
                    marker.popupTemplate = {
                        title: "{nm_perumahan}",
                        content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                    };
                }
                }


                for (var i = 0; i < locations.length; i++) {
                    var location = locations[i];
                        var marker = new Graphic({
                            geometry: {
                                type: "point",
                                longitude: location.lng,
                                latitude: location.lat
                            },
                            attributes: location,
                            symbol: new PictureMarkerSymbol({
                                url: "assets/images/marker/marker.png", 
                                width: "40px", // Adjust as needed
                                height: "40px" // Adjust as needed
                            })
                        });
                        if (id_perum === null){
                            if (is_reload === true){
                                view.graphics.removeAll(marker)
                            }else{
                                if (location.risiko_banjir === risiko){
                                    console.log('semua untuk ->', risiko ,location.risiko_banjir)
                                    view.graphics.add(marker)
                                    marker.popupTemplate = {
                                        title: "{nm_perumahan}",
                                        content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                                    };
                                }
                            }
                            return
                        }

                        // Tampilkan peta berdasarkan select yang di pilih
                        if (location.id_perumahan === id_perum && location.risiko_banjir === risiko && tampilanPeta === "risiko_banjir"){
                            console.log("resiko dan marker")
                            if (is_reload === true){
                                view.graphics.removeAll(marker)
                            }else{
                                view.graphics.add(marker)
                                marker.popupTemplate = {
                                    title: "{nm_perumahan}",
                                    content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                                };
                                return
                            }
                            return
                        }else{
                            view.graphics.removeAll(marker)
                        }

                        // Tampilkan peta berdasarkan select yang di pilih
                        if (location.id_perumahan === id_perum && location.risiko_banjirbandang === risiko && tampilanPeta === "risiko_banjir_bandang"){
                            
                            if (is_reload === true){
                                view.graphics.removeAll(marker)
                            }else{
                                view.graphics.add(marker)
                                marker.popupTemplate = {
                                    title: "{nm_perumahan}",
                                    content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                                };
                                return
                            }
                            return
                        }else{
                            view.graphics.removeAll(marker)
                        }

                        // Tampilkan peta berdasarkan select yang di pilih
                        if (location.id_perumahan === id_perum && location.risiko_gempabumi === risiko && tampilanPeta === "risiko_gempabumi"){
                            
                            if (is_reload === true){
                                view.graphics.removeAll(marker)
                            }else{
                                view.graphics.add(marker)
                                marker.popupTemplate = {
                                    title: "{nm_perumahan}",
                                    content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                                };
                                return
                            }
                            return
                        }else{
                            view.graphics.removeAll(marker)
                        }

                        // Tampilkan peta berdasarkan select yang di pilih
                        if (location.id_perumahan === id_perum && location.risiko_cuacaekstrim === risiko && tampilanPeta === "risiko_cuaca_ekstrim"){
                            
                            if (is_reload === true){
                                view.graphics.removeAll(marker)
                            }else{
                                view.graphics.add(marker)
                                marker.popupTemplate = {
                                    title: "{nm_perumahan}",
                                    content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                                };
                                return
                            }
                            return
                        }else{
                            view.graphics.removeAll(marker)
                        }

                        // Tampilkan peta berdasarkan select yang di pilih
                        if (location.id_perumahan === id_perum && location.risiko_kekeringan === risiko && tampilanPeta === "risiko_kekeringan"){
                            
                            if (is_reload === true){
                                view.graphics.removeAll(marker)
                            }else{
                                view.graphics.add(marker)
                                marker.popupTemplate = {
                                    title: "{nm_perumahan}",
                                    content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                                };
                                return
                            }
                            return
                        }else{
                            view.graphics.removeAll(marker)
                        }
                        // if(location.risiko_banjir === risiko && id_perum === 'all'){
                        //     console.log()
                        //     if (is_reload === true){
                        //         view.graphics.removeAll(marker)
                        //     }else{
                        //         view.graphics.add(marker)
                        //         marker.popupTemplate = {
                        //             title: "{nm_perumahan}",
                        //             content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                        //         };
                        //         return
                        //     }
                        //     return
                        // }

                        
                }
            }

            let isSelected = false
            document.getElementById("nama-perumahan").addEventListener("change", function(event) {
                let selectedOption = event.target.value;
                let selectResiko = document.getElementById("tingkatan-resiko").value;
                console.log(selectResiko)
                if(selectedOption === 'all'){
                    markers({id_perum:null, is_reload:true, risiko:null})
                    markers({id_perum:null, is_reload:false, risiko:selectResiko})
                    // markers({id_perum:selectedOption, is_reload:true}) // Reload
                    // markers({id_perum:null, is_reload:false})
                }else{
                    // selectedOption = parseInt(event.target.value);
                    // markers({id_perum:selectedOption, is_reload:true}) // Reload
                    // if (selectedOption){
                    //     isSelected = true
                    //     markers({id_perum:selectedOption, is_reload:false})
                        
                    // }
                    let idPerum =parseInt(selectedOption)
                    isSelected = true
                    // tingkatanResiko(selectResiko);
                    markers({id_perum:idPerum, is_reload:true, risiko:selectResiko}) 
                    markers({id_perum:idPerum, is_reload:false, risiko:selectResiko})
                }
            })
            

            // document.getElementById("tingkatan-resiko").addEventListener("change", function(event) {
            //     let selectedOptionPerum = document.getElementById("nama-perumahan").value;
            //     var selectResiko = event.target.value;
            //     if (selectResiko === "all"){
            //         markers({id_perum:null, is_reload:true, risiko:null})
            //         markers({id_perum:null, is_reload:false, risiko:null})
            //     }else{
            //         let idPerum =parseInt(selectedOptionPerum)
            //         isSelected = true
            //         // tingkatanResiko(selectResiko);
            //         markers({id_perum:idPerum, is_reload:true, risiko:selectResiko}) 
            //         markers({id_perum:idPerum, is_reload:false, risiko:selectResiko})
            //     }
            // });



            if (isSelected === false){markers({id_perum:null, is_reload:false})}
            
        }


        // Panggil fungsi untuk menambahkan marker perumahan ke peta
        addPerumahanMarkers()
    });
</script>    