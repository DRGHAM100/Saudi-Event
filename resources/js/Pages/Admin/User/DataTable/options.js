import dtbuttons from './button';

const options = {
    select: {
        style: 'multi'
    },
    dom: 'Blfrtip', 
    lengthMenu: [10,25,50,100],
    language: {
        search: 'بحث',
        zeroRecords: 'لاتوجد نتائج'
    },
    scrollY: '200px',
    scrollCollapse: true,
    buttons: dtbuttons,
};

export default options;