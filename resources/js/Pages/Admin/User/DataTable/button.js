import { router } from '@inertiajs/core';

const dtbuttons = [
  {
    text: 'Add New User',
    className: 'btn btn-success',
    action: function ( e, dt, button, config ) {
      router.get(route('users.new'));
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
          let url = route('users.edit',row);
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
    text: 'Delete',
    className: 'btn btn-danger',
    action: function ( e, dt, button, config ) {

      let element = document.querySelector('tr.selected');
      let length = document.querySelectorAll('tr.selected').length;

      if( element && length == 1){
        let row = document.querySelector('tr.selected').childNodes[0].innerHTML;
        let url = route('users.destory',row);
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