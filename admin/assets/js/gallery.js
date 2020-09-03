$(document).ready(function() {
    $('#add_button').click(function() {
        $('#gallery_form')[0].reset();
        $('#action').val("Dodaj");
        $('#operation').val("Dodaj");
    });

    let dataTable = $('#gallery_data').DataTable({
        "processing":true,
        "serverSide": true,
        "autoWidth": false,
        "order": [],
        "ajax": {
            url: "php_assets/gallery_function/gallery_function.php",
            type: "POST"
        },
        "columnDefs": [{
        "targets": [0, 3, 4],
        "orderable": false,
        }, ],
        "language": {
        "lengthMenu": "Prikaži _MENU_ firmi po strani",
            "zeroRecords": "Ništa nije pronađeno",
            "info": "Prikazana strana _PAGE_ od _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Pretraži _MAX_ od svih upisa)",
            "loadingRecords": "Učitavanje...",
            "processing": "Učitavanje",
            "search": "Pretraga:",
            "paginate": {
            "first": "Prvi",
                "last": "Poslednji",
                "next": "->",
                "previous": "<-"
        },
    },

    });

    const $galleryForm = $('#gallery_form')
    let validator = void(0)

    if ($galleryForm.length) {
        validator = $galleryForm.validate({
            rules: {
                txt_title: {
                    required: true,
                },
                image: {
                    required: true
                }

            },
            messages: {
                txt_title: {
                    required: 'Unesite naslov',
                },
                image: {
                    required: "Izaberi fajl"
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: "php_assets/gallery_function/gallery_func.php",
                    method: 'POST',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    cache: false,
                    xhrFields: {
                        withCredentials: true
                    },
                    crossDomain: true,
                    success: function(data) {
                        let objResp = JSON.parse(data);
                        let str = objResp.type;
                        if (str === "invalid"){
                            $("#err").html("Invalid File !").fadeIn();
                        }
                        if (str === "valid"){
                            $("#preview").html(data).fadeIn();
                            $("#gallery_form")[0].reset();
                        }

                        if (str === 'ERROR') {
                            str = objResp.data;
                            swal({
                                title: "Greška",
                                text: str,
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                title: "Uspešno",
                                text: str,
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "success"
                            });
                            $('#gallery_form')[0].reset();
                            $('#exampleModalCenter').modal('hide');
                            dataTable.ajax.reload();
                        }

                    }, error: function (e) {
                        $("#err").html(e).fadeIn();
                    }
                })
            }
        })
    }


    NUMBER_CONTROL_INPUT = function(e) {
        let value = e.value
        if (!value) return;
        const globalRegex = RegExp('^[0-9]+$', 'g');
        if (!globalRegex.test(value)) {
            e.value = ''
            return
        }
        $(e).valid()
    }



    $(document).on('click', '#dismiss-modal, button[data-dismiss="modal"]', function() {
        validator.resetForm();
    })


    $(document).on('click', '.update', function() {
        let gallery_id = $(this).attr("id");
        $.ajax({
            url: "php_assets/gallery_function/gallery_fetch_single.php",
            method: "POST",
            data: { gallery_id: gallery_id },
            dataType: "json",
            success: function(data) {
                $('#exampleModalCenter').modal('show');
                $('#txt_title').val(data.title);
                $('.modal-title').text("Izmeni");
                $('#gallery_id').val(gallery_id);
                $('#action').val("Promeni");
                $('#operation').val("Promeni");
            }
        })
    });



    $(document).on('click', '.delete', function() {
        let gallery_id = $(this).attr("id");
        swal({
            title: "Da li ste sigurni da želite izbriste ovu firmu?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Da",
            cancelButtonText: "Ne",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: "php_assets/gallery_function/gallery_delete.php",
                method: "POST",
                data: { gallery_id: gallery_id },
                success: function(data) {
                    let objResp = JSON.parse(data);
                    let str = objResp.type;
                    if (str === 'OK') {
                        swal({
                            title: "Uspešno",
                            text: str,
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success"
                        });
                        dataTable.ajax.reload();
                    }
                }
            })

        })
    });

    $('.modal').on('shown.bs.modal', function() {
        $(this).find('[autofocus]').focus();
    });

});