import { router } from '@inertiajs/core';

const dtbuttons = [
    {
          title: '',
          extend: 'excelHtml5',
          text: '<i class="fa fa-file-excel"></i> Excel',
          className: 'btn btn-success',
          columns: ':visible'
    },
    {
        title: '',
        extend: 'print',
        text: '<i class="fa fa-print"></i> Print',
        className: 'btn btn-warning',
        columns: ':visible'
    },
    {
      text: 'Delete',
      className: 'btn btn-danger',
      action: function ( e, dt, button, config ) {

        let element = document.querySelector('tr.selected');
        let length = document.querySelectorAll('tr.selected').length;

        if( element && length == 1){
          let row = document.querySelector('tr.selected').childNodes[0].innerHTML;
          let url = route('attend.destory',row);
          router.delete(url);
        }
        else if( element && length > 1){
          alert('يجب اختيار سجل واحد فقط للحذف');
        }
        else{
            alert('يرجى اختيار سجل واحد للحذف');
        }
       
      }       
    }
];

export default dtbuttons;