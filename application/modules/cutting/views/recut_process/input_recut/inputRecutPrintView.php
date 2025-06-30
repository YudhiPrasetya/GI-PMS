<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= base_url(); ?>/assets/images/logo-gi/icon.PNG" type="image/png" />

    <!-- Bootstrap CSS -->
    <!-- <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/bootstrap-extended.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>


    <title>Print Recut Request</title>






    <style>
        .title {
            font-weight: bold;
            font-size: 18pt;
        }

        * {
            font-weight: bold;
        }


        body {
            width: 100%;
            height: 100%;
            font: 12pt "Tahoma";
            margin: 0;
            padding: 0;
            background-color: white;
        }


        @page {
            size: 65mm 100mm
        }

        /* output size */
        body.receipt .sheet {
            width: 58mm;
            height: 100mm
        }

        /* sheet size */
        @media print {
            body.receipt {
                width: 58mm
            }
        }

        /* fix for Chrome */


        hr {
            border: 3px solid black;
        }
    </style>


<body>
    <div class="row">
        <div id="mainTable"></div>
    </div>
</body>



<script>
    // window.print();
    $(document).ready(function() {
        let dataPrint = JSON.parse(localStorage.getItem("selectedRows"));
        let mold = "";
        let prefix = "";
        let evenOdd;

        const windowPrint = () => {
            window.print();
        }

        setTimeout(windowPrint, 1000);


        const createRecutRequest = (item) => {
            let theData = "";

            theData += '<table>';
            theData += '<thead>';
            theData += '<tr>';
            theData += '<th class="text-center pt-2 pb-3" colspan="3" style="font-size: 1.5em;">Recut Request</th>';
            theData += '</tr>';
            theData += '<tr>';
            if (item.sequence_number != null) {
                if (item.sequence_number < 100) {
                    if (item.sequence_number < 10) {
                        theData += '<th class="ps-3" style="font-size: 1.5em;">00' + item.sequence_number + '</th>';
                    } else {
                        theData += '<th class="ps-3" style="font-size: 1.5em;">0' + item.sequence_number + '</th>';
                    }

                } else {
                    theData += '<th class="ps-3" style="font-size: 1.5em;">' + item.sequence_number + '</th>';
                }
            }
            theData += '<th></th>';
            theData += '<th class="text-end pe-3" style="font-size: 1em;">' + item.created_date + '</th>';
            theData += '<tr>';
            theData += '</thead>';
            theData += '<tbody>';
            theData += '<tr>';
            theData += '<td class="ps-3 pt-3">Line</td>';
            theData += '<td class="px-3 pt-3">:</td>';
            theData += '<td class="pe-3 pt-3">' + item.line + '</td>';
            theData += '</tr>';
            theData += '<tr>';
            theData += '<td class="ps-3">ORC</td>';
            theData += '<td class="px-3">:</td>';
            theData += '<td class="pe-3">' + item.orc + '</td>';
            theData += '</tr>';
            theData += '<tr>';
            theData += '<td class="ps-3">Style</td>';
            theData += '<td class="px-3">:</td>';
            theData += '<td class="pe-3">' + item.style + '</td>';
            theData += '</tr>';
            theData += '<tr>';
            theData += '<td class="ps-3">Color</td>';
            theData += '<td class="px-3">:</td>';
            theData += '<td class="pe-3">' + item.color + '</td>';
            theData += '</tr>';
            theData += '<tr>';
            theData += '<td class="ps-3">Size</td>';
            theData += '<td class="px-3">:</td>';
            theData += '<td class="pe-3">' + item.size + '</td>';
            theData += '</tr>';
            // theData += '<tr>';
            // theData += '<td class="ps-3">Bundle</td>';
            // theData += '<td class="px-3">:</td>';
            // theData += '<td class="pe-3">' + item.no_bundle + '</td>';
            // theData += '</tr>';
            theData += '<tr>';
            theData += '<td class="ps-3">Part</td>';
            theData += '<td class="px-3">:</td>';
            theData += '<td class="pe-3">' + item.part_desc + '</td>';
            theData += '</tr>';
            theData += '<tr>';
            theData += '<td class="ps-3">Remarks</td>';
            theData += '<td class="px-3">:</td>';
            theData += '<td class="pe-3">' + ((item.remarks != null) ? item.remarks : '-') + '</td>';
            theData += '</tr>';
            theData += '<tr>';
            theData += '<td class="ps-3 pb-3">Qty</td>';
            theData += '<td class="px-3 pb-3">:</td>';
            theData += '<td class="pe-3 pb-3">' + item.qty + '</td>';
            theData += '</tr>';
            theData += '</table>';
            theData += '<hr>';

            $('#mainTable').append(theData);
        }

        $.each(dataPrint, function(i, item) {
            console.log(dataPrint);
            createRecutRequest(item);
        });


    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<!-- <script src="<?= base_url(); ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> -->


<!--app JS-->
<!-- <script src="<?= base_url(); ?>/assets/js/app.js"></script> -->



</html>