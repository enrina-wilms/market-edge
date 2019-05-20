$(document).ready(function (){
    $('.edit-btn').on('click', function(){
        $('#editModal').modal('show');
        
        $tr = $(this).closest('tr');

        let data = $tr.children("td").map(function(){
           return $(this).text(); 
        });
        
        $('#ticker_id').val(data[0]);
        $('#edit_ticker').val(data[1]);
        $('#company').val(data[2]);
        $('#shares').val(data[3]);
        $('#price').val(data[4].slice(1, 50));
    });
    
    $('.delete-btn').on('click', function(){
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        let data = $tr.children("td").map(function(){
           return $(this).text(); 
        });

        $('#del_ticker_id').val(data[0]);
        $('#del_ticker').val(data[1]);
        $('#del_company').val(data[2]);
        $('#del_shares').val(data[3]);
        $('#del_price').val(data[4].slice(1, 50));
        //console.log(data);
    });
});

$('form.ajax').on('submit', function() {
    $(this).unbind();
    var that = $(this),
        data = {};

    that.find('[name]').each(function(index, value){
        var form = $(this),
            name = form.attr('name');
            value = form.val();
        data[name] = value;
    });
    $.ajax({
        type: 'POST',
        url: '../portfolio/addPortfolio.php',
        data: data,
        success: function (response) {
            $('#addTicker').modal('hide');
            alertify.success('Successfully Added');
        },
        error: function (response) {
            alertify.error('Something went wrong, Please try again later');
        }
    });
});