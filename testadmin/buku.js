$(document).ready(function () {
    getBooks();

    // Tombol 'Edit book'
    $(document).on("click",'#btnEdit',function(){
        $('#titleModal').html('Edit Books');
        var myBookId = $(this).data('bookid');
        $('#tempId').val(myBookId);
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
                id: myBookId,
                req: 'edit'
            },
            dataType: 'json',
            success: function (response){
                $.each(response, function (i, r) {
                    $("#output").attr("src",'images/' + r.image);
                    $('#title').val(r.judul);
                    $('#year').val(r.tahun);
                    $('#id_pengarang').val(r.pengarang);
                    $('#id_penerbit').val(r.penerbit);
                })
            }
        })
     });


    // Tombol 'Add book'
    $('#btnNew').click(function () {
        $('#formAddBook').trigger('reset');
        $("#output").attr("src",'images/book.png');                   
        $('#titleModal').html('Add Books');
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


    // Delete Book
    $(document).on("click",'#btnDelete',function(){
        var myBookId = $(this).data('bookid');
        $.ajax({
            type: 'POST',
            url: 'php_control/deleteBook.php',
            data: {
                id:myBookId
            },
            success: function (response) {
                if (response == 1) {
                    alert('Delete book successful ');
                    getBooks();
                    
                } else {
                    alert('Failed delete book !')
                    getBooks();
                }
            }
        })
    })

    

    // Insert New Books
    $('#btnSubmit').click(function () {
        if($('#titleModal').html() == 'Add Books'){
            const formData = new FormData(document.getElementById('formAddBook'));
            const image = $('#bookImage')[0].files;
            $.ajax({
                type: 'POST',
                url: 'php_control/addBook.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        alert('Success insert books');
                        getBooks();
                        $('#btnCloseModal').click();
                        
                    } else {
                        alert('Failed insert new books !')
                        getBooks();
                        $('#btnCloseModal').click();
                    }
                    $('#formAddBook').trigger('reset');
                }
            })
        }
        // Edittt
        else if($('#titleModal').html() == 'Edit Books'){
            const formData = new FormData(document.getElementById('formAddBook'));
            const image = $('#bookImage')[0].files;
            $.ajax({
                type: 'POST',
                url: 'php_control/updateBook.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        alert('Success update book');
                        getBooks();
                        $('#btnCloseModal').click();
                        
                    } else {
                        alert('Failed update book !')
                        getBooks();
                        $('#btnCloseModal').click();
                    }
                    $('#formAddBook').trigger('reset');
                }
            })
        }
    })

    // Populate tabel buku
    function getBooks() {
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
                    <td>${r.judul}</td>
                    <td>${r.tahun}</td>
                    <td>
                        <div>
                            <img src="images/${r.image}" width="100" height="150">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addModal" 
                        data-bookid="${r.id}" id="btnEdit">
                            <i class="fas fa-edit"></i>Edit</button>
                        <button class="btn btn-danger" data-bookid="${r.id}" id="btnDelete">
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