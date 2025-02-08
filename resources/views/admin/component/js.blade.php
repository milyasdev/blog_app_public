<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<!--Plugins-->
<script src="{{ asset('assets/js/jquery.js')}}"></script>
<script src="{{ asset('assets/js/plugins.js')}}"></script>
<script src="{{ asset('assets/js/functions.js')}}"></script>
<script src='{{ asset('assets/plugins/datatables/datatables.min.js')}}'></script>
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            buttons: [{
                extend: 'print',
                title: 'Test Data export',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'pdf',
                title: 'Test Data export',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'excel',
                title: 'Test Data export',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'csv',
                title: 'Test Data export',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'copy',
                title: 'Test Data export',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }]
        });
        table.buttons().container().appendTo('#export_buttons');
        $("#export_buttons .btn").removeClass('btn-secondary').addClass('btn-light');
    });
</script>
