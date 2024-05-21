import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css';
import 'datatables.net-bs4/css/dataTables.bootstrap4.css';
import 'datatables.net-responsive-bs4/css/responsive.bootstrap4.css';

import $ from 'jquery';
import 'bootstrap';
import DataTable from 'datatables.net-bs4';
import 'datatables.net-responsive-bs4';


$(document).ready(function() {
    $('#mytable').DataTable({
        // responsive: true
    });
});
