// function isActiveDropdown(idName){
//     const dropdownContent = document.getElementById(idName);
//     if(dropdownContent.classList.contains('hidden')){
//         document.querySelector('#dropdownContentTypesRealEstate').classList.add('hidden') 
//         document.querySelector('#dropdownContentLocation').classList.add('hidden')
//         document.querySelector('#dropdownContentPrice').classList.add('hidden')
//         document.querySelector('#dropdownContentArea').classList.add('hidden')
//         document.querySelector('#dropdownContentMoreAttribute').classList.add('hidden')
//         dropdownContent.classList.remove("hidden");
//     }else{
//         dropdownContent.classList.add("hidden");
//     }  
// }

function submitOptionCategoryMenu(){
    $('#selectCategoryMenu').on('change', function(event) {
        const categoryID = $(this).val()
        $('.categoryID').val(categoryID);
        $('form').trigger('submit'); 
    });
}



$(document).ready(function(){
    submitOptionCategoryMenu()
})




