<template>
    <Head title="Show Registered"/>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-5" dir="rtl">
            <h5 class="card-header" style="margin-top:-2rem">جدول الحضور بتاريخ {{ day }}</h5>
            <div class="table-responsive text-nowrap">
                <DataTable :data="registered" :columns="columns" :options=options class="table table-sm display" ref="table" width="100%">
                    <thead>
                        <tr>
                        <th>الرقم التسلسلي</th>
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>الصورة الشخصية</th>
                        <th>المنصب</th>
                        <th>الجهة</th>
                        <th>Qrcode</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                </DataTable>
            </div>
        </div>
    </div>
</template>

<script setup>
import columns from '../Attenders/DataTable/columns';
import options from '../Attenders/DataTable/options';

defineProps({
    registered: Array,
    day: String
})

</script>
<style>
@import 'datatables.net-bs5';
.dt-buttons{float: left;}
#DataTables_Table_0_filter{padding: 1rem;}
</style>