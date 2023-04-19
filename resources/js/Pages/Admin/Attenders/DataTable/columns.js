const columns = [
    { data: 'id',name: 'id'},
    { 
    data: 'full_name',name: 'full_name'},
    { data: 'email',name: 'email' },
    { data: 'image',render: function(data,type,row,meta){
          return `<a target="_blank" href="../../storage/personal_images/${data}"><img src="../../storage/personal_images/${data}" width="50" height="50" />`;
    }},
    { data: 'position' },
    { data: 'organization' },
    { data: 'qrcode',name: 'qrcode' }
];

export default columns;