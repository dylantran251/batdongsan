import $ from 'jquery'
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.bootstrap5.css"
$(document).ready(function () {
    let targetsAjax = $('.tom-select-ajax');
    targetsAjax.each(function () {
        let _url = $(this).attr('data-url');
        new TomSelect(this, {
            valueField: 'value',
            labelField: 'text',
            searchField: ['text'],
            optionClass: 'option',
            itemClass: 'item',
            placeholder: 'Nhập gì đó VD: Nhà đất Hà Nội',
            create: false, 
            openOnFocus: true, 
            load: async function(query, callback) {
                let url = _url; 
                fetch(url)
                    .then(response => response.json())
                    .then(json => {
                        let options = json.items.map(item => ({
                            value: item.name,
                            text: item.name,
                        }));
                        callback(options);
                    }).catch(()=>{
                    callback();
                });
            },
            render: {
                option: function(item, escape) {
                    console.log(item);
                    return "<div>"+item.value+"</div>";
                },
                item: function(item, escape) {
                    return "<div>"+item.value+"</div>";
                }
            },
        });
    });
    
})
