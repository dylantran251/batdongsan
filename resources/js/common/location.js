import $ from 'jquery'

function selectedProvince(){
    if($('input[name="location"]').length > 0){
        let location = ($('input[name="location"]').val()).split(', ');
        let province_name = location.length-1 >=0 ? location[location.length-1] : '';
        $('#provinces option:not(:disabled)').each(function(){
            if($(this).text() === province_name){
                $(this).prop('selected', true);
                getDistrictsAPI($(this).val())
            }
        })
    }
}

function selecteDistrict(){
    if($('input[name="location"]').length > 0){
        let location = ($('input[name="location"]').val()).split(', ');
        let length_location = location.length;
        let district_name = location.length-2 >=0 ? location[location.length-2] : '';
        $('#districts option:not(:disabled)').each(function(){
            if($(this).text() === district_name){
                $(this).prop('selected', true);
                getWardsAPI($(this).val())
            }
        })
    }
}

function selectedWard(){
    if($('input[name="location"]').length > 0){
        let location = ($('input[name="location"]').val()).split(', ');
        let ward_name = location.length-3 >=0 ? location[location.length-3] : '';
        $('#wards option:not(:disabled)').each(function(){
            if($(this).text() === ward_name){
                $(this).prop('selected', true);
            }
        })
    }
}

export function onChangeSetLocation(province, district, ward) {
    let location = '';
    if(province !== "") location = province;
    if(district !== "") location = district + ', ' + location;
    if(ward !== "") location = ward + ', ' + location;
    if ($('input[name="location"]').length > 0) {
        $('input[name="location"]').val(location);
    }else{
        $('.form-search').append(`<input type="text" id="location" name="location" value="${location}">`);
    }
    if($('.show-location')){
        $('.show-location').text(location);
    }
}

function onChangeProvince() {
    $('#provinces').on('change', function(){
        let province_name = $(this).find(':selected').text();
        getDistrictsAPI($(this).val());
        $('#wards').html("<option selected disabled value=''>Xã/Phường</option>");
        onChangeSetLocation(province_name, "", "");
    });
}

function onChangeDistrict(){
    $('#districts').on('change', function(){
        let district_code = $(this).val();
        let district_name = $(this).find(':selected').text();
        let province_code = $('#provinces').val();
        let province_name = $('#provinces').find(':selected').text();
        getWardsAPI(district_code, province_code);
        onChangeSetLocation(province_name, district_name, "");
    });
}

function onChangeWard(){
    $("#wards").on('change', function(){
        let district_name = $('#districts').find(':selected').text();
        let province_name = $('#provinces').find(':selected').text();
        let ward_name = $(this).find(':selected').text();
        onChangeSetLocation(province_name, district_name, ward_name);
    });
}
export function getProvincesAPI(){
    $.ajax({
        url: '/provinces',
        type: 'GET',
        success: function(response){
            let data = response.data;
            let option = '<option value="" selected disabled>Tỉnh/Thành phố</option>';
            data.forEach(function(item) {
                option += `<option value="${item.id}">${item.full_name}</option>`
            });
            $('#provinces').html(option)
            selectedProvince()
            $('#districts').html('<option value="" selected disabled>Quận/Huyện</option>')
            $('#wards').html('<option value="" selected disabled>Xã/Phường</option>')
        },
        error: function(error){
            console.log("Lỗi " + error.message)
        }
    })
}

function getDistrictsAPI(province_id){
    $.ajax({
        url: '/districts/'+province_id,
        type: 'GET',
        success: function(response){
            console.log(response.data + 'abbcbcvcvcv');
            let data = response.data;
            let option = '<option value="" selected disabled>Quận/Huyện</option>';
            data.forEach(item => {
                option += `<option value="${item.id}">${item.full_name}</option>`
            });
            $('#districts').html(option)
            selecteDistrict()
        },
        error: function(error){
            console.log('Lỗi ' + error);
        }
    })
}
function getWardsAPI(district_id){
    $.ajax({
        url: '/wards/' + district_id ,
        type: 'GET',
        success: function(response){
            let option = '<option value="" selected disabled>Xã/Phường</option>';
            let data = response.data;
            data.forEach(item => {
                option += `<option value="${item.id}">${item.full_name}</option>`
            });
            $('#wards').html(option) 
            selectedWard()
        },
        error: function(error){
            console.log('Lỗi ' + error);
        }
    })
}
$(document).ready(function(){
    getProvincesAPI()
    onChangeProvince();
    onChangeDistrict();
    onChangeWard();
})
