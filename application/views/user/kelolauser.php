<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kelola User</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardSA'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola User</li>
                </ol>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="dropdown">
                                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="text">
                                            <h6 class="user-dropdown-name font"><?php echo $this->session->userdata('namaUser'); ?></h6>
                                            <p class="user-dropdown-status text-sm text-muted"><?php echo $this->session->userdata('role'); ?></p>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                        <li><a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Data User
            </div>
            <div class="card-body">
                <?php
                if ($this->session->flashdata('errorUser') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('errorUser');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('successUser') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('successUser');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                ?>
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                No Telpon
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Event
                            </th>
                            <th hidden="true">
                                IdEvent
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($user as $u) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?php echo $u->nama ?>
                                </td>
                                <td>
                                    <?php echo $u->email ?>
                                </td>
                                <td>
                                    <?php echo $u->phone ?>
                                </td>
                                <td>
                                    <label id="roleevent<?php echo $u->IdUser ?>"><?php echo $u->role ?></label>
                                </td>
                                <td>
                                    <?php echo $u->nameEvent ?>
                                </td>
                                <td hidden="true">
                                    <label id="idevent<?php echo $u->IdUser ?>"><?php echo $u->IdEvent ?></label>

                                </td>
                                <td>
                                    <button type="button" value="<?php echo $u->IdUser ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#editData" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kelola Jabatan"><i class="bi bi-person-fill-gear"></i> </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<div class="modal fade text-left" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Form Kelola Jabatan User</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?php echo base_url('user/edituser') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="IdUser" name="IdUser" readonly>
                    <label>Event </label>
                    <div class="input-group">
                        <select class="form-select" name="IdEvent" id="IdEvent" required>
                            <option value="" selected>-- Pilih Event --</option>
                            <option value="0">Seluruh Event</option>
                            <?php
                            foreach ($getDataEvent as $row) {
                                echo '<option value="' . $row->IdEvent . '">' . $row->nameEvent . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class='form-group mandatory'>
                        <label class="form-label">
                            Role
                        </label>
                        <div class="input-group">
                            <select class="form-select" name="role" id="role" required>
                                <option value="" selected>-- Pilih Role --</option>
                                <option value="Peserta">Peserta</option>
                                <option value="Reviewer">Reviewer</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button id="submit" type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    function senddata(value) {

        var idevent = document.getElementById('idevent' + value);
        var editidevent = document.getElementById('IdEvent');
        editidevent.value = idevent.innerHTML;
        console.log(idevent.innerHTML);

        var roleevent = document.getElementById('roleevent' + value);
        var editroleevent = document.getElementById('role');
        editroleevent.value = roleevent.innerHTML;

        var editiduser = document.getElementById('IdUser');
        editiduser.value = value;
    }

    $(document).ready(function() {
        $('#example').DataTable({
            scrollY: 280,
            scrollX: true,
        });
    });
</script>