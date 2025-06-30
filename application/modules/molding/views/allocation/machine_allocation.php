<style>
    .swal-wide {
        font-size: .85rem;
    }

    .sweet_loader {
        width: 140px;
        height: 140px;
        margin: 0 auto;
        animation-duration: 0.5s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        animation-name: ro;
        transform-origin: 50% 50%;
        transform: rotate(0) translate(0, 0);
    }

    @keyframes ro {
        100% {
            transform: rotate(-360deg) translate(0, 0);
        }
    }
</style>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Maachine Allocation</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="ms-auto">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <a href="<?php echo base_url('molding/addAllocation'); ?>" type="button" class="btn btn-primary"><i class='bx bx-plus-circle'></i>Allocation</a>
                        </div>
                    </div>
                </div>
                <div id="pivot-container"></div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->


<script>
    $(document).ready(function() {
        var pivot = new WebDataRocks({
            container: "#pivot-container",
            toolbar: true,
            height: 500,
            report: {
                dataSource: {
                    dataSourceType: "json",
                    data: getData()
                },
                "slice": {
                    "rows": [{
                        "uniqueName": "id_mesin_molding"
                    }],
                    "columns": [{
                            "uniqueName": "orc"
                        },
                        {
                            "uniqueName": "style"
                        }
                    ],
                }
            }
        });

        function getData() {
            $.ajax({
                type: "GET",
                url: "<?= site_url('molding/getAllocationMolding') ?>",
                dataType: "text",
                success: function(msg) {
                    pivot.setReport({
                        dataSource: {
                            data: JSON.parse(msg)
                        }
                    });
                },
                error: function(msg) {
                    console.log(msg);
                }
            });
        }
    })
</script>