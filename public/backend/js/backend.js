
$(function () {
    $(".example1").DataTable();
    $('.example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
});
// $(".datepickeoff").datepicker({dateFormat: 'dd/mm/yy'});
$(".datepickeoff").datepicker({dateFormat: 'dd-mm-yy'});

$(document).ready(function() {
    $(document).on('click', '.view-data', function(e) {
        e.preventDefault();
        $('.assign_form_class').trigger('reset');
        $('#crime_type').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('crime_type'));
        $('#victime_type').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('victime_type'));
        $('#vehicle_type').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('vehicle_type'));
        $('#paper_type').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('paper_type'));
    })
    $(document).on('click', '.edit-data', function(e) {
        e.preventDefault();
        $('.assign_form_class').trigger('reset');
        $('#id').empty().val( $(this).data('id'));
    })
});
$(document).ready(function() {
    $('.selectdata').select2();
});
//edit case system admin modal
$(document).ready(function() {
    $(document).on('click','.edit-btn-case-desk',function (e) {
        $('.edit-case')[0].reset();
        $('select2').val('').trigger('change');
        e.preventDefault();
        var id=$(this).data('id');
        console.log(id)
        $.ajax({
            url: 'case_update/find/'+id,
            type: 'GET',
            data: { id: id },
            success: function(response)
            {
                console.log(response);
                $('.edit-case').trigger('reset');
                $('input.victim_name').val(response.victim_name);
                $('input.case_no').val(response.case_no);
                $('input.case_id').val(response.id);
                $('input.victim_mb').val(response.victim_mb);
                $('input.vehical_reg').val(response.vehical_reg);
                $('input.date_off').val(response.date_off);
                $('input.time_off').val(response.time_off);
                $('input.date_disposal').val(response.date_disposal);
                // $('input.paper_number').val(response.paper_number);
                $('input.mp-data').val(response.id_mp);
                $('.mp-data option').each(function() {
                    if($(this).val() == response.id_mp) {
                        $(this).attr('selected', 'selected').prop('selected', true);
                    }
                });
                $('select.loc').val(response.loc);
                $('.loc option').each(function() {
                    if($(this).val() == response.loc) {
                        $(this).attr('selected', 'selected').prop('selected', true);
                    }
                });
                // $('.vehical_type option').each(function() {
                //     if($(this).val() == response.vehical_type) {
                //         $(this).attr('selected', 'selected').prop('selected', true);
                //     }
                // });
                $('.vehical_type option').each(function() {
                    if($(this).val() == response.vehical_type) {
                        $(this).attr('selected', 'selected').prop('selected', true);
                    }
                });

                var crime= JSON.parse(response.crime_type);
                // console.log(crime);
                if(crime!=null){
                    var lengthc = crime.length;
                    $('.crime_type').val(crime).trigger('change');
                    for (var c = 0; c < lengthc; c++) {
                        $('.crime_type option').each(function() {
                            //Do something
                            if(crime[c] == $(this).val()){
                                $(this).attr('selected', 'selected').prop('selected', true);
                            }
                        });
                    }
                }else{
                    $('.crime_type').val('');
                }

                var datas= JSON.parse(response.paper);
                if(datas!=null){
                    var arrayLength = datas.length;
                    $('.paper').val(arrayLength).trigger('change');
                    for (var i = 0; i < arrayLength; i++) {
                        $('.paper option').each(function() {
                            //Do something
                            if(datas[i] == $(this).val()){
                                $(this).attr('selected', 'selected').prop('selected', true);
                            }
                        });
                    }
                }else{
                    $('.paper').val('');
                }

                $('.victim option').each(function() {
                    if($(this).val() == response.victim) {
                        $(this).attr('selected', 'selected').prop('selected', true);
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
                $('.selectdata').select2();
                // var paper=JSON.parse(response.victim);
                // console.log(paper);

            }
        });
    })
})
$(document).ready(function() {
    $(document).on('click', '.view-data', function(e) {
        e.preventDefault();
        $('.assign_form_class').trigger('reset');
        $('#name_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('name'));
        $('#unit_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('unit'));
        $('#unit_role_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('unit_role'));
        $('#phone_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('phone'));
        $('#ba_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('ba_number'));
        $('#email_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('email'));
        // console.log($(this).data('email'))

    });


    $(document).on('click', '.edit-data', function(e) {
        e.preventDefault();
        $('.assign_form_class').trigger('reset');
        var id = $(this).data('id');
        var name = $(this).data('name');
        var phone = $(this).data('phone');
        var ba_number =$(this).data('ba_number');
        var email = $(this).data('email');
        var unit_role_id = $(this).data('unit_role_id');
        $("#edit-name").empty().val(name);
        $("#edit-id").empty().val(id);
        $("#edit-phone").empty().val(phone);
        $("#edit-ba_number").empty().val(ba_number);
        $("#edit-email").empty().val(email);
        $('#unitrole option').each(function() {
            if($(this).val() == unit_role_id) {
                $(this).prop('selected','selected');
            }
        });
    });
});

