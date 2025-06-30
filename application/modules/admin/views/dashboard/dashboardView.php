<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-3">

            <div class="col">
                <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden">
                    <div class="card-body">
                        <a href="<?= site_url('admin/master_quote'); ?>">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h4 class="mb-2 text-white" id="total_quote"></h4>
                                    <p class="mb-0 text-white">Total Master Quote</p>
                                </div>
                                <div class="fs-2 text-white">
                                    <i class='bx bx-book-alt'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year digital-clock"></small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4 bg-texture-wave-a">
                    <div class="card-body">
                        <a href="<?= site_url('admin/master_user'); ?>">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h4 class="mb-2 text-white" id="total_user"></h4>
                                    <p class="mb-0 text-white">Total Master User</p>
                                </div>
                                <div class="fs-2 text-white">
                                    <i class='bx bxs-user-detail'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year digital-clock"></small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden">
                    <div class="card-body">
                        <a href="<?= site_url('admin/master_line'); ?>">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h4 class="mb-2 text-white" id="total_line"></h4>
                                    <p class="mb-0 text-white">Total Master Line</p>
                                </div>
                                <div class="fs-2 text-white">
                                    <i class='bx bx-spreadsheet'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year digital-clock"></small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4 bg-gradient-moonlit bubble position-relative overflow-hidden">
                    <div class="card-body">
                        <a href="<?= site_url('admin/master_head'); ?>">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h4 class="mb-2 text-white" id="total_head"></h4>
                                    <p class="mb-0 text-white">Total Master Head</p>
                                </div>
                                <div class="fs-2 text-white">
                                    <i class='bx bx-group'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year digital-clock"></small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4 bg-texture-wave-c">
                    <div class="card-body">
                        <a href="<?= site_url('admin/master_spv'); ?>">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h4 class="mb-2 text-white" id="total_spv"></h4>
                                    <p class="mb-0 text-white">Total Master Spv</p>
                                </div>
                                <div class="fs-2 text-white">
                                    <i class='bx bx-street-view'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year digital-clock"></small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4 bg-gradient-cosmic bubble position-relative overflow-hidden">
                    <div class="card-body">
                        <a href="<?= site_url('admin/master_size'); ?>">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h4 class="mb-2 text-white" id="total_size"></h4>
                                    <p class="mb-0 text-white">Total Master Size</p>
                                </div>
                                <div class="fs-2 text-white">
                                    <i class='bx bx-ruler'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year digital-clock"></small>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        const d = new Date();
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        let date = d.getDate();
        let year = d.getFullYear();
        let month = monthNames[d.getMonth()];
        $('.year').html(date + " " + month + " " + year);


        // MASTER QUOTE
        const loadTotalMasterQuote = () => {
            $('#total_quote').empty();
            $.ajax({
                url: " <?= site_url('admin/getTotalMaster_Quote'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#total_quote").html('...');
                },
            }).done(function(data) {

                $('#total_quote').empty();
                $('#total_quote').html(data[0].total_master_quote);

            });
        }
        loadTotalMasterQuote();


        // MASTER USER
        const loadTotalMasterUser = () => {
            $('#total_user').empty();
            $.ajax({
                url: " <?= site_url('admin/getTotalMaster_User'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#total_user").html('...');
                },
            }).done(function(data) {

                $('#total_user').empty();
                $('#total_user').html(data[0].total_master_user + ' (' + data[0].total_user_aktif + ' Aktif)');

            });
        }
        loadTotalMasterUser();


        // MASTER LINE
        const loadTotalMasterLine = () => {
            $('#total_line').empty();
            $.ajax({
                url: " <?= site_url('admin/getTotalMaster_Line'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#total_line").html('...');
                },
            }).done(function(data) {

                $('#total_line').empty();
                $('#total_line').html(data[0].total_master_line + ' (' + data[0].total_line_aktif + ' Aktif)');

            });
        }
        loadTotalMasterLine();


        // MASTER HEAD
        const loadTotalMasterHead = () => {
            $('#total_head').empty();
            $.ajax({
                url: " <?= site_url('admin/getTotalMaster_Head'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#total_head").html('...');
                },
            }).done(function(data) {

                $('#total_head').empty();
                $('#total_head').html(data[0].total_master_head);

            });
        }
        loadTotalMasterHead();


        // MASTER SIZE
        const loadTotalMasterSize = () => {
            $('#total_size').empty();
            $.ajax({
                url: " <?= site_url('admin/getTotalMaster_Size'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#total_size").html('...');
                },
            }).done(function(data) {

                $('#total_size').empty();
                $('#total_size').html(data[0].total_master_size);

            });
        }
        loadTotalMasterSize();


        // MASTER SPV
        const loadTotalMasterSpv = () => {
            $('#total_spv').empty();
            $.ajax({
                url: " <?= site_url('admin/getTotalMaster_Spv'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#total_spv").html('...');
                },
            }).done(function(data) {

                $('#total_spv').empty();
                $('#total_spv').html(data[0].total_master_spv);

            });
        }
        loadTotalMasterSpv();
    })
</script>