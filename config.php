<?php
    session_start();
    if (!isset($_SESSION['dich_vu'])) {
        $_SESSION['dich_vu'] = [
            'goi_nha_hang' => [],
            'ao_cuoi' => [],
            'goi_chup_anh' => [],
        ];
    }
    $conn = mysqli_connect("localhost","root","","tiec_cuoi");
    mysqli_set_charset($conn, "utf8");

    function isAdmin() {
        return isset($_SESSION['tai_khoan']);
    }

    function drawAdminIcon($href, $icon, $size = '13', $class = '') {
        if (isAdmin())
            return
                "<a href='$href'>
                    <i class='material-icons $class' style='font-size: $size;'>$icon</i>
                </a>";
        else
            return '';
    }

    function drawAdminButton($href, $text, $icon = '', $icon_size = '13', $button_class = '', $text_class = '') {
        if (isAdmin()) {
            return
                "<a href='$href'>
                    <button class='btn $button_class'>
                    <div class='d-flex align-items-center'>
                        <i class='material-icons $text_class' style='font-size: $icon_size'>$icon</i>
                        <span class='$text_class' style='font-size: $icon_size'>$text</span>
                    </div>
                    </button>
                </a>";
        }
        else
            return '';
    }
?>