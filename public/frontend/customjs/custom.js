
// preview images showing for image file upload
function readURL(input, preview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(preview+'_preview').attr('src', e.target.result).parent('div').removeClass('d-none');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
//this function for applicant form client side //
$(document).ready(function(){
    //image validation with preview image
    $(document).on('click','.remove', function() {
        $(this).parent('.preview-wrapper').siblings('input[type="file"]').val('');
        $(this).siblings('img').attr('src', '');
        $(this).remove();
    });
    $('#applicant_nid_image').bind('change', function() {
        readURL(this, '#applicant_nid_image');
        $('#applicant_nid_image_preview').siblings('.remove').remove();
        $('#applicant_nid_image_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.applicant_nid_image').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.applicant_nid_image').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#applicant_nid_image_back').bind('change', function() {
        readURL(this, '#applicant_nid_image_back');
        $('#applicant_nid_image_back_preview').siblings('.remove').remove();
        $('#applicant_nid_image_back_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.applicant_nid_image_back').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.applicant_nid_image_back').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#applicant_image').bind('change', function() {
        readURL(this, '#applicant_image');
        $('#applicant_image_preview').siblings('.remove').remove();
        $('#applicant_image_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');

        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.applicant_image').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.applicant_image').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#nationality_certificate').bind('change', function() {

        readURL(this, '#nationality_certificate');
        $('#nationality_certificate_preview').siblings('.remove').remove();
        $('#nationality_certificate_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.nationality_certificate').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.nationality_certificate').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#house_owner_relation_file').bind('change', function() {

        readURL(this, '#house_owner_relation_file');
        $('#house_owner_relation_file_preview').siblings('.remove').remove();
        $('#house_owner_relation_file_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.house_owner_relation_file').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.house_owner_relation_file').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#home_owner_ni_image').bind('change', function() {
        readURL(this, '#home_owner_ni_image');
        $('#home_owner_ni_image_preview').siblings('.remove').remove();
        $('#home_owner_ni_image_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.home_owner_ni_image').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.home_owner_ni_image').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#applicant_home_contract_paper').bind('change', function() {

        readURL(this, '#applicant_home_contract_paper');
        $('#applicant_home_contract_paper_preview').siblings('.remove').remove();
        $('#applicant_home_contract_paper_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a);
        if(a > 300000) {
            $('.applicant_home_contract_paper').html('<b>This image must be 500KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.applicant_home_contract_paper').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#applicant_home_contract_paper_last').bind('change', function() {

        readURL(this, '#applicant_home_contract_paper_last');
        $('#applicant_home_contract_paper_last_preview').siblings('.remove').remove();
        $('#applicant_home_contract_paper_last_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a);
        if(a > 300000) {
            $('.applicant_home_contract_paper_last').html('<b>This image must be 500KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.applicant_home_contract_paper_last').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#house_owner_recommendation').bind('change', function() {
        readURL(this, '#house_owner_recommendation');
        $('#house_owner_recommendation_preview').siblings('.remove').remove();
        $('#house_owner_recommendation_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');

        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.house_owner_recommendation').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.house_owner_recommendation').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#applicant_certify_nid').bind('change', function() {
        readURL(this, '#applicant_certify_nid');
        $('#applicant_certify_nid_preview').siblings('.remove').remove();
        $('#applicant_certify_nid_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');

        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.applicant_certify_nid').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.applicant_certify_nid').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#applicant_recommendation_form').bind('change', function() {
        readURL(this, '#applicant_recommendation_form');
        $('#applicant_recommendation_form_preview').siblings('.remove').remove();
        $('#applicant_recommendation_form_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.applicant_recommendation_form').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.applicant_recommendation_form').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $('#signature').bind('change', function() {
        readURL(this, '#signature');
        $('#signature_preview').siblings('.remove').remove();
        $('#signature_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.signature').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.signature').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    $("#old_card_image").change(function() {
        readURL(this, '#old_card_image');
        $('#old_card_image_preview').siblings('.remove').remove();
        $('#old_card_image_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
    });
    $("#house_allotment_copy").change(function() {
        readURL(this, '#house_allotment_copy');
        $('#house_allotment_copy_preview').siblings('.remove').remove();
        $('#house_allotment_copy_preview').after('<span class="remove"><i class="fa fa-times"></i></span>');
        var a=(this.files[0].size);
        console.log(a)
        if(a > 300000) {
            $('.house_allotment_copy').html('<b>This image must be 300KB</b>').addClass('text-danger')
        }
        else if(a <= 300000) {
            $('.house_allotment_copy').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
            $('.form-submit').attr('disabled',false)
        };
    });
    //endi
    $('.house_types').click(function(){
        var house= $(this).val();
        console.log('paise')
        console.log(house)
        $('button.certifer').attr('disabled',false);
        $("#relation-div").css("display", "none");
        if(house=='1'){
            $("#newsSource").css("display", "block");
            $("#relation_house").css("display", "none");
            $("#relation-govt").css("display", "none");
            $("#house-owner").css("display", "block");
            $(".relation-home").css("display","none");

            $('button.certifer').on('click', function(e) {
                e.preventDefault();
                var houseown=$('#house_owner_name').val();
                var art=$('#applicant_relation_tenant').val();
                var honi=$('#home_owner_ni_image').val();
                var ahcp=$('#applicant_home_contract_paper').val();
                var hor=$('#house_owner_recommendation').val();
                var ed=$('#expire_date').val();
                var ede=$('#expire_date_end').val();
                if(houseown == ''||art == ''||honi == ''||ahcp == ''||hor == ''||ed == ''||ede == ''){
                    $(window).scrollTop(0);
                    $('.certifer-tab').css({
                        'pointer-events': 'none', 'cursor': 'default'
                    })
                    $(".print-error-msg").find("ul").html('Please enter the required filed *');
                    $(".print-error-msg").css('display','block');
                }else
                {
                    $('.certifer-tab').trigger('click');
                    $(window).scrollTop(0);
                    $('.certifer-tab').css({
                        'pointer-events': '', 'cursor': ''
                    })
                    $(".print-error-msg").css('display','none');
                }
            });

        }else if(house=='2'){
            $("#newsSource").css("display", "none");
            $("#relation_house").css("display", "none");
            $("#relation-govt").css("display", "block");
            $("#house-owner").css("display", "none");

            $('button.certifer').on('click', function(e) {
                e.preventDefault();
                var houseown=$('#govt_house_owner_name').val();
                var art=$('#govt_house_owner_relation').val();
                var honi=$('#house_allotment_copy').val();
                if(houseown == ''||art == ''||honi == ''){
                    $(window).scrollTop(0);
                    $('.certifer-tab').css({
                        'pointer-events': 'none', 'cursor': 'default'
                    })
                    $(".print-error-msg").find("ul").html('Please enter the required filed *');
                    $(".print-error-msg").css('display','block');
                }else
                {
                    $('.certifer-tab').trigger('click');
                    $(window).scrollTop(0);
                    $('.certifer-tab').css({
                        'pointer-events': '', 'cursor': ''
                    })
                    $(".print-error-msg").css('display','none');
                }
            });
        }else{
            $("#newsSource").css("display", "none");
            $("#relation_house").css("display", "block");
            $("#relation-govt").css("display", "none");
            $("#house-owner").css("display", "block");
            $(".relation-home").css("display","none");

            $('button.certifer').on('click', function(e) {
                e.preventDefault();
                var houseown=$('#house_owner_name').val();
                var art=$('#house_owner_relation').val();
                if(houseown == ''||art == ''){
                    $(window).scrollTop(0);
                    $('.certifer-tab').css({
                        'pointer-events': 'none', 'cursor': 'default'
                    })
                    $(".print-error-msg").find("ul").html('Please enter the required filed *');
                    $(".print-error-msg").css('display','block');
                }else
                {
                    $('.certifer-tab').trigger('click');
                    $(window).scrollTop(0);
                    $('.certifer-tab').css({
                        'pointer-events': '', 'cursor': ''
                    })
                    $(".print-error-msg").css('display','none');
                }
            });
        }
    });
    $('#selector').change(function () {
        if($('#selector').val()=='others'){
            $("#others").css("display", "block");
        }else{
            $("#others").css("display", "none");
        }
    })
    $('.relation').change(function () {
        var rel=$(this).val();
        if(rel=='others'){
            $('.text-dynamic').html('বাড়ির মালিকের সাথে সম্পর্কের প্রমান প্রত্র')
        }
        if(rel=='স্বামী/স্ত্রী'){
            $('.text-dynamic').html('কাবিননামা/সম্পর্কের প্রমান প্রত্র ')
        }
        if(rel=='নাতি/ নাতনী'){
            $('.text-dynamic').html('পিতার এনআইডি')
        }
        if(rel=='শশুর শাশুড়ি '){
            $('.text-dynamic').html('কন্যা বা জামাতার এনআইডি ')
        }
        if(rel=='পুত্র বধু'){
            $('.text-dynamic').html('স্বামীর  এনআইডি ')
        }
        if(rel=='জামাতা'){
            $('.text-dynamic').html('স্ত্রীর এনআইডি ')
        }
        if(rel=='others' ||rel=='স্বামী/স্ত্রী' ||rel=='নাতি/ নাতনী' ||rel=='শশুর শাশুড়ি ' ||rel=='পুত্র বধু' ||rel=='জামাতা' ){
            $("#relation-div").css("display", "block");
        }
        else{
            $("#relation-div").css("display", "none");
        }

    })
    $('.new_or_renew').change(function () {
        var card=$(this).val();
        if(card=='2'){

            $("#oldcard").css("display", "block");
            // $('.card-image').attr('required','true')

            $('.card-image').bind('change', function() {
                var a=(this.files[0].size);
                console.log(a)
                if(a > 300000) {
                    $('.card-image-text').html('<b>This image must be 300KB</b>').addClass('text-danger')
                }
                else if(a <= 300000) {
                    $('.card-image-text').html('<b>Your image is valid</b>').removeClass('text-danger').addClass('text-success')
                    $('.form-submit').attr('disabled',false)
                };
            });

        }else{
            $("#oldcard").css("display", "none");
        }
    })
    $('.certify').click(function(){
        $('button.anouncement').attr('disabled',false);
        var def=$(this).val();
        // console.log(def)
        if(def=='defense'){
            $("#rank").css("display", "block");
            $("#designation").css("display", "none");
        }else{
            $("#designation").css("display", "block");
            $("#rank").css("display", "none");
        }
    });

    $('button.house_owner_ranter').on('click', function(e) {
        e.preventDefault();
        var apname=$('#applicant_name').val();
        var nor=$('.new_or_renew').val();
        var catid=$('#category_id').val();
        var pci=$('#selector').val();
        var aca=$('#applicant_career_address').val();
        var afn=$('#applicant_fathers_name').val();
        var amn=$('#applicant_mothers_name').val();
        var ahorwn=$('#applicant_husband_or_wife_name').val();
        var ap=$('#applicant_phone').val();
        var ae=$('#applicant_email').val();
        var adob=$('#applicant_date_of_birth').val();
        var ais=$('#applicant_identification_syndorme').val();
        var anid=$('#applicant_nid_no').val();
        var anii=$('#applicant_nid_image').val();
        var anib=$('#applicant_nid_image_back').val();
        var ai=$('#applicant_image').val();
        var flat_no=$('#flat_no').val();
        var house_no=$('#house_no').val();
        var road_no=$('#road_no').val();
        var area=$('#area').val();
        var area_id=$('#area_id').val();
        var appa=$('#applicant_permanent_address').val();
        var nc=$('#nationality_certificate').val();
        if(apname==''  || nor =='' ||catid =='' ||pci =='' ||aca =='' || afn =='' || amn =='' || ahorwn =='' || ap =='' || ae =='' || adob ==''  || anid =='' || anib =='' || anii ==''|| ai ==''|| flat_no ==''|| house_no ==''|| road_no ==''|| area ==''|| area_id ==''|| appa =='' ){
            $(window).scrollTop(0);
            $('.house_owner_ranter-tab').css({
                'pointer-events': 'none', 'cursor': 'default'
            })
            $(".print-error-msg").find("ul").html('Please enter the required filed *');
            $(".print-error-msg").css('display','block');
        }else
        {
            $('.house_owner_ranter-tab').css({
                'pointer-events': '', 'cursor': ''
            })
            $('.house_owner_ranter-tab').trigger('click');
            $(".print-error-msg").css('display','none');
        }
    });
    $('#category_id').change(function () {
        var cat=$(this).val();
        console.log(cat);
        if (cat==1){
            $("#travel_cause").css("display","none");
            $(".nationality").css("display","none")
        }else if(cat==2){
            $("#travel_cause").css("display","block")
            $(".nationality").css("display","block")
        }else{
            $("#travel_cause").css("display","none");
        }
    });
    $('.others-relation-govt').change(function () {
        var data=$(this).val();
        console.log(data)
        if(data=='others'){
            $(".relation-home").css("display","block");
            $(".text-relation").html('আবেদন কারীর সাথে বরাদ্দ লাভ কারীর সম্পর্ক অন্যান্য');
        }else{

            $(".relation-home").css("display","none");

        }
    })
    $('.applicant_relation_tenant').change(function () {
        var data=$(this).val();
        console.log(data)
        if(data=='others'){
            $(".relation-home").css("display","block");
            $(".text-relation").html('ভাড়াটিয়ার সাথে আবেদনকারীর সম্পর্ক অন্যান্য');
        }else{

            $(".relation-home").css("display","none");

        }
    })

    $('button.anouncement').on('click', function(e) {
        e.preventDefault();
        var certify=$('#applicant_certify_name').val();
        var aco=$('#applicant_certify_office').val();
        var acn=$('#applicant_certify_nid').val();
        var acp=$('#applicant_certify_phone').val();
        var arf=$('#applicant_recommendation_form').val();
        if(certify=='' ||aco=='' ||acn=='' ||acp=='' ||arf==''  ){
            $(window).scrollTop(0);
            $('.anouncement-tab').css({
                'pointer-events': 'none', 'cursor': 'default'
            })
            $(".print-error-msg").find("ul").html('Please enter the required filed *');
            $(".print-error-msg").css('display','block');
        }else
        {
            $('.anouncement-tab').trigger('click');
            $(window).scrollTop(0);
            $('.anouncement-tab').css({
                'pointer-events': '', 'cursor': ''
            })
            $(".print-error-msg").css('display','none');
        }
    });

});
//end this applicant form function//
