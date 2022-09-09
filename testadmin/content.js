$(document).ready(function () {
    getContent();

    // Tombol 'Edit Content'
    $(document).on("click",'#btnEdit',function(){
        $('#titleModal').html('Edit Content');
        var contentId = $(this).data('contentid');
        $('#tempId').val(contentId);
        $.ajax({
            type: 'GET',
            url: '_php/action.php',
            data: {
                req: 'pengarang'
            },
            dataType: 'json',
            success: function (response) {
                let select;
                $.each(response, function (i, r) {
                    select += `<option value="${r.id}">${r.nama}</option>`
                })
                $('#id_pengarang').html(select);
            }
        })

        $.ajax({
            type: 'GET',
            url: '_php/action.php',
            data: {
                req: 'penerbit'
            },
            dataType: 'json',
            success: function (response) {
                let select;
                $.each(response, function (i, r) {
                    select += `<option value="${r.id}">${r.nama}</option>`
                })
                $('#id_penerbit').html(select);
            }
        })
        
        $.ajax({
            type: 'GET',
            url: '_php/action.php',
            data : {
                id: contentId,
                req: 'edit'
            },
            dataType: 'json',
            success: function (response){
                $.each(response, function (i, r) {
                    $("#output").attr("src",'images/' + r.image);
                    $('#title').val(r.title);
                    $('#content').val(r.content);
                    $('#id_pengarang').val(r.pengarang);
                    $('#id_penerbit').val(r.penerbit);
                })
            }
        })
     });


    // Tombol 'Add Content'
    $('#btnNew').click(function () {
        $('#formAddContent').trigger('reset');
        $("#output").attr("src",'images/book.png');                   
        $('#titleModal').html('Add Content');
        $('#addModal').show();
        $.ajax({
            type: 'GET',
            url: '_php/action.php',
            data: {
                req: 'pengarang'
            },
            dataType: 'json',
            success: function (response) {
                let select;
                $.each(response, function (i, r) {
                    select += `<option value="${r.id}">${r.nama}</option>`
                })
                $('#id_pengarang').html(select);
            }
        })

        $.ajax({
            type: 'GET',
            url: '_php/action.php',
            data: {
                req: 'penerbit'
            },
            dataType: 'json',
            success: function (response) {
                let select;
                $.each(response, function (i, r) {
                    select += `<option value="${r.id}">${r.nama}</option>`
                })
                $('#id_penerbit').html(select);
            }
        })
    })


    // Delete Content
    $(document).on("click",'#btnDelete',function(){
        var contentId = $(this).data('contentid');
        $.ajax({
            type: 'POST',
            url: 'php_control/deleteContent.php',
            data: {
                id:contentId
            },
            success: function (response) {
                if (response == 1) {
                    alert('Delete Content Successful ');
                    getContent();
                    
                } else {
                    alert('Failed Delete Content !')
                    getContent();
                }
            }
        })
    })

    

    // Insert New Content
    $('#btnSubmit').click(function () {
        if($('#titleModal').html() == 'Add Content'){
            const formData = new FormData(document.getElementById('formAddContent'));
            const image = $('#contentImage')[0].files;
            $.ajax({
                type: 'POST',
                url: 'php_control/addContent.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        alert('Success Insert New Content');
                        getContent();
                        $('#btnCloseModal').click();
                        
                    } else {
                        alert('Failed Insert New Content!')
                        getContent();
                        $('#btnCloseModal').click();
                    }
                    $('#formAddContent').trigger('reset');
                }
            })
        }
        // Edittt
        else if($('#titleModal').html() == 'Edit Content'){
            const formData = new FormData(document.getElementById('formAddContent'));
            const image = $('#contentImage')[0].files;
            $.ajax({
                type: 'POST',
                url: 'php_control/updateContent.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        alert('Success Update Content');
                        getContent();
                        $('#btnCloseModal').click();
                        
                    } else {
                        alert('Failed Update Content!')
                        getContent();
                        $('#btnCloseModal').click();
                    }
                    $('#formAddContent').trigger('reset');
                }
            })
        }
    })

    // Populate tabel buku
    function getContent() {
        $.ajax({
            type: "GET",
            url: "_php/action.php",
            data: {
                req: 'rows'
            },
            dataType: "json",
            success: function (response) {
                var table;
                $.each(response, function (i, r) {
                    table += `
                    <tr>
                    <td>${r.id}</td>
                    <td>${r.title}</td>
                    <td>${r.content}</td>
                    <td>
                        <div>
                            <img src="images/${r.image}" width="100" height="150">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addModal" 
                        data-contentid="${r.id}" id="btnEdit">
                            <i class="fas fa-edit"></i>Edit</button>
                        <button class="btn btn-danger" data-contentid="${r.id}" id="btnDelete">
                            <i class="fas fa-trash"></i>Delete</button>
                        </button>
                    </td>
                </tr>`
                })
                $('tbody').html(table);
            }
        })
    }
})