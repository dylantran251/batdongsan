import $ from 'jquery'
import axios from "axios";

export const buildDeleteModal =  (cb)=>{
    let deleteModal = $('#delete-modal');
    if(deleteModal.length)
    {
        let targets = $('[data-tw-target="#delete-modal"]')
        targets.unbind('click')
        targets.on('click', function(){
            let url = $(this).attr('data-url')
            console.log(url)
            deleteModal.find('form').attr('action', url);
        })
        deleteModal.find('form').unbind('submit')
        deleteModal.find('form').on('submit', async function (e) {
            e.preventDefault();
            console.log($(this).attr('action'));
            await axiosInstance.post($(this).attr('action'), $(this).serialize()).then(function (response) {
               cb(response)
            })
        })
    }
}
