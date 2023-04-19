import { router } from '@inertiajs/core';

const dtbuttons = [
    {
          title: '',
          extend: 'excelHtml5',
          text: '<i class="fa fa-file-excel"></i> Excel',
          className: 'btn btn-success',
          columns: ':visible'
    },
    // {
    //     title: '',
    //     extend: 'pdfHtml5',
    //     text: '<i class="fa fa-file-pdf"></i> Pdf',
    //     className: 'btn btn-danger',
    //     columns: ':visible'
    // },
    {
        title: '',
        extend: 'print',
        text: '<i class="fa fa-print"></i> Print',
        className: 'btn btn-warning',
        columns: ':visible'
    },
    // {
    //     extend: 'colvis',
    //     collectionLayout: 'fixed two-column',
    //     columns: 'th:nth-child(n+2)',
    //     dropup: true,
    //     columns: ':visible'
    // },
    {
      text: 'Delete',
      className: 'btn btn-danger',
      action: function ( e, dt, button, config ) {

        let element = document.querySelector('tr.selected');
        let length = document.querySelectorAll('tr.selected').length;

        if( element && length == 1){
          let row = document.querySelector('tr.selected').childNodes[0].innerHTML;
          let url = route('registered.destroy',row);
          router.delete(url);
        }
        else if( element && length > 1){
          alert('يجب اختيار سجل واحد فقط للحذف');
        }
        else{
            alert('يرجى اختيار سجل واحد للحذف');
        }
       
      }       
    },
    {
      text: 'Update',
      className: 'btn btn-primary',
      action: function ( e, dt, button, config ) {
        let element = document.querySelector('tr.selected');
        let length = document.querySelectorAll('tr.selected').length;

        if( element && length == 1){
            let row = element.childNodes[0].innerHTML;
            let url = route('registered.edit',row);
            router.get(url);
        }
        else if( element && length > 1){
          alert('يجب اختيار سجل واحد فقط للتعديل');
        }
        else{
            alert('يرجى اختيار سجل واحد للتعديل');
        }
        
        
      }       
    },
    {
      text: 'Attend',
      className: 'btn btn-success',
      action: function ( e, dt, button, config ) {
        let element = document.querySelector('tr.selected');
        let length = document.querySelectorAll('tr.selected').length;

        if( element && length == 1){
          let row = element.childNodes[0].innerHTML;
          let url = route('attend.store',row);
          window.open(url, '_blank').focus();
        }
        else if( element && length > 1){
          alert('يجب اختيار سجل واحد فقط لتسجيل الحضور');
        }
        else{
            alert('يرجى اختيار سجل واحد لتسجيل الحضور');
        } 
      }       
    },
];

export default dtbuttons;