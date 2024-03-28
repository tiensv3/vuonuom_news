<!-- page-body-wrapper ends -->
</div>
<!-- plugins:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../assets/vendors/chart.js/Chart.min.js"></script>
<script src="../assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/hoverable-collapse.js"></script>
<script src="../assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- <script src="../assets/js/dashboard.js"></script> -->
<!-- End custom js for this page -->
<script src="../assets/ckeditor/ckeditor.js"></script>
<!-- <script src="../assets/ckfinder/ckfinder.js"></script> -->
<script src="../assets/js/dataTable.min.js"></script>

<script>
    $(document).ready(function() {
        $('#eventTable').DataTable({
            "columnDefs": [{
                "targets": 1,
                // Apply to columns with class "truncated-column"
                "render": function(data, type, row) {
                    if (type === 'display' && data.length > 30) {
                        return '<span title="' + data + '">' + data.substr(0, 30) +
                            '...</span>';
                    } else {
                        return data;
                    }
                }
            }]
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#newsTable').DataTable({
            "columnDefs": [{
                "targets": [1, 3],
                // Apply to columns with class "truncated-column"
                "render": function(data, type, row) {
                    if (type === 'display' && data.length > 30) {
                        return '<span title="' + data + '">' + data.substr(0, 30) +
                            '...</span>';
                    } else {
                        return data;
                    }
                }
            }]
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#dtTable1').DataTable({
            "autoWidth": true
        });
    });
</script>

<script>
    CKEDITOR.replace('textarea1');
    //   var editor = CKEDITOR.replace('textarea1');
    //   CKFinder.setupCKEditor(editor);
</script>


<script>
    CKEDITOR.replace('textarea2');

    // var editor = CKEDITOR.replace('textarea2');
    // CKFinder.setupCKEditor(editor);
</script>

<script>
    CKEDITOR.replace('textarea3');

    // var editor = CKEDITOR.replace('textarea2');
    // CKFinder.setupCKEditor(editor);
</script>


</body>

</html>