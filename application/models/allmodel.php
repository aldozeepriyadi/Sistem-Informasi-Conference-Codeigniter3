<?php
class allmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    private $user = "user";
    private $tablebook = "prosidingbook";
    private $bobot = "bobotnilai";
    private $event = "event";
    private $subevent = "subevent";
    private $notif = "notifikasi";
    private $payment = "payment";

    //LOGIN
    public function getByUsernamePassword()
    {
        $post1 = $this->input->post();
        $email = $post1["email"];
        $password = $post1["password"];
        $array = array('email' => $email, 'password' => $password);
        $query = $this->db->get_where($this->user, $array);
        return $query->row();
    }
    // REGISTER
    function register($email, $password, $namaUser, $address, $instance, $phone, $gender, $role, $kategori, $lasteducation)
    {
        $data_user = array(
            'email' => $email,
            'namaUser' => $namaUser,
            'role' => $role,
            'password' => $password,
            'kategori' => $kategori,
            'lasteducation' => $lasteducation,
            'address' => $address,
            'instance' => $instance,
            'phone' => $phone,
            'gender' => $gender

        );
        $this->db->insert('user', $data_user);
    }

    public function UbahStatusNotif($id)
    {

        $data = array(
            'status' => 'Tidak Aktif',
        );

        $where = array(
            'IdNotif' => $id
        );

        $this->db->where($where);
        return $this->db->update($this->notif, $data);
    }

    //DASHBOARD SA
    public function getJumlahNotif()
    {
        $uid = $this->session->userdata('IdUser');
        $sql = "SELECT COUNT(IdNotif) as jumlah FROM notifikasi WHERE IdUser = '$uid' AND status='Aktif'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function getNotif()
    {
        $uid = $this->session->userdata('IdUser');
        $sql = "SELECT * FROM notifikasi WHERE IdUser = '$uid' AND status='Aktif' ORDER BY IdNotif DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function countAdmin()
    {
        $query = $this->db->query("SELECT * FROM user WHERE role='Admin'");
        return $query->num_rows();
    }

    public function countAuthor()
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT(detailauthor.IdUser)) AS Author FROM detailauthor JOIN abstrak ON detailauthor.IdAbstrak = abstrak.IdAbstrak JOIN event ON abstrak.IdEvent=event.IdEvent WHERE event.statusEvent='Aktif'");
        return $query->result();
    }

    public function countAuthorAdmin()
    {
        $uname = $this->session->userdata('IdEvent');
        $query = $this->db->query("SELECT COUNT(DISTINCT(detailauthor.IdUser)) AS jml FROM detailauthor JOIN abstrak ON detailauthor.IdAbstrak = abstrak.IdAbstrak JOIN event ON abstrak.IdEvent=event.IdEvent WHERE event.IdEvent='$uname'");
        return $query->result();
    }

    public function countReviewer()
    {
        $uidd = $this->session->userdata('IdUser');
        $query = $this->db->query("SELECT * FROM user WHERE role='Reviewer'");
        return $query->num_rows();
    }

    public function countEventAktif()
    {
        $query = $this->db->query("SELECT * FROM event WHERE statusEvent='Aktif'");
        return $query->num_rows();
    }

    public function countKarya()
    {
        $uidd = $this->session->userdata('IdEvent');
        $query = $this->db->query("SELECT * FROM abstrak WHERE IdEvent='$uidd' AND reviewedby IS NULL ");
        return $query->num_rows();
    }

    public function countKode()
    {
        $uidd = $this->session->userdata('IdEvent');
        $query = $this->db->query("SELECT * FROM abstrak WHERE IdEvent='$uidd' AND statusDistribusi = 'Perlu kodepaper' ");
        return $query->num_rows();
    }
    //DASHBOARD A
    public function countAbstrak()
    {
        $uidd = $this->session->userdata('IdEvent');
        $query = $this->db->query("SELECT * FROM abstrak JOIN event ON abstrak.IdEvent = event.IdEvent JOIN user ON event.IdEvent = user.IdEvent WHERE event.IdEvent='$uidd'");
        return $query->num_rows();
    }
    public function countFullpaper()
    {
        $uidd = $this->session->userdata('IdEvent');
        $query = $this->db->query("SELECT * FROM fullpaper JOIN abstrak ON fullpaper.IdAbstract = abstrak.IdAbstrak JOIN event ON abstrak.IdEvent = event.IdEvent JOIN user ON event.IdEvent = user.IdEvent WHERE event.IdEvent='$uidd'");
        return $query->num_rows();
    }

    //DASHBOARD P
    public function countAbstrakOK()
    {
        $uidd = $this->session->userdata('IdUser');
        $query = $this->db->query("SELECT COUNT(abstrak.IdAbstrak) AS jmlAOK
        FROM detailabstrak JOIN abstrak ON detailabstrak.IdAbstrak=abstrak.IdAbstrak
        WHERE IdDetailAbs IN (
            SELECT MAX(IdDetailAbs)
            FROM detailabstrak
            GROUP BY IdAbstrak
        ) AND detailabstrak.statusKarya='Diterima' AND abstrak.submittedby='$uidd';");
        return $query->result();
    }

    public function countAbstrakR()
    {
        $uidd = $this->session->userdata('IdUser');
        $query = $this->db->query("SELECT COUNT(DISTINCT(abstrak.IdAbstrak)) AS jmlAOR
        FROM detailabstrak JOIN abstrak ON detailabstrak.IdAbstrak=abstrak.IdAbstrak
        WHERE  IdDetailAbs IN (
            SELECT MAX(IdDetailAbs)
            FROM detailabstrak
            GROUP BY IdAbstrak
        ) AND detailabstrak.statusKarya LIKE 'Revisi%' AND abstrak.submittedby='$uidd';");
        return $query->result();
    }

    public function countFppR()
    {
        $uidd = $this->session->userdata('IdUser');
        $query = $this->db->query("SELECT COUNT(DISTINCT(fullpaper.IdFullpaper)) AS jmlFR
        FROM detailfpp JOIN fullpaper ON detailfpp.IdFullpaper=fullpaper.IdFullpaper
        WHERE detailfpp.statusKaryaFpp LIKE 'Revisi%' AND fullpaper.submittedby='$uidd';");
        return $query->result();
    }

    public function countfppOK()
    {
        $uidd = $this->session->userdata('IdUser');
        $query = $this->db->query("SELECT COUNT(fullpaper.IdFullpaper) AS jmlFOK
        FROM detailfpp JOIN fullpaper ON detailfpp.IdFullpaper=fullpaper.IdFullpaper
        WHERE IdDetailFpp IN (
            SELECT MAX(IdDetailFpp)
            FROM detailfpp
            GROUP BY IdFullpaper
        ) AND detailfpp.statusKaryaFpp='Diterima' AND fullpaper.submittedby='$uidd';");
        return $query->result();
    }

    //DASHBOARD R
    public function countAbstrakReview()
    {
        $uidd = $this->session->userdata('IdUser');
        $query = $this->db->query("SELECT COUNT(abstrak.IdAbstrak) AS jmlA FROM abstrak JOIN event ON abstrak.IdEvent = event.IdEvent
        WHERE abstrak.reviewedby = '$uidd' AND event.statusEvent='Aktif'");
        return $query->result();
    }

    public function countFullpaperReview()
    {
        $uidd = $this->session->userdata('IdUser');
        $query = $this->db->query("SELECT COUNT(fullpaper.IdFullpaper) AS jmlF FROM fullpaper JOIN abstrak ON fullpaper.IdAbstract=abstrak.IdAbstrak JOIN event ON abstrak.IdEvent = event.IdEvent
        WHERE fullpaper.reviewedbyFpp = '$uidd' AND event.statusEvent='Aktif'");
        return $query->result();
    }

    //DASHBOARD F
    public function countJmlUang()
    {
        $query = $this->db->query("SELECT SUM(payment.TotalPayment) AS JML FROM payment JOIN abstrak ON abstrak.IdAbstrak = payment.IdAbstract JOIN event ON abstrak.IdEvent=event.IdEvent WHERE event.statusEvent='Aktif' AND payment.statusPayment='Diterima'");
        return $query->result();
    }

    public function countJmlTrs()
    {
        $query = $this->db->query("SELECT COUNT(payment.IdPayment) AS JMLp FROM payment JOIN abstrak ON abstrak.IdAbstrak = payment.IdAbstract JOIN event ON abstrak.IdEvent=event.IdEvent WHERE event.statusEvent='Aktif' ");
        return $query->result();
    }

    //ABSTRAK
    public function getDataEventAbstra()
    {
        $query = $this->db->query("select nameEvent, IdEvent from event where statusEvent='Aktif'");

        return $query->result();
    }

    public function getDataEventAbstrak()
    {
        $query = $this->db->query("select nameEvent, tanggalAkhir, IdEvent from event where statusEvent='Aktif'");

        return $query->result();
    }

    public function getEventCard($id)
    {
        $array = array('IdEvent' => $id);
        $query = $this->db->get_where($this->event, $array);
        return $query->row();
    }
    function userGetById($params)
    {
        $query = "SELECT detailauthor.jenisAuthor, detailauthor.namaUser AS detailnama, detailauthor.email AS detailemail, detailauthor.instance AS detailinstance, detailauthor.phone AS detailphone, detailauthor.kategori AS detailkategori, detailauthor.lasteducation AS detailedu, user.namaUser, user.email, user.instance, user.phone, user.kategori, user.lasteducation FROM abstrak join detailauthor on abstrak.IdAbstrak = detailauthor.IdAbstrak left join user on user.IdUser=detailauthor.IdUser where abstrak.IdAbstrak=? ";
        return $this->db->query($query, $params)->result_array();
    }
    public function getDataAbstrak()
    {
        $uname = $this->session->userdata('IdUser');
        $sql1 = "SELECT abstrak.title, event.nameEvent, abstrak.topic, abstrak.KataKunci, detailabstrak.statusKarya, abstrak.statusDistribusi, abstrak.deadlineRevisi, detailabstrak.abstract,  detailabstrak.keterangan,abstrak.reviewedby AS reviewedbyID, abstrak.IdAbstrak, user.namaUser AS submittedby, u.namaUser AS reviewedby, a.namaUser AS modifiedby, payment.statusPayment
        FROM detailabstrak JOIN abstrak ON abstrak.IdAbstrak = detailabstrak.IdAbstrak JOIN event ON abstrak.IdEvent = event.IdEvent JOIN user ON abstrak.submittedby = user.IdUser LEFT JOIN user u ON abstrak.reviewedby = u.IdUser LEFT JOIN user a ON abstrak.modifiedby = a.IdUser LEFT JOIN payment on abstrak.IdAbstrak = payment.IdAbstract
        WHERE IdDetailAbs IN (
            SELECT MAX(IdDetailAbs)
            FROM detailabstrak
            GROUP BY IdAbstrak
        ) AND abstrak.submittedby = '$uname' order by case when detailabstrak.statusKarya IS NULL THEN 1 ELSE 0 END, FIELD(detailabstrak.statusKarya, 'Revisi','Diterima','Ditolak', 'Sudah Direvisi','NULL');";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function getDataAbstrakDiterima()
    {
        $uname = $this->session->userdata('IdUser');
        $sql1 = "SELECT * FROM abstrak JOIN detailauthor ON abstrak.IdAbstrak = detailauthor.IdAbstrak join user on detailauthor.IdUser = user.IdUser join event on abstrak.IdEvent=Event.IdEvent join detailabstrak on abstrak.IdAbstrak=detailabstrak.IdAbstrak left join payment on abstrak.IdAbstrak = payment.IdAbstract WHERE abstrak.submittedby = '$uname' AND detailabstrak.statusKarya='Diterima' order by case when payment.statusPayment IS NULL THEN 1 ELSE 0 END, FIELD(payment.statusPayment, 'Ditolak','Diterima', 'Menunggu Konfirmasi','NULL')";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function getHistoryAbstrak()
    {
        $uname = $this->session->userdata('IdUser');
        $sql1 = "SELECT * FROM abstrak WHERE abstrak.reviewedby = '$uname' ";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function viewHistoryAbstrak($id)
    {
        $sql1 = "SELECT * FROM detailabstrak WHERE detailabstrak.IdAbstrak = '$id' AND statusKarya IS NOT NULL ";
        $query1 = $this->db->query($sql1);

        return $query1->result();
    }
    //FULLPAPER
    public function getDataAbstrakOK()
    {
        $uname = $this->session->userdata('IdUser');
        $sql1 = "SELECT * FROM authorkarya JOIN abstrak ON authorkarya.IdAbstrak = abstrak.IdAbstrak join event on abstrak.IdEvent=Event.IdEvent WHERE abstrak.submittedby = '$uname' AND abstrak.statusKarya='Diterima' GROUP BY abstrak.IdAbstrak";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function getHistoryFullpaper()
    {
        $uname = $this->session->userdata('IdUser');
        $sql1 = "SELECT * FROM fullpaper join abstrak on fullpaper.IdAbstract = abstrak.IdAbstrak WHERE reviewedbyFpp = '$uname' ";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function viewHistoryFpp($id)
    {
        $sql1 = "SELECT * FROM detailfpp WHERE IdFullpaper = '$id' AND statusKaryaFpp IS NOT NULL ";
        $query1 = $this->db->query($sql1);

        return $query1->result();
    }

    public function getDataFullpaper()
    {
        $uname = $this->session->userdata('IdUser');
        $sql1 = "SELECT abstrak.IdAbstrak, abstrak.title, detailabstrak.statusKarya,abstrak.reviewedby, abstrak.topic,abstrak.statusDistribusi, r.namaUser AS reviewedbyFpp, fullpaper.statusDistribusiFpp, detailfpp.statusKaryaFpp, detailfpp.modifieddateFpp, fullpaper.deadlineRevisiFpp, event.IdEvent,  event.nameEvent,abstrak.KataKunci, detailfpp.PresentationFile, detailfpp.FullpaperFile, detailfpp.VideoLink, detailabstrak.abstract, fullpaper.IdFullpaper,detailfpp.keteranganFpp, user.namaUser AS submittedby, m.namaUser AS modifiedby, r.namaUser AS reviewedby 
        FROM detailfpp RIGHT JOIN fullpaper ON detailfpp.IdFullpaper = fullpaper.IdFullpaper JOIN
        abstrak ON abstrak.IdAbstrak = fullpaper.IdAbstract JOIN detailabstrak ON abstrak.IdAbstrak = detailabstrak.IdAbstrak JOIN event ON abstrak.IdEvent = event.IdEvent
        JOIN user ON fullpaper.submittedby = user.IdUser LEFT JOIN user m ON fullpaper.modifiedby = m.IdUser JOIN user r ON fullpaper.reviewedbyFpp = r.IdUser
        WHERE IdDetailFpp IN (
            SELECT MAX(IdDetailFpp)
            FROM detailfpp
            GROUP BY IdFullpaper
        ) AND abstrak.submittedby = '$uname' AND detailabstrak.statusKarya='Diterima' OR fullpaper.statusDistribusiFpp='Belum mengumpulkan' AND detailabstrak.statusKarya='Diterima'
        GROUP BY fullpaper.IdFullpaper order by case when detailabstrak.statusKarya IS NULL THEN 1 ELSE 0 END, FIELD(detailfpp.statusKaryaFpp, 'Revisi','Diterima','Ditolak', 'Sudah Direvisi','NULL');";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function getFullpaper()
    {
        $uid = $this->session->userdata('IdUser');
        $sql = "SELECT fullpaper.IdFullpaper, fullpaper.statusDistribusiFpp, abstrak.IdAbstrak, abstrak.title, abstrak.topic, abstrak.reviewedby, detailfpp.statusKaryaFpp, event.nameEvent, abstrak.KataKunci, detailabstrak.abstract, detailfpp.PresentationFile, detailfpp.FullpaperFile, detailfpp.VideoLink,detailfpp.keteranganFpp
        FROM detailfpp JOIN fullpaper ON detailfpp.IdFullpaper = fullpaper.IdFullpaper JOIN abstrak ON abstrak.IdAbstrak = fullpaper.IdAbstract JOIN detailabstrak ON abstrak.IdAbstrak = detailabstrak.IdAbstrak JOIN event ON event.IdEvent=abstrak.IdEvent
        WHERE IdDetailFpp IN (
            SELECT MAX(IdDetailFpp)
            FROM detailfpp
            GROUP BY IdFullpaper
        ) AND fullpaper.reviewedbyFpp = '$uid' AND fullpaper.statusDistribusiFpp = 'Proses Review' AND detailabstrak.statusKarya = 'Diterima';
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //EVENT
    public function getAll2()
    {

        $this->db->from($this->event);
        $this->db->order_by("IdEvent", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllcard()
    {
        $sql = "SELECT * FROM event
        WHERE statusEvent = 'Aktif'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function editEvent($poster)
    {

        $post = $this->input->post();
        $data = array(
            'nameEvent' => $this->input->post('nameEventE'),
            'theme' => $this->input->post('themeE'),
            'topic' => $this->input->post('topicE'),
            'poster' => $poster,
            'tanggalAkhir' => $this->input->post('tanggalAkhirE'),
            'tanggalAwal' => $this->input->post('tanggalAwalE'),
            'biaya' => $this->input->post('biayaE'),
            'kategori' => $this->input->post('kategoriE'),
        );

        $where = array(
            'IdEvent' => $this->input->post('IdEventE')
        );


        $this->db->where($where);
        return $this->db->update($this->event, $data);
    }

    public function saveNotifA()
    {
        $post = $this->input->post();
        $this->IdUser = $post["rbE"];
        $this->message = $post["pesanA"];
        $this->status = 'Aktif';

        return $this->db->insert($this->notif, $this);
    }

    public function saveNotifE()
    {
        $post = $this->input->post();
        $this->IdUser = $post["sbE"];
        $this->message = $post["pesanA"];
        $this->status = 'Aktif';
        return $this->db->insert($this->notif, $this);
    }


    public function saveEvent($poster)
    {
        $post = $this->input->post();
        $this->nameEvent = $post["nameEvent"];
        $this->theme = $post["theme"];
        $this->topic = $post["topic"];
        $this->poster = $poster;
        $this->tanggalAkhir = $post["tanggalAkhir"];
        $this->tanggalAwal = $post["tanggalAwal"];
        $this->statusEvent = "Aktif";
        $this->biaya = $post["biaya"];
        $this->kategori = $post["kategori"];

        return $this->db->insert($this->event, $this);
    }

    public function getEventByAdmin()
    {
        $uid = $this->session->userdata('IdUser');
        $sql = "SELECT * FROM user JOIN event ON user.IdEvent = event.IdEvent
                WHERE user.IdUser = '$uid'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->subevent, array("IdSubEvent" => $id));
    }

    public function getEventTanggal()
    {

        $uid = $this->session->userdata('IdEvent');
        $sql = "SELECT subevent.IdSubEvent,subevent.ketegori, subevent.tanggalAwal, subevent.tanggalAkhir, subevent.status FROM subevent JOIN event ON subevent.IdEvent = event.IdEvent WHERE subevent.IdEvent = '$uid' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function editTanggalEvent()
    {

        $post = $this->input->post('statusE');
        if ($post != 1) {
            $data = array(
                'ketegori' => $this->input->post('ketegoriE'),
                'tanggalAwal' => $this->input->post('tanggalAwalE'),
                'tanggalAkhir' => $this->input->post('tanggalAkhirE'),
                'IdEvent' => $this->input->post('IdEvent'),
            );
        } else if ($post == 1) {
            $data = array(
                'ketegori' => $this->input->post('ketegoriE'),
                'tanggalAwal' => $this->input->post('tanggalAwalE'),
                'tanggalAkhir' => $this->input->post('tanggalAkhirE'),
                'IdEvent' => $this->input->post('IdEvent'),
                'status' => $this->input->post('statusE'),
            );
        }


        $where = array(
            'IdSubEvent' => $this->input->post('IdSubE')
        );

        $this->db->where($where);
        return $this->db->update($this->subevent, $data);
    }

    public function deleteData($idEvent)
    {

        $data = array(
            'statusEvent' => 'Tidak Aktif',
        );

        $where = array(
            'IdEvent' => $idEvent
        );

        $this->db->where($where);
        return $this->db->update($this->event, $data);
    }

    public function saveTanggal()
    {
        $post = $this->input->post();
        $this->ketegori = $post["ketegori"];
        $this->tanggalAwal = $post["tanggalAwal"];
        $this->tanggalAkhir = $post["tanggalAkhir"];
        $this->status = $post["status"];
        $this->IdEvent = $post["IdEvent"];

        return $this->db->insert($this->subevent, $this);
    }

    //AUTHOR
    public function getAllAuthor()
    {
        $tahun1 = date("Y");
        $sql1 = "SELECT abstrak.title, detailauthor.jenisAuthor, detailauthor.namaUser AS detailnama, detailauthor.email AS detailemail, detailauthor.instance AS detailinstance, detailauthor.phone AS detailphone, detailauthor.kategori AS detailkategori, detailauthor.lasteducation AS detailedu, user.namaUser, user.email, user.instance, user.phone, user.kategori, user.lasteducation FROM abstrak join detailauthor on abstrak.IdAbstrak = detailauthor.IdAbstrak left join user on user.IdUser=detailauthor.IdUser JOIN event ON abstrak.IdEvent = event.IdEvent WHERE YEAR(event.tanggalakhir) = '$tahun1' ";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    //USER

    public function getAll()
    {
        $sqlUser = "SELECT user.IdUser, user.namaUser AS nama, user.email, user.phone, user.role, event.nameEvent, user.IdEvent FROM user LEFT JOIN event ON user.IdEvent = event.IdEvent WHERE user.instance LIKE '%Astra%' AND user.kategori = 'Dosen' ";
        $queryUser = $this->db->query($sqlUser);

        return $queryUser->result();
    }

    public function getDataEvent()
    {
        $query = $this->db->query("SELECT * FROM event WHERE statusEvent='Aktif'");
        return $query->result();
    }

    public function edituser()
    {
        $roles = $this->input->post('role');

        if ($roles == "Admin") {
            $data = array(
                'role' => $this->input->post('role'),
                'IdEvent' => $this->input->post('IdEvent')
            );

            $where = array(
                'IdUser' => $this->input->post('IdUser'),
            );

            $this->db->where($where);
            return $this->db->update($this->user, $data);
        } else if ($roles == "Reviewer") {
            $data = array(
                'role' => $this->input->post('role'),
                'IdEvent' => $this->input->post('IdEvent')
            );

            $where = array(
                'IdUser' => $this->input->post('IdUser'),
            );

            $this->db->where($where);
            return $this->db->update($this->user, $data);
        } else {
            $data = array(
                'role' => "Peserta",
                'IdEvent' => null
            );

            $where = array(
                'IdUser' => $this->input->post('IdUser'),
            );

            $this->db->where($where);
            return $this->db->update($this->user, $data);
        }
    }

    //BOBOT NILAI
    public function getAllBobotNilai()
    {
        $query = $this->db->query("SELECT * FROM bobotnilai WHERE statusBobot='Aktif'");

        return $query->result();
    }

    public function editBobotNilai()
    {

        $post = $this->input->post();
        $data = array(
            'assessmentCriteria' => $this->input->post('assessmentCriteriaE'),
            'value' => $this->input->post('valueE'),
            'statusBobot' => 'Aktif',
        );

        $where = array(
            'IdBobot' => $this->input->post('IdRatingE')
        );

        $this->db->where($where);
        return $this->db->update($this->bobot, $data);
    }

    public function deleteDataBobotNilai($IdBobot)
    {
        $data = array(
            'statusBobot' => 'Tidak Aktif',
        );

        $where = array(
            'IdBobot' => $IdBobot
        );

        $this->db->where($where);
        return $this->db->update($this->bobot, $data);
    }

    public function saveBobotNilai()
    {
        $post = $this->input->post();
        $this->assessmentCriteria = $post["assessmentCriteria"];
        $this->value = $post["value"];
        $this->statusBobot = 'Aktif';

        return $this->db->insert($this->bobot, $this);
    }

    //UPLOAD PROSIDING
    public function getprosiding()
    {
        $tahun = date("Y");
        $sql = "SELECT pb.idProsiding, pb.year, e.nameEvent, pb.title, e.topic, pb.ProsidingFile, pb.ProsidingImg
                FROM prosidingbook pb
                LEFT JOIN event e ON  pb.IdEvent = e.IdEvent
                WHERE pb.year = '$tahun'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function countProsiding()
    {
        $tahun = date("Y");
        $query = $this->db->query("SELECT * FROM prosidingbook WHERE year='$tahun'");
        return $query->num_rows();
    }

    public function saveProsiding($data)
    {
        return $this->db->insert($this->tablebook, $data);
    }

    //PEMETAAN
    public function getDistribusiKarya()
    {
        $sql = "SELECT * FROM abstrak JOIN event ON abstrak.IdEvent = event.IdEvent join detailabstrak on abstrak.IdAbstrak = detailabstrak.IdAbstrak
                WHERE abstrak.statusDistribusi = 'Berhasil Dikumpulkan' AND abstrak.reviewedby IS NULL AND detailabstrak.keterangan IS NULL";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    public function getAllDistribusiKarya()
    {
        $uid = $this->session->userdata('IdEvent');
        $sql = "SELECT abstrak.IdAbstrak, abstrak.title, abstrak.topic,  abstrak.submittedby AS submittedbyID, abstrak.reviewedby AS reviewedbyID, event.IdEvent, detailabstrak.statusKarya, r.namaUser AS reviewedby,fullpaper.kodepaper, abstrak.statusDistribusi,detailabstrak.modifieddate, abstrak.deadlineRevisi, user.namaUser AS submittedby, detailabstrak.abstract, payment.statusPayment
        FROM detailabstrak JOIN abstrak ON detailabstrak.IdAbstrak = abstrak.IdAbstrak JOIN event ON event.IdEvent = abstrak.IdEvent JOIN user ON abstrak.submittedby = user.IdUser LEFT JOIN user r ON abstrak.reviewedby = r.IdUser LEFT JOIN fullpaper ON abstrak.IdAbstrak = fullpaper.IdAbstract LEFT JOIN payment ON abstrak.IdAbstrak=payment.IdAbstract
        WHERE IdDetailAbs IN (
            SELECT MAX(IdDetailAbs)
            FROM detailabstrak
            GROUP BY IdAbstrak
        ) AND event.IdEvent = '$uid' order by FIELD(abstrak.statusDistribusi, 'Berhasil Dikumpulkan','Perlu kodepaper', 'Proses Review', 'Selesai Review','Berhasil submit fullpaper')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function getAllFullpaper()
    {

        $sql1 = "SELECT abstrak.IdAbstrak, detailabstrak.statusKarya,fullpaper.IdFullpaper, detailfpp.modifieddateFpp,abstrak.title, abstrak.topic, fullpaper.deadlineRevisiFpp,fullpaper.reviewedbyFpp AS reviewedbyFppID, user.namaUser AS reviewedbyFpp, fullpaper.statusDistribusiFpp, fullpaper.submittedby AS submittedbyID,fullpaper.kodepaper, detailfpp.statusKaryaFpp, s.namaUser AS submittedby,
        detailabstrak.abstract, detailfpp.PresentationFile, detailfpp.FullpaperFile,detailfpp.VideoLink
        FROM detailfpp JOIN fullpaper ON detailfpp.IdFullpaper=fullpaper.IdFullpaper JOIN abstrak ON fullpaper.IdAbstract=abstrak.IdAbstrak JOIN detailabstrak ON detailabstrak.IdAbstrak = abstrak.IdAbstrak JOIN user ON fullpaper.reviewedbyFpp = user.IdUser JOIN user s ON fullpaper.submittedby = s.IdUser
        WHERE IdDetailFpp IN (
            SELECT MAX(IdDetailFpp)
            FROM detailfpp
            GROUP BY IdFullpaper
        ) AND detailabstrak.statusKarya='Diterima' order by FIELD(fullpaper.statusDistribusiFpp, 'Proses Review', 'Selesai Review');";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function getBobotReviewer()
    {
        $sql = "SELECT COUNT(abstrak.IdAbstrak) AS JML, user.namaUser FROM abstrak join user on abstrak.reviewedby=user.IdUser GROUP BY reviewedby";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    public function getReviewer()
    {
        $sqlUser = "SELECT IdUser, namaUser  FROM user WHERE role = 'Reviewer' ";
        $queryUser = $this->db->query($sqlUser);
        // return $this->db->get($this->_table)->result();

        return $queryUser->result();
    }

    //REVIEW ABSTRAK
    public function getReviewKarya()
    {
        $uid = $this->session->userdata('IdUser');
        $sql = "SELECT abstrak.IdAbstrak, abstrak.title, abstrak.topic, r.namaUser AS reviewedby, detailabstrak.statusKarya, abstrak.statusDistribusi, detailabstrak.modifieddate,event.nameEvent, event.IdEvent, abstrak.deadlineRevisi, detailfpp.PresentationFile,detailfpp.FullpaperFile,detailfpp.VideoLink,detailabstrak.keterangan,abstrak.KataKunci, detailabstrak.abstract
        FROM detailabstrak JOIN abstrak ON detailabstrak.IdAbstrak = abstrak.IdAbstrak JOIN event ON abstrak.IdEvent = event.IdEvent JOIN user ON abstrak.submittedby = user.IdUser LEFT JOIN user m ON abstrak.modifiedby = m.IdUser LEFT JOIN user r ON abstrak.reviewedby = r.IdUser LEFT JOIN fullpaper ON fullpaper.IdAbstract = abstrak.IdAbstrak LEFT JOIN detailfpp ON fullpaper.IdFullpaper = detailfpp.IdFullpaper
        WHERE IdDetailAbs IN (
            SELECT MAX(IdDetailAbs)
            FROM detailabstrak
            GROUP BY IdAbstrak
        ) AND abstrak.reviewedby = '$uid' AND abstrak.statusDistribusi='Proses Review' GROUP BY abstrak.IdAbstrak ;";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function search_user($title)
    {
        $this->db->like('namaUser', $title, 'both');
        $this->db->order_by('namaUser', 'ASC');
        $this->db->limit(10);
        return $this->db->get('user')->result();
    }

    //PAYMENT


    public function fileImageE()
    {
        $id = $this->input->post('idabsrE');
        $foto = $_FILES['proofOfPaymentE']['name'];
        $config['upload_path'] = './images/payment/';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $add_filename_jpg = "Payment" . "-" . time() . "-" . $id . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename_jpg;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('proofOfPaymentE')) {
            $add_filename_jpg = $this->upload->data('file_name');
        }
    }

    public function editPayment()
    {
        //$this->fileImageE();
        $id = $this->input->post('idabsrE');
        $foto = $_FILES['proofOfPaymentE']['name'];
        $config['upload_path'] = './images/payment/';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $add_filename_jpg = "Payment" . "-" . time() . "-" . $id . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename_jpg;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('proofOfPaymentE')) {
            $add_filename_jpg = $this->upload->data('file_name');
            $proff = $add_filename_jpg;
        }

        $id = $this->input->post('idabsrE');
        $kode = $this->input->post('koderefE');
        $akun = $this->input->post('accountNumberE');
        $bankasal = $kode . '-' . $akun;
        $post = $this->input->post();
        $data = array(
            'nameSender' => $this->input->post('nameSenderE'),
            'accountNumber' => $bankasal,
            'TotalPayment' => $this->input->post('TotalPaymentE'),
            'proofOfPayment' => $proff,
            'IdAbstract' => $this->input->post('idabsrE'),
            'statusPayment' => 'Sudah dibayar',
        );

        $where = array(
            'IdPayment' => $this->input->post('idpE')
        );

        $this->db->where($where);
        return $this->db->update($this->payment, $data);
    }

    public function getDataAbstrakDibayar()
    {

        $sql1 = "SELECT * FROM abstrak JOIN detailauthor ON abstrak.IdAbstrak = detailauthor.IdAbstrak join user on detailauthor.IdUser = user.IdUser join event on abstrak.IdEvent=Event.IdEvent join detailabstrak on abstrak.IdAbstrak=detailabstrak.IdAbstrak join payment on abstrak.IdAbstrak = payment.IdAbstract WHERE payment.statusPayment IS NOT NULL AND detailabstrak.statusKarya='Diterima' order by case when payment.statusPayment IS NULL THEN 1 ELSE 0 END, FIELD(payment.statusPayment, 'Menunggu Konfirmasi', 'Ditolak','Diterima', 'NULL')";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function terimaData($id)
    {
        $id = $this->input->post('idpt');
        $foto = $_FILES['kwitansi']['name'];
        $config['upload_path'] = './file/kwitansi/';
        $config['allowed_types'] = 'pdf';
        $add_filename_jpg = "Kwitansi" . "-" . time() . "-" . $id . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename_jpg;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('kwitansi')) {
            $add_filename_jpg = $this->upload->data('file_name');
            $fotok = $add_filename_jpg;
        }

        $idpt = $this->input->post('idpt');
        $uid = $this->session->userdata('IdUser');
        $data = array(
            'statusPayment' => 'Diterima',
            'IdUser' => $uid,
            'dateConfirmation' => date("Y-m-d h:i:sa"),
            'kwitansi' => $fotok,
        );

        $where = array(
            'IdPayment' => $id
        );

        $this->db->where($where);
        return $this->db->update($this->payment, $data);
    }

    public function edittolak()
    {
        $uid = $this->session->userdata('IdUser');
        $data = array(
            'statusPayment' => 'Ditolak',
            'reason' => $this->input->post('reason'),
            'IdUser' => $uid,
            'dateConfirmation' => date("Y-m-d h:i:sa"),
        );

        $where = array(
            'IdPayment' => $this->input->post('idpt')
        );

        $this->db->where($where);
        return $this->db->update($this->payment, $data);
    }

    //KWITANSI
    public function getDataAllKwitansi($id)
    {
        $params = [$id];
        $sql = "SELECT p.IdPayment, p.TotalPayment, p.proofOfPayment, p.nameSender, p.accountNumber, p.dateConfirmation, p.statusPayment, u.namaUser, a.title as judul_abstrak
                FROM payment p 
                LEFT JOIN user u ON u.IdUser = p.IdUser
                LEFT JOIN abstrak a ON a.IdAbstrak= p.IdAbstract
                Where a.IdAbstrak = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();

            return $result;
        } else {
            return array();
        }
    }

    public function getDataBuktiKwitansi($id)
    {
        $params = [$id];
        $sql = "SELECT p.kwitansi 
                FROM payment p 
                LEFT JOIN user u ON u.IdUser = p.IdUser
                LEFT JOIN abstrak a ON a.IdAbstrak= p.IdAbstract
                Where a.IdAbstrak = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();

            return $result;
        } else {
            return array();
        }
    }

    public function getDatakwitansi()
    {
        $sql = "SELECT * 
                FROM payment p 
                LEFT JOIN user u ON u.IdUser = p.IdUser
                LEFT JOIN abstrak a ON a.IdAbstrak = p.IdAbstract";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();

            return $result;
        } else {
            return array();
        }
    }

    //REPORT
    public function getReportFullpaper()
    {

        $sql1 = "SELECT abstrak.IdAbstrak, fullpaper.IdFullpaper, detailfpp.modifieddateFpp,abstrak.title, abstrak.topic, fullpaper.deadlineRevisiFpp,event.nameEvent, fullpaper.reviewedbyFpp AS reviewedbyFppID, user.namaUser AS reviewedbyFpp, fullpaper.statusDistribusiFpp, fullpaper.submittedby AS submittedbyID,fullpaper.kodepaper, detailfpp.statusKaryaFpp, s.namaUser AS submittedby,
        detailabstrak.abstract, detailfpp.PresentationFile, detailfpp.FullpaperFile,detailfpp.VideoLink
        FROM detailfpp JOIN fullpaper ON detailfpp.IdFullpaper=fullpaper.IdFullpaper JOIN abstrak ON fullpaper.IdAbstract=abstrak.IdAbstrak JOIN detailabstrak ON detailabstrak.IdAbstrak = abstrak.IdAbstrak JOIN user ON fullpaper.reviewedbyFpp = user.IdUser JOIN user s ON fullpaper.submittedby = s.IdUser JOIN event ON event.IdEvent = abstrak.IdEvent
        WHERE IdDetailFpp IN (
            SELECT MAX(IdDetailFpp)
            FROM detailfpp
            GROUP BY IdFullpaper
        ) AND fullpaper.kodepaper IS NOT NULL GROUP BY fullpaper.kodepaper";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }

    public function getReportAbstrak()
    {

        $sql1 = "SELECT abstrak.IdAbstrak, abstrak.title, abstrak.topic,event.nameEvent, user.namaUser,detailabstrak.abstract
        FROM  abstrak JOIN detailabstrak ON detailabstrak.IdAbstrak = abstrak.IdAbstrak JOIN event ON event.IdEvent = abstrak.IdEvent JOIN user On abstrak.reviewedby = user.IdUser
        WHERE IdDetailAbs IN (
            SELECT MAX(IdDetailAbs)
            FROM detailabstrak
            GROUP BY IdAbstrak
        ) AND detailabstrak.statusKarya = 'Diterima'";
        $query1 = $this->db->query($sql1);


        return $query1->result();
    }



    public function getReportPayment()
    {
        $sql1 = "SELECT SUM(payment.TotalPayment) AS JUMLAH, event.nameEvent, abstrak.title, abstrak.topic, user.kategori, payment.statusPayment, payment.TotalPayment FROM abstrak JOIN event ON abstrak.IdEvent=event.IdEvent JOIN payment ON abstrak.IdAbstrak=payment.IdAbstract JOIN detailauthor ON abstrak.IdAbstrak=detailauthor.IdAbstrak JOIN user ON detailauthor.IdUser = user.IdUser
        WHERE payment.statusPayment = 'Diterima' AND detailauthor.jenisAuthor = 'Author 1'";
        $query1 = $this->db->query($sql1);
        return $query1->result();
    }

    public function get_sum_sudah()
    {
        $sql = "SELECT COUNT(abstrak.IdAbstrak) AS udah FROM abstrak JOIN event ON abstrak.IdEvent=event.IdEvent JOIN payment ON abstrak.IdAbstrak=payment.IdAbstract JOIN detailauthor ON abstrak.IdAbstrak=detailauthor.IdAbstrak JOIN user ON detailauthor.IdUser = user.IdUser JOIN detailabstrak ON abstrak.IdAbstrak = detailabstrak.IdAbstrak 
        WHERE payment.statusPayment = 'Diterima' AND detailabstrak.statusKarya='Diterima'";

        return $this->db->query($sql)->row();
    }

    public function get_sum_belum_konfir()
    {
        $sql = "SELECT COUNT(abstrak.IdAbstrak) AS konfir FROM abstrak JOIN event ON abstrak.IdEvent=event.IdEvent JOIN payment ON abstrak.IdAbstrak=payment.IdAbstract JOIN detailauthor ON abstrak.IdAbstrak=detailauthor.IdAbstrak JOIN user ON detailauthor.IdUser = user.IdUser JOIN detailabstrak ON abstrak.IdAbstrak = detailabstrak.IdAbstrak 
        WHERE payment.statusPayment = 'Sudah dibayarkan' AND detailabstrak.statusKarya='Diterima'";

        return $this->db->query($sql)->row();
    }

    public function get_sum_belum_bayar()
    {
        $sql = "SELECT COUNT(abstrak.IdAbstrak) AS blm FROM abstrak JOIN event ON abstrak.IdEvent=event.IdEvent JOIN payment ON abstrak.IdAbstrak=payment.IdAbstract JOIN detailauthor ON abstrak.IdAbstrak=detailauthor.IdAbstrak JOIN user ON detailauthor.IdUser = user.IdUser JOIN detailabstrak ON abstrak.IdAbstrak = detailabstrak.IdAbstrak 
        WHERE payment.statusPayment IS NULL AND detailabstrak.statusKarya='Diterima'";

        return $this->db->query($sql)->row();
    }

    public function chartdb()
    {
        $query = $this->db->query("SELECT 
        COUNT(*) as JmlPeserta, 
        SUM(CASE WHEN payment.statusPayment = 'Diterima' THEN 1 ELSE 0 END) as SdhByr,
        (COUNT(*) -  SUM(CASE WHEN payment.statusPayment = 'Diterima' THEN 1 ELSE 0 END)) as BlmByr
    FROM 
        payment 
        RIGHT JOIN abstrak ON abstrak.IdAbstrak = payment.IdAbstract JOIN event ON event.IdEvent=abstrak.IdEvent JOIN detailabstrak ON abstrak.IdAbstrak = detailabstrak.IdAbstrak
        WHERE IdDetailAbs IN (
                SELECT MAX(IdDetailAbs)
                FROM detailabstrak
                GROUP BY IdDetailAbs
            ) AND detailabstrak.statusKarya='Diterima'
    group by event.IdEvent");
        return $query->result();
    }
}
