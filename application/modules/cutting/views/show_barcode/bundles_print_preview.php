<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Reprint Bundle For Cutting</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <//?php $this->load->view('_partials/css.php'); ?>     -->
    <style>
        .title {
            font-weight: bold;
            font-size: 18pt;
        }

        .td-padding {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .centered {
            text-align: center;
            padding-bottom: 10px;
            page-break-inside: avoid;

        }

        .lefted {
            text-align: left;
            padding-bottom: 5px;
            page-break-inside: avoid;
        }

        body {
            width: 100%;
            height: 100%;
            font: 12pt "Tahoma";
            margin: 0;
            padding: 0;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        thead {
            display: table-header-group;
        }

        @page {
            /* size: 105mm 297mm; */
            /* size: 210mm 297mm; */
            size: 210mm 330mm;
            /* margin-left: 15mm; */
            /* margin: 5mm 5mm 5mm 5mm; */
            /* margin: 4mm; */
            /* width: 210mm;
            height: 330mm; */
        }

        /* @media print{
            @page {
                size: 210mm 330mm;
            }
        } */

        /* @page:first{
            margin-top: 4mm;
        } */

        table {
            page-break-inside: avoid;
            margin: 5px;
        }

        thead {
            display: table-header-group;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>


    <table id="mainTable" cellspacing="40">
        <thead>
            <th id="headerGanjil" width="40%"></th>
            <th id="headerGenap" width="40%"></th>
        </thead>
    </table>


    <!-- <script src="</?= base_url(); ?>/assets/js/pace.min.js"></script> -->
    <script>
        // window.print();
        $(document).ready(function() {
            var dataPrint = JSON.parse(localStorage.getItem("selectedRows"));
            var mold = "";
            var prefix = "";
            var evenOdd;

            function createBundleBarcode(itm, part, partLabel, even) {
                var theData = "";

                theData += '<table style="border: 1px solid black;" >';
                theData += '<tr>';
                theData += '<td colspan="4" class="centered title">';
                theData += partLabel + '</td></tr>';

                theData += '<thead><tr><th></th><th></th><th></th><th></th></tr></thead>';

                theData += '<tr>';
                theData += '<td class="td-padding lefted">BUYER</td>';
                theData += '<td class="td-padding lefted">:</td>';
                theData += '<td class="td-padding lefted">' + itm.buyer.toString() + '</td>';
                theData += '<td class="td-padding lefted" width="100px" rowspan="6">';
                theData += '<table>'
                theData += '<tr class="qrCodeku">';
                theData += `<td><p class="qrText">${itm.orc} ; ${itm.style} ; ${itm.color} ; ${itm.size} ; ${itm.qty_pcs} ; ${itm.kode_barcode} ; ${itm.no_bundle}</p></td>`;
                theData += '</tr>'
                theData += '</table>'
                theData += '</td>';
                theData += '</tr>';

                theData += '<tr>';
                theData += '<td class="td-padding lefted">WO</td>';
                theData += '<td class="td-padding lefted">:</td>';
                theData += '<td class="td-padding lefted">' + itm.work_order.toString() + '</td>';
                theData += '</tr>';

                theData += '<tr>';
                theData += '<td class="td-padding lefted">COLOR</td>';
                theData += '<td class="td-padding lefted">:</td>';
                theData += '<td class="td-padding lefted">' + itm.color.toString() + '</td>';
                theData += '</tr>';

                theData += '<tr>';
                theData += '<td class="td-padding lefted">STYLE</td>';
                theData += '<td class="td-padding lefted">:</td>';
                theData += '<td class="td-padding lefted">' + itm.style.toString() + '</td>';
                theData += '</tr>';

                theData += '<tr>';
                theData += '<td class="td-padding lefted">SIZE</td>';
                theData += '<td class="td-padding lefted">:</td>';
                theData += '<td class="td-padding lefted">' + itm.size.toString() + '</td>';
                theData += '</tr>';

                theData += '<tr>';
                theData += '<td class="td-padding lefted">BUN</strong></td>';
                theData += '<td class="td-padding lefted">:</td>';
                theData += '<td class="td-padding lefted">' + itm.no_bundle.toString() + '</td>';
                theData += '</tr>';

                theData += '<tr class="barcode">';
                theData += '<td colspan="4"><p class="kode">' + part + itm.kode_barcode + '</p></td>';

                theData += '</tr></table><br/><br/><br/>';
                if (even == "ganjil") {
                    $('#headerGanjil').append(theData);

                } else if (even == "genap") {
                    $('#headerGenap').append(theData);
                }

            }

            $.each(dataPrint, function(i, item) {
                // console.log('dataPrint: ', dataPrint);
                evenOdd = i + 1;
                if (evenOdd % 2 == 1) {
                    // var x = 0;
                    if (item.cp != "")
                        createBundleBarcode(item, item.cp, "CENTER PANEL", "ganjil");

                    if (item.bw != "")
                        createBundleBarcode(item, item.bw, "BACK WINGS", "ganjil");

                    if (item.cu != "")
                        createBundleBarcode(item, item.cu, "CUPS", "ganjil");

                    if (item.as != "")
                        createBundleBarcode(item, item.as, "ASSEMBLY", "ganjil");


                } else if (evenOdd % 2 == 0) {
                    if (item.cp != "")
                        createBundleBarcode(item, item.cp, "CENTER PANEL", "genap");

                    if (item.bw != "")
                        createBundleBarcode(item, item.bw, "BACK WINGS", "genap");

                    if (item.cu != "")
                        createBundleBarcode(item, item.cu, "CUPS", "genap");

                    if (item.as != "")
                        createBundleBarcode(item, item.as, "ASSEMBLY", "genap");

                }
            });

            $('.barcode > td').each(function() {
                var text = $(this).text().trim();

                $('.kode').hide();

                var bars = $('<div class="thebars"><svg class="barcode text-center"></svg></div>').appendTo(this);
                bars.find('.barcode').JsBarcode(text, {
                    displayValue: true,
                    format: "code128",
                    height: 80
                });
            });

            $('.qrCodeku > td').each(function() {
                var qrVal = $(this).text();
                $('.qrText').hide();
                var qrs = $('<div class="theQR"><div class="qrCodeku text-center"></div></div>').appendTo(this);
                qrs.find('.qrCodeku').qrcode({
                    text: qrVal,
                    width: 200,
                    height: 200
                })
            })

        });
    </script>
</body>

</html>